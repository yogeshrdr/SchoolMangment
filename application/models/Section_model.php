<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Section_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    // The function below insert into section table //
    function createSectionFunction(){

        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'nick_name'     => html_escape($this->input->post('nick_name')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'teacher_id'    => html_escape($this->input->post('teacher_id'))
	    );

        $this->db->insert('section', $page_data);
    }

// The function below update section table //
    function updateSectionFunction($param2){
        $page_data = array(
            'name'          => html_escape($this->input->post('name')),
            'nick_name'     => html_escape($this->input->post('nick_name')),
            'class_id'      => html_escape($this->input->post('class_id')),
            'teacher_id'    => html_escape($this->input->post('teacher_id'))
	    );

        $this->db->where('section_id', $param2);
        $this->db->update('section', $page_data);
    }

    // The function below delete from section table //
    function deleteSectionFunction($param2){
        $this->db->where('section_id', $param2);
        $this->db->delete('section');
    }
	
	
}

