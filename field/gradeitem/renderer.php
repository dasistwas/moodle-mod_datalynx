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
 * @subpackage gradeitem
 * @copyright 2012 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') or die;

require_once("$CFG->dirroot/mod/datalynx/field/renderer.php");

/**
 *
 */
class datalynxfield_gradeitem_renderer extends datalynxfield_renderer {

    /**
     *
     */
    protected function replacements(array $tags = null, $entry = null, array $options = null) {
        $field = $this->_field;
        $fieldname = $field->name();

        $replacements = array();

        // there is only one possible tag here, no edit
        $tag = "[[$fieldname]]";
        $replacements[$tag] = array('html', $this->display_grade($entry));
/*
        switch ($field->infotype) {
            case 'checkbox':
                $replacements[$tag] = array('html', $this->display_checkbox($entry));
                break;
            case 'datetime':
                $replacements[$tag] = array('html', $this->display_datetime($entry));
                break;
            case 'menu':
            case 'text':
                $replacements[$tag] = array('html', $this->display_text($entry));
                break;
            case 'textarea':
                $replacements[$tag] = array('html', $this->display_richtext($entry));
                break;
            default:
                $replacements[$tag] = '';
        }
*/
        return $replacements;
    }

    /**
     *
     */
    protected function display_grade($entry) {
        $field = $this->_field;
        $fieldid = $field->id();

        if (!isset($entry->{"c{$fieldid}_content"})) {
            return '';
        }
        
        $number = (float) $entry->{"c{$fieldid}_content"};       
        $decimals = 2;
        // only apply number formatting if param1 contains an integer number >= 0:
        if ($decimals) {
            // removes leading zeros (eg. '007' -> '7'; '00' -> '0')
            $str = sprintf("%4.{$decimals}f", $number);
        } else {
            $str = (int) $number;
        }
        return $str;
    }

    
    /**
     *
     */
    protected function display_checkbox($entry) {
        $field = $this->_field;
        $fieldid = $field->id();
        $fieldname = $field->name();

        if (isset($entry->{"c{$fieldid}_content"})) {
            $content = $entry->{"c{$fieldid}_content"};

            $params = array(
                'disabled' => "disabled",
                'type' => "checkbox",
                'name' => $fieldname,
            );
            if (intval($content) === 1) {
                $params['checked'] = 'checked';
            }
            return html_writer::empty_tag('input', $params);
        }

        return '';
    }

    /**
     *
     */
    protected function display_datetime($entry) {
        $field = $this->_field;
        $fieldid = $field->id();

        if (isset($entry->{"c{$fieldid}_content"})) {
            $content = $entry->{"c{$fieldid}_content"};

            // Check if time was specified
            if (!empty($field->field->param8)) {
                $format = get_string('strftimedaydatetime', 'langconfig');
            } else {
                $format = get_string('strftimedate', 'langconfig');
            }

            // Check if a date has been specified
            if (!empty($content)) {
                return userdate($content, $format);
            }
        }

        return '';
    }

    /**
     *
     */
    protected function display_text($entry) {
        $field = $this->_field;
        $fieldid = $field->id();

        if (!isset($entry->{"c{$fieldid}_content"})) {
            return '';
        }
        
        if (!$content = $entry->{"c{$fieldid}_content"}) {
            return '';
        }

        $options = new object();
        $options->para = false;
        $format = FORMAT_MOODLE;
        if (!$str = format_text($content, $format, $options)) {
            return '';
        }

        // Are we creating a link?
        if (!empty($this->field->param9)) {
            // Define the target
            if (!empty($this->field->param10)) {
                $attributes = array('target' => $this->field->param10);
            } else {
                $attributes = array();
            }

            /// Create the link
            $str = html_writer::link(
                str_replace('$$', urlencode($str), $this->field->param9),
                htmlspecialchars($data),
                $attributes
            );
        }

        return $str;
    }

    /**
     *
     */
    protected function display_richtext($entry) {
        $field = $this->_field;
        $fieldid = $field->id();

        if (isset($entry->{"c{$fieldid}_content"})) {
            if ($content = $entry->{"c{$fieldid}_content"}) {
                $format = isset($entry->{"c{$fieldid}_content1"}) ? $entry->{"c{$fieldid}_content1"} : FORMAT_PLAIN;
                return format_text($content, $format, array('overflowdiv'=>true));
            }
        }

        return $str;
    }

    /**
     * Array of patterns this field supports
     */
    protected function patterns() {
        $fieldname = $this->_field->name();

        $patterns = parent::patterns();
        $patterns["[[$fieldname]]"] = array(true);

        return $patterns;
    }
}
