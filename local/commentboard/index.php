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

require_once('../../config.php');
require_once($CFG->dirroot . '/local/commentboard/lib.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/local/commentboard/index.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pluginname', 'local_commentboard'));
$PAGE->set_heading(get_string('pluginname', 'local_commentboard'));

echo $OUTPUT->header();

$commentform = new \local_commentboard\form\comment_form();
$commentform->display();

$comments = $DB->get_records('local_commentboard_comments');

foreach ($comments as $c) {
    echo '<p>' . $c->comment . '</p>';
}

if ($data = $commentform->get_data()) {
    $comment = required_param('comment', PARAM_TEXT);

    if (!empty($comment)) {
        $record = new stdClass();
        $record->comment = $comment;
        $record->timecreated = time();

        $DB->insert_record('local_commentboard_comments', $record);
    }
}

echo $OUTPUT->footer();
