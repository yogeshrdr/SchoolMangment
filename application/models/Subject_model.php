<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Subject_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    // The function below insert into subject table //
    function createSubjectFunction(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'teacher_id'    => html_escape($this->input->post('teacher_id'))
	    );

        $this->db->insert('subject', $page_data);
    }

// The function below update subject table //
    function updateSubjectFunction($param2){
        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'teacher_id'    => html_escape($this->input->post('teacher_id'))
	    );

        $this->db->where('subject_id', $param2);
        $this->db->update('subject', $page_data);
    }

    // The function below delete from subject table //
    function deleteSubjectFunction($param2){
        $this->db->where('subject_id', $param2);
        $this->db->delete('subject');
    }
	
	
}

