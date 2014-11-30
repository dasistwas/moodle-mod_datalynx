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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.
 
/**
 * @package datalynxfield
 * @subpackage select
 * @copyright 2014 Ivan Šakić
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') or die;

require_once(dirname(__FILE__) . "/../renderer.php");

/**
 * Class datalynxfield_select_renderer Renderer for select field type
 */
class datalynxfield_select_renderer extends datalynxfield_renderer {

    /**
     * @var datalynxfield_select
     */
    protected $_field = null;

    public function render_edit_mode(MoodleQuickForm &$mform, stdClass $entry, array $options) {
        $field = $this->_field;
        $fieldid = $field->id();
        $entryid = $entry->id;
        $menuoptions = $field->options_menu();
        $fieldname = "field_{$fieldid}_$entryid";
        $required = !empty($options['required']);
        $selected = !empty($entry->{"c{$fieldid}_content"}) ? (int) $entry->{"c{$fieldid}_content"} : 0;
        
        // check for default value
        if (!$selected and $defaultval = $field->get('param2')) {
            $selected = (int) array_search($defaultval, $menuoptions);
        }

        $select = &$mform->addElement('select', $fieldname, null);

        if (isset($this->_field->field->param5)) {
            $disabled = $this->_field->get_disabled_values_for_user();
        } else {
            $disabled = array();
        }

        $menuoptions = array('' => get_string('choosedots')) + $menuoptions;
        foreach ($menuoptions as $id => $name) {
            if (array_search($id, $disabled) === false || $id == $selected) {
                $select->addOption($name, $id);
            } else {
                $select->addOption($name, $id, array('disabled' => 'disabled'));
            }
        }

        $select->setSelected($selected);

        if ($required) {
            $mform->addRule($fieldname, null, 'required', null, 'client');
        }

    }

    public function render_display_mode(stdClass $entry, array $params) {
        $field = $this->_field;
        $fieldid = $field->id();

        if (isset($entry->{"c{$fieldid}_content"})) {
            $selected = (int) $entry->{"c{$fieldid}_content"};
            $options = $field->options_menu();

            if (!empty($params['options'])) {
                $str = array();           
                foreach ($options as $key => $option) {
                    $isselected = (int) ($key == $selected);
                    $str[] = "$isselected $option";
                }
                $str = implode(',', $str);
                return $str;
            }

            if (!empty($params['key'])) {
                if ($selected) {
                    return $selected;
                } else {
                    return '';
                }
            }

            if ($selected and $selected <= count($options)) {
                return $options[$selected];
            }
        }
        
        return '';
    }

    public function render_search_mode(MoodleQuickForm &$mform, $i = 0, $value = '') {
        $field = $this->_field;
        $fieldid = $field->id();

        $options = $field->options_menu();
        $selected = $value ? (int) $value : '';
        $fieldname = "f_{$i}_$fieldid";

        $mform->disabledIf($fieldname, "searchoperator$i", 'eq', '');

        $select = &$mform->createElement('select', $fieldname, null);

        $options = array('' => get_string('choosedots')) + $options;
        foreach ($options as $id => $name) {
            $select->addOption($name, $id);
        }

        $select->setSelected($selected);

        return array(array($select), null);
    }

}
