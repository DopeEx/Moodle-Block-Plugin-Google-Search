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

if ($ADMIN->fulltree) {
    $settings->add(
        new admin_setting_configtext(
            'block_googlesearch/google_api_key',
            visiblename: get_string(identifier: 'google_api_key', component: 'block_googlesearch'),
            description: get_string(identifier: 'google_api_key_desc', component: 'block_googlesearch'),
            defaultsetting: ''
        )
    );
    $settings->add(
        new admin_setting_configtext(
            'block_googlesearch/google_custom_search_id',
            visiblename: get_string(identifier: 'google_custom_search_id', component: 'block_googlesearch'),
            description: get_string(identifier: 'google_custom_search_id_desc', component: 'block_googlesearch'),
            defaultsetting: ''
        )
    );
}
