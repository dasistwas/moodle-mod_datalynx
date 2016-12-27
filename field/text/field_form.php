<?php
// This file is part of Moodle - http://moodle.org/.
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package datalynxfield
 * @subpackage text
 * @copyright 2011 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once ("$CFG->dirroot/mod/datalynx/field/field_form.php");


class datalynxfield_text_form extends datalynxfield_form {

    /**
     */
    function field_definition() {
        global $OUTPUT, $DB, $PAGE, $CFG;

        $mform = &$this->_form;

        // -------------------------------------------------------------------------------
        $mform->addElement('header', 'fieldattributeshdr',
                get_string('fieldattributes', 'datalynx'));

        // auto link
        $mform->addElement('checkbox', 'param1', get_string('fieldallowautolink', 'datalynx'));

        // field width
        $fieldwidthgrp = array();
        $fieldwidthgrp[] = &$mform->createElement('text', 'param2', null, array('size' => '8'));
        $fieldwidthgrp[] = &$mform->createElement('select', 'param3', null,
                array('px' => 'px', 'em' => 'em', '%' => '%'));
        $mform->addGroup($fieldwidthgrp, 'fieldwidthgrp', get_string('fieldwidth', 'datalynx'),
                array(' '), false);
        $mform->setType('param2', PARAM_INT);
        $mform->addGroupRule('fieldwidthgrp',
                array('param2' => array(array(null, 'numeric', null, 'client'))));
        $mform->disabledIf('param3', 'param2', 'eq', '');
        $mform->setDefault('param2', '');
        $mform->setDefault('param3', 'px');

        // check for duplicate entries
        $duplicates = $this->get_list_of_duplicates();

        $mform->addElement('selectyesno', 'param8', get_string('unique', 'datalynx'));
        $mform->setType('param8', PARAM_BOOL);

        if ($duplicates) {
            // We set it constantly to 'no' if there are duplicates!
            $mform->setConstant('param8', 0);
            $mform->freeze('param8');
            // Display the duplicate-entries-message and the list of duplicate entries
            $listtext = $this->print_list_of_duplicates($duplicates);
            $mform->addElement('static', 'duplicatestext', '',
                $OUTPUT->notification(get_string('field_has_duplicate_entries', 'datalynx') .
                    $listtext, 'notifymessage'));
        } else {
            // if there are no duplicates the default option for unique is "No" as well, but the user can change it
            $mform->setDefault('param8', 0);
        }

        // Get all Datalynxs where user has managetemplate capability
        // TODO there may be too many
        if ($datalynxs = $DB->get_records('datalynx')) {
            foreach ($datalynxs as $dfid => $datalynx) {
                $df = new datalynx($datalynx);
                // Remove if user cannot manage
                if (!has_capability('mod/datalynx:managetemplates', $df->context)) {
                    unset($datalynxs[$dfid]);
                    continue;
                }
                $datalynxs[$dfid] = $df;
            }
        }

        // Autocompletion with content of other textfield from the same or other datalynx instance
        //
        // select Datalynx instance (to be stored in param9)
        if ($datalynxs) {
            $dfmenu = array('' => array(0 => get_string('noautocompletion', 'datalynx')));
            foreach ($datalynxs as $dfid => $df) {
                if (!isset($dfmenu[$df->course->shortname])) {
                    $dfmenu[$df->course->shortname] = array();
                }
                $dfmenu[$df->course->shortname][$dfid] = strip_tags(
                    format_string($df->name(), true));
            }
        } else {
            $dfmenu = array('' => array(0 => get_string('nodatalynxs', 'datalynx')));
        }
        $mform->addElement('selectgroups', 'param9', get_string('autocompletion', 'datalynx'), $dfmenu);
        $mform->addHelpButton('param9', 'autocompletion_textfield', 'datalynx');

        // Select textfields of given instance (stored in param10)
        $options = array(0 => get_string('choosedots'));
        $mform->addElement('select', 'param10', get_string('textfield', 'datalynx'), $options);
        $mform->disabledIf('param10', 'param9', 'eq', 0);
        $mform->addHelpButton('param10', 'textfield', 'datalynx');
        $mform->setType('param10', PARAM_INT);

        // ajax view loading
        $options = array(
            'dffield' => 'param9',
            'textfieldfield' => 'param10',
            'acturl' => "$CFG->wwwroot/mod/datalynx/loaddfviews.php"
        );

        $module = array(
            'name' => 'M.mod_datalynx_load_views',
            'fullpath' => '/mod/datalynx/datalynxloadviews.js',
            'requires' => array('base', 'io', 'node')
        );

        $PAGE->requires->js_init_call('M.mod_datalynx_load_views.init', array($options), false, $module);

        // rules
        // -------------------------------------------------------------------------------
        $mform->addElement('header', 'fieldruleshdr', get_string('fieldrules', 'datalynx'));

        // format rules
        $options = array('' => get_string('choosedots'),
            'alphanumeric' => get_string('err_alphanumeric', 'form'),
            'lettersonly' => get_string('err_lettersonly', 'form'),
            'numeric' => get_string('err_numeric', 'form'),
            'email' => get_string('err_email', 'form'),
            'nopunctuation' => get_string('err_nopunctuation', 'form'));
        $mform->addElement('select', 'param4', get_string('format'), $options);

        // length (param5, 6, 7): min, max, range
        $options = array('' => get_string('choosedots'),
            'minlength' => get_string('min', 'datalynx'),
            'maxlength' => get_string('max', 'datalynx'),
            'rangelength' => get_string('range', 'datalynx'));
        $grp = array();
        $grp[] = &$mform->createElement('select', 'param5', null, $options);
        $grp[] = &$mform->createElement('text', 'param6', null, array('size' => 8));
        $grp[] = &$mform->createElement('text', 'param7', null, array('size' => 8));
        $mform->addGroup($grp, 'lengthgrp', get_string('numcharsallowed', 'datalynx'), '    ', false);
        $mform->addGroupRule('lengthgrp',
                array('param6' => array(array(null, 'numeric', null, 'client'))));
        $mform->addGroupRule('lengthgrp',
                array('param7' => array(array(null, 'numeric', null, 'client'))));
        $mform->disabledIf('param6', 'param5', 'eq', '');
        $mform->disabledIf('param6', 'param5', 'eq', 'maxlength');
        $mform->disabledIf('param7', 'param5', 'eq', '');
        $mform->disabledIf('param7', 'param5', 'eq', 'minlength');
        $mform->setType('param6', PARAM_INT);
        $mform->setType('param7', PARAM_INT);

    }

