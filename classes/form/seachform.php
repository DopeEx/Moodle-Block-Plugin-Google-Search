<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version metadata for the repository_pluginname plugin.
 *
 * @package   block_googlesearch
 * @copyright 2024, Alexander Schröter
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class seachform extends moodleform
{
    public function definition()
    {
        // Get the moodleform instance
        $mform = $this->_form;

        // Add a text input element for the search term
        $mform->addElement('text', 'searchterm');

        // Set the type of input to PARAM_NOTAGS
        $mform->setType('searchterm', PARAM_NOTAGS);

        // Add action buttons to the form
        // The first parameter indicates whether to include a cancel button (false in this case)
        // The second parameter is the label for the submit button
        $this->add_action_buttons(false, get_string(identifier: 'searchbtn', component: 'block_googlesearch'));
    }
}
