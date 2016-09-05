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
 * @package datalynx_rule
 * @copyright 2013 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') or die();

require_once ("$CFG->libdir/formslib.php");
require_once ('rule_manager.php');


class datalynx_rule_form extends moodleform {

    protected $_rule = null;

    /* @var datalynx $_df */
    protected $_df = null;

    public function __construct($rule, $action = null, $customdata = null, $method = 'post', $target = '',
            $attributes = null, $editable = true) {
        $this->_rule = $rule;
        $this->_df = $this->_rule->df;
        
        parent::__construct($action, $customdata, $method, $target, $attributes, $editable);
    }

    function definition() {
        global $CFG;
        $mform = &$this->_form;
        
        // buttons
        // -------------------------------------------------------------------------------
        $this->add_action_buttons();
        
        // -------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));
        
        // name
        $mform->addElement('text', 'name', get_string('name'), array('size' => '32'));
        $mform->addRule('name', null, 'required', null, 'client');
        
        // description
        $mform->addElement('text', 'description', get_string('description'), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
            $mform->setType('description', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_RAW);
            $mform->setType('description', PARAM_RAW);
        }
        
        // enabled
        $mform->addElement('advcheckbox', 'enabled', get_string('ruleenabled', 'datalynx'), '', 
                null, array(0, 1));
        
        // events
        $eventmenu = datalynx_rule_manager::get_event_data($this->_df->id());
        $eventgroup = array();
        foreach ($eventmenu as $eventname => $eventlabel) {
            $eventgroup[] = & $mform->createElement('checkbox', $eventname, null, $eventlabel);
        }
        $mform->addGroup($eventgroup, 'eventsgroup', get_string('triggeringevent', 'datalynx'), 
                '<br />', false);
        
        // -------------------------------------------------------------------------------
        $this->rule_definition();
        
        // buttons
        // -------------------------------------------------------------------------------
        $this->add_action_buttons();
    }

    function set_data($data) {
        $selectedevents = unserialize($data->param1);
        if ($selectedevents) {
            foreach ($selectedevents as $eventname) {
                $data->$eventname = true;
            }
        }
        parent::set_data($data);
    }

    function get_data($slashed = true) {
        if ($data = parent::get_data($slashed)) {
            $eventmenu = datalynx_rule_manager::get_event_data($this->_df->id());
            $selectedevents = array();
            foreach (array_keys($eventmenu) as $eventname) {
                if (isset($data->$eventname)) {
                    $selectedevents[] = $eventname;
                }
            }
            $data->param1 = serialize($selectedevents);
        }
        return $data;
    }

    public function add_action_buttons($cancel = true, $submit = null) {
        $mform = &$this->_form;
        
        $buttonarray = array();
        // save and display
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', get_string('savechanges'));
        // save and continue
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 
                get_string('savecontinue', 'datalynx'));
        // cancel
        $buttonarray[] = &$mform->createElement('cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }

    public function validation($data, $files) {
        $errors = parent::validation($data, $files);
        
        if ($this->_df->name_exists('rules', $data['name'], $this->_rule->get_id())) {
            $errors['name'] = get_string('invalidname', 'datalynx', get_string('rule', 'datalynx'));
        }
        
        return $errors;
    }
}