    /**
     */
    function definition_after_data() {
        global $DB;

        if ($selectedarr = $this->_form->getElement('param9')->getSelected()) {
            $refdatalynxid = reset($selectedarr);
        } else {
            $refdatalynxid = 0;
        }
        if ($selectedarr = $this->_form->getElement('param10')->getSelected()) {
            $textfieldid = reset($selectedarr);
        } else {
            $textfieldid = 0;
        }

        if ($refdatalynxid) {
            if ($textfields = $DB->get_records_menu('datalynx_fields',
                array('dataid' => $refdatalynxid, 'type' => 'text'), 'name', 'id,name')) {
                $formfield = &$this->_form->getElement('param10');
                foreach ($textfields as $key => $value) {
                    $formfield->addOption(strip_tags(format_string($value, true)), $key);
                }
                $this->_form->setDefault('param10', $textfieldid);
            }
        }
    }


    /**
     * Ensures there are no duplicate entries right now if unique is set to 'yes'!
     *
     * @param array $data
     * @param array $files
     * @return string[] Associative array with errors
     */
    function validation($data, $files, $mform) {

        $errors = parent::validation($data, $files);

        $fieldid = $this->_field->id();
        if (!empty($data['param8']) && !empty($fieldid)) {
            // Unique is activated, we check if there are doubles!
            // Should never happen, because we freeze it to 'no' if there are duplicates!

            $duplicates = $this->get_list_of_duplicates();

            if ($duplicates) {
                $listtext = $this->print_list_of_duplicates($duplicates);
                $mform->addElement('static', 'duplicatestext', '',
                    $OUTPUT->notification(get_string('field_has_duplicate_entries', 'datalynx')
                        . $listtext, 'notifymessage'));
            }
        }

        return $errors;
    }

    /**
     * Returns a list of entries with duplicate content in the given text field
     * @return $array entries with duplicate content (entryid, content)
     */
    function get_list_of_duplicates() {
        global $DB;

        $fieldid = $this->_field->id();

        if (empty($fieldid)) {
            return false;
        }

        $records = $DB->get_records_sql("SELECT COUNT(*) AS amount, c.content
                                     FROM {datalynx_contents} c
                                    WHERE c.fieldid = :fieldid AND c.content IS NOT NULL
                                 GROUP BY c.content
                                   HAVING amount > 1", array('fieldid' => $fieldid));
        $list_of_duplicates = array();
        foreach($records as $record) {
            $ids = $DB->get_fieldset_sql("SELECT c.entryid
                                     FROM {datalynx_contents} c
                                    WHERE c.fieldid = :fieldid AND c.content = :content",
                array('fieldid' => $fieldid, 'content' => $record->content));
            foreach($ids as $id) {
                $list_of_duplicates[] = array('id' => $id, 'content' => $record->content);
            }
        }
        return $list_of_duplicates;

    }

    function print_list_of_duplicates($duplicates) {
        $entryurl = $baseurl = $this->get_editviewlink();
        $listtext = "";
        foreach($duplicates as $entry) {
            $entryurl->param('editentries', $entry['id']);
            $entryurl->param('eids', $entry['id']);
            $label = html_writer::tag('span', get_string('entry', 'datalynx') . ' ' .
                get_string('id', 'datalynx') . ' ' . $entry['id'] . ' ' . $entry['content']);
            $link = html_writer::link($entryurl, $label);
            $listtext .= "<br \>" . $link;
        }
        return $listtext;
    }

    function get_editviewlink() {

        $df = $this->_df;
        $view = $df->get_current_view();
        $baseurl = new moodle_url('/mod/datalynx/view.php');
        $baseurl->param('d', $df->data->id);
        $baseurl->param('filter', '0');
        $baseurl->param('sesskey', sesskey());
        $baseurl->param('sourceview', $view->view->id);

        if (!empty($df->data->singleedit)) {
            $baseurl->param('view', $df->data->singleedit);
        }

        return $baseurl;
    }
}
