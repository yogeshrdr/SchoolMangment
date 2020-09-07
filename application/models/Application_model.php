<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Application_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    // The function below insert into application table //
    function insertApplicantFunction(){

        $page_data = array(
            'applicant_name' => $this->input->post('applicant_name'),
            'vacancy_id' => $this->input->post('vacancy_id'),
            'apply_date' => strtotime($this->input->post('apply_date')),
            'status' => $this->input->post('status')
			);

        $this->db->insert('application', $page_data);
    }

// The function below update application table //
    function updateApplicantFunction($param2){
        $page_data = array(
            'applicant_name' => $this->input->post('applicant_name'),
            'vacancy_id' => $this->input->post('vacancy_id'),
            'apply_date' => strtotime($this->input->post('apply_date')),
            'status' => $this->input->post('status')
			);

        $this->db->where('application_id', $param2);
        $this->db->update('application', $page_data);
    }

    // The function below delete from application table //
    function deleteApplicantFunction($param2){
        $this->db->where('application_id', $param2);
        $this->db->delete('application');
    }

	


	
	
}

