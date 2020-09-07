<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Vacancy_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    // The function below insert into vacancy table //
    function insetVacancyFunction(){

        $page_data = array(
            'name' => $this->input->post('name'),
            'number_of_vacancies' => $this->input->post('number_of_vacancies'),
            'last_date' => $this->input->post('last_date')
			);

        $this->db->insert('vacancy', $page_data);
    }

// The function below update vacancy table //
    function updateVacancyFunction($param2){
        $page_data = array(
            'name' => $this->input->post('name'),
            'number_of_vacancies' => $this->input->post('number_of_vacancies'),
            'last_date' => $this->input->post('last_date')
			);

        $this->db->where('vacancy_id', $param2);
        $this->db->update('vacancy', $page_data);
    }

    // The function below delete from vacancy table //
    function deleteVacancyFunction($param2){
        $this->db->where('vacancy_id', $param2);
        $this->db->delete('vacancy');
    }

	
	
}

