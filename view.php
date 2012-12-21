<?php

// Get the necessary files.
require_once('../../config.php');
require_once('lib.php');
 
// Get the course module ID.
$id = required_param('id', PARAM_INT);
 
// Get the course module.
if (!$cm = get_coursemodule_from_id('resume', $id)) {
    print_error('Course Module ID was incorrect');
}

// Get the course.
if (!$course = $DB->get_record('course', array('id'=> $cm->course))) {
    print_error('course is misconfigured');
}

// Get the most recent item visited.
$logentryquery = trim('
    SELECT module, url
    FROM {log}
    WHERE userid = ?
    AND course = ?
    AND module <> "course"
    AND module <> "resume"
    ORDER BY time DESC
');
$logentryparameters = array($USER->id, $course->id);
$logentry = $DB->get_records_sql($logentryquery, $logentryparameters, 0, 1);
$logentry = array_pop($logentry);

// Redirect to the correct place.
if (is_object($logentry) && $logentry->module) {
    redirect($CFG->wwwroot . "/mod/" . $logentry->module . "/"
            . $logentry->url);
}
redirect("$CFG->wwwroot/course/view.php?id=$course->id");
