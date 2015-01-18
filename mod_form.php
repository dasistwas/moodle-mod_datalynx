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
 * @package mod
 * @subpackage datalynx
 * @copyright 2012 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * The Datalynx has been developed as an enhanced counterpart
 * of Moodle's Database activity module (1.9.11+ (20110323)).
 * To the extent that Datalynx code corresponds to Database code,
 * certain copyrights on the Database module may obtain.
 */
defined('MOODLE_INTERNAL') or die;

require_once ("$CFG->dirroot/course/moodleform_mod.php");
require_once($CFG->dirroot. '/mod/datalynx/mod_class.php');

class mod_datalynx_mod_form extends moodleform_mod {
    
    protected $_df = null; 

    function definition() {
        global $CFG;
        
        if ($cmid = optional_param('update', 0, PARAM_INT)) {
            $this->_df = new datalynx(0, $cmid);
        }
        
        $mform = &$this->_form;

        // buttons
        //-------------------------------------------------------------------------------
    	$this->add_action_buttons();

        // name and intro
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // name
        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->setDefault('name', get_string('modulename', 'datalynx'));

        // intro
        $this->add_intro_editor(false, get_string('intro', 'datalynx'));

        // timing
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'timinghdr', get_string('timing', 'form'));

        // time available
        $mform->addElement('date_time_selector', 'timeavailable', get_string('dftimeavailable', 'datalynx'), array('optional'=>true));
        // time due
        $mform->addElement('date_time_selector', 'timedue', get_string('dftimedue', 'datalynx'), array('optional'=>true));
        $mform->disabledIf('timedue', 'interval', 'gt', 0);

        // interval between required entries
        $mform->addElement('duration', 'timeinterval', get_string('dftimeinterval', 'datalynx'));
        $mform->disabledIf('timeinterval', 'timeavailable[off]', 'checked');
        $mform->disabledIf('timeinterval', 'timedue[off]');

        // number of intervals
        $mform->addElement('select', 'intervalcount', get_string('dfintervalcount', 'datalynx'), array_combine(range(1,100),range(1,100)));
        $mform->setDefault('intervalcount', 1);
        $mform->disabledIf('intervalcount', 'timeavailable[off]', 'checked');
        $mform->disabledIf('intervalcount', 'timedue[off]');
        $mform->disabledIf('intervalcount', 'timeinterval', 'eq', '');

        // allow late
        $mform->addElement('checkbox', 'allowlate', get_string('dflateallow', 'datalynx') , get_string('dflateuse', 'datalynx'));

        // rss
        //-------------------------------------------------------------------------------
        if($CFG->enablerssfeeds && $CFG->datalynx_enablerssfeeds){
            $mform->addElement('header', 'rssshdr', get_string('rss'));
            $countoptions = 0;
            $mform->addElement('select', 'rssarticles', get_string('numberrssarticles', 'datalynx') , $countoptions);
        }

