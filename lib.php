<?php

function resume_add_instance($resume) {
    global $DB;

    // Try to store it in the database.
    $resume->id = $DB->insert_record('resume', $resume);

    return $resume->id;
}

function resume_update_instance($resume) {
    global $DB;

    // Get the resume.
    $oldresume = $DB->get_record('resume', array('id' => $resume->instance));

    // Update the title.
    $oldresume->name = $resume->name;

    // Save the record.
    $DB->update_record('resume', $oldresume);

    return true;
}

function resume_delete_instance($id) {
    global $DB;

    // Delete the instance.
    $DB->delete_records('resume', array('id' => $id));

    return true;
}
