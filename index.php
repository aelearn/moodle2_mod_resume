<?php
require_once('../../config.php');

// Get the course's id.
$id = required_param('id', PARAM_INT);
 
// Ensure that the course specified is valid.
if (!$course = $DB->get_record('course', array('id'=> $id))) {
    print_error('Course ID is incorrect');
}
