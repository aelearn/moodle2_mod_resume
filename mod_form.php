<?php

// This file must be included from another file.
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}
 
// Get some needed libraries.
require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/resume/lib.php');
 
class mod_resume_mod_form extends moodleform_mod
{
 
    public function definition()
    {
        $mform =& $this->_form;

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('resumename', 'start'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
 
        $this->standard_coursemodule_elements();
 
        $this->add_action_buttons();
    }
}