        // grading
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'gradinghdr', get_string('rating', 'rating'));
        
        // entry rating
        $mform->addElement('modgrade', 'rating', get_string('rating', 'datalynx'));
        $mform->setDefault('rating', 0);
        
        // entry settings
        //-------------------------------------------------------------------------------
        $mform->addElement('header', 'entrysettingshdr', get_string('entrysettings', 'datalynx'));

        if ($CFG->datalynx_maxentries > 0) { 
            // Admin limit, select from dropdown
            $maxoptions = (array_combine(range(0, $CFG->datalynx_maxentries),range(0, $CFG->datalynx_maxentries)));

            // required entries
            $mform->addElement('select', 'entriesrequired', get_string('entriesrequired', 'datalynx'), array(0=>get_string('none')) + $maxoptions);
            // required entries to view
            $mform->addElement('select', 'entriestoview', get_string('entriestoview', 'datalynx'), array(0=>get_string('none')) + $maxoptions);
            // max entries
            $mform->addElement('select', 'maxentries', get_string('entriesmax', 'datalynx'), $maxoptions);
            $mform->setDefault('maxentries', $CFG->datalynx_maxentries);
        
        } else {
            // No limit or no entries
            $admindeniesentries = (int) !$CFG->datalynx_maxentries; 
            $mform->addElement('hidden', 'admindeniesentries', $admindeniesentries);
            $mform->setType('admindeniesentries', PARAM_INT);

            // required entries
            $mform->addElement('text', 'entriesrequired', get_string('entriesrequired', 'datalynx'));
            $mform->setDefault('entriesrequired', 0);
            $mform->addRule('entriesrequired', null, 'numeric', null, 'client');
            $mform->setType('entriesrequired', PARAM_INT);
            $mform->disabledIf('entriesrequired', 'admindeniesentries', 'eq', 1);

            // required entries to view
            $mform->addElement('text', 'entriestoview', get_string('entriestoview', 'datalynx'));
            $mform->setDefault('entriestoview', 0);
            $mform->addRule('entriestoview', null, 'numeric', null, 'client');
            $mform->setType('entriestoview', PARAM_INT);
            $mform->disabledIf('entriestoview', 'admindeniesentries', 'eq', 1);

            // max entries
            $mform->addElement('text', 'maxentries', get_string('entriesmax', 'datalynx'));
            $mform->setDefault('maxentries', -1);
            $mform->addRule('maxentries', null, 'numeric', null, 'client');
            $mform->setType('maxentries', PARAM_INT);
            $mform->disabledIf('maxentries', 'admindeniesentries', 'eq', 1);

        }

        // anonymous entries
        if ($CFG->datalynx_anonymous) { 
            $mform->addElement('selectyesno', 'anonymous', get_string('entriesanonymous', 'datalynx'));
            $mform->setDefault('anonymous', 0);
        }
        
        // group entries
        $mform->addElement('selectyesno', 'grouped', get_string('groupentries', 'datalynx'));
        $mform->disabledIf('grouped', 'groupmode', 'eq', 0);
        $mform->disabledIf('grouped', 'groupmode', 'eq', -1);
        
        // time limit to manage an entry
        $mform->addElement('text', 'timelimit', get_string('entrytimelimit', 'datalynx'));
        $mform->setType('timelimit', PARAM_INT);
        $mform->setDefault('timelimit', -1);
        $mform->addRule('timelimit', null, 'numeric', null, 'client');

        $mform->addElement('selectyesno', 'approval', get_string('requireapproval', 'datalynx'));
        
        // common course elements
        //-------------------------------------------------------------------------------
        $this->standard_coursemodule_elements();

        // add separate participants group option
        //_elements has a numeric index, this code accesses the elements by name
        $groups = &$mform->getElement('groupmode');
        $groups->addOption(get_string('separateparticipants', 'datalynx'), -1);

        // buttons
        //-------------------------------------------------------------------------------
    	$this->add_action_buttons();
    }

    /**
     *
     */
    function data_preprocessing(&$data) {
        parent::data_preprocessing($data);
        $data['completionentriesenabled'] = !empty($data['approval']) &&
                                            !empty($data['completionentries']) ? 1 : 0;
        if (empty($data['completionentries'])) {
            $data['completionentries'] = 1;
        }
    }

    /**
     *
     */
    function get_data($slashed = true) {
        if ($data = parent::get_data($slashed)) {
            if (!empty($data->timeinterval)) {
                $data->timedue = $data->timeavailable + ($data->timeinterval * $data->intervalcount);
            }
        }
        return $data;
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $group = array();
        $group[] = &$mform->createElement('checkbox', 'completionentriesenabled', '', get_string('completionentries', 'datalynx'));
        $group[] = &$mform->createElement('text', 'completionentries', '', array('size' => 3));
        $mform->setType('completionentries', PARAM_INT);
        $mform->addGroup($group, 'completionentriesgroup', get_string('completionentriesgroup', 'datalynx'), array(' '), false);
        $mform->disabledIf('completionentries', 'completionentriesenabled', 'notchecked');
        $mform->disabledIf('completionentries', 'approval', 'eq', '0');
        $mform->disabledIf('completionentriesenabled', 'approval', 'eq', '0');
        $mform->addHelpButton('completionentriesgroup', 'completionentriesgroup', 'datalynx');

        return array('completionentriesgroup');
    }

    function definition_after_data() {
        parent::definition_after_data();
        parent::data_preprocessing($data);
        $data['completionentriesenabled'] = !empty($data['approval']) &&
                                            !empty($data['completionentries']) ? 1 : 0;
        if (empty($data['completionentries'])) {
            $data['completionentries'] = 0;
        }
    }

    function completion_rule_enabled($data) {
        return (!empty($data['approval']) &&
                $data['approval'] == 1 &&
                !empty($data['completionentriesenabled']) &&
                $data['completionentries'] > 0);
    }

}
