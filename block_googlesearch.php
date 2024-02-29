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

// Include the search form class
require_once($CFG->dirroot . '/blocks/googlesearch/classes/form/seachform.php');

class block_googlesearch extends block_base
{

    /**
     * Initializes the block.
     *
     * @return void
     */
    public function init()
    {
        // Set the title of the block
        $this->title = get_string('pluginname', 'block_googlesearch');
    }

    /**
     * Indicates whether the block has settings.
     *
     * @return bool
     */
    public function has_config()
    {
        return true;
    }

    /**
     * Gets the block contents.
     *
     * @return string The block HTML.
     */
    public function get_content()
    {

        if ($this->content !== null) {
            return $this->content;
        }

        $content = '';
        // Get Google API key and custom search ID
        $google_api_key = get_config(plugin: 'block_googlesearch', name: 'google_api_key');
        $google_custom_search_id = get_config(plugin: 'block_googlesearch', name: 'google_custom_search_id');

        // Create a new search form
        $mform = new seachform();
        // Render the search form and retrieve the content
        $content = $mform->render();
        // Check if Google API key and Custom Search ID are set
        if ($google_api_key && $google_custom_search_id) {

            if ($formdata = $mform->get_data()) {
                $searchterm = $formdata->searchterm;

                $query = urlencode($searchterm);

                // Create URL for Google search with obtained parameters
                $url = "https://www.googleapis.com/customsearch/v1?q=$query&key=$google_api_key&cx=$google_custom_search_id";

                // Fetch response from Google search
                $response = file_get_contents($url);

                // Decode response in JSON format
                $data = json_decode($response, true);
                // Process the response data
                if (isset($data['items'])) {
                    // If search results exist, display them
                    foreach ($data['items'] as $item) {
                        $content .= '<div class="item"><a href="' . $item['link'] . '">' . $item['title'] . '</a><br>' . $item['snippet'] . '</div>';
                    }
                } else {
                    // Display a message if no results are found
                    $content .= '<div class="item -warning">' . get_string(identifier: 'noresults', component: 'block_googlesearch') . '</div>';
                }
            }
        } else {
            // Display an error message if API keys are not set
            $content = '<div class="item -error">' . get_string(identifier: 'nokeys', component: 'block_googlesearch') . '</div>';
        }

        // Set the content of the block
        $this->content = new stdClass();
        $this->content->text = $content;

        return $this->content;
    }

    /**
     * Defines in which pages this block can be added.
     *
     * @return array Pages where the block can be added.
     */
    public function applicable_formats()
    {
        return [
            'admin' => false,
            'site-index' => true,
            'course-view' => false,
            'mod' => false,
            'my' => true,
        ];
    }
}
