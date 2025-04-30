<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin version and other meta-data are defined here.
 *
 * @package     local_greetings
 * @copyright   2025 kyh174 <kyh174@naver.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Insert a link to index.php on the site front page navigation menu.
 * 
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_commentboard_extend_navigation_frontpage(navigation_node $frontpage) {
    $frontpage->add(
        get_string('pluginname', 'local_commentboard'),
        new moodle_url('/local/commentboard/index.php'),
        navigation_node::TYPE_CUSTOM,
    );
}

/**
 * Log data to the browser console.
 * 
 * @param mixed $data Data to log.
 */
function console_log($data) {
    echo '<script>console.log(' . json_encode($data) . ');</script>';
}