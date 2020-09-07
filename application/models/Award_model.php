<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Award_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }
    
    
     // The function below insert into award table //
     function createAwardFunction(){

        $page_data = array(
            'award_code'    => $this->input->post('award_code'),
            'name'          => $this->input->post('name'),
            'gift'          => $this->input->post('gift'),
            'amount'        => $this->input->post('amount'),
            'date'          => $this->input->post('date'),
            'user_id'       => $this->input->post('user_id')
			);

        $this->db->insert('award', $page_data);
    }

// The function below update award table //
    function updateAwardFunction($param2){
        $page_data = array(
            'name'      => html_escape($this->input->post('name')),
            'gift'      => html_escape($this->input->post('gift')),
            'amount'    => html_escape($this->input->post('amount')),
            'date'      => html_escape($this->input->post('date')),
            'user_id'   => html_escape($this->input->post('user_id'))
	);

        $this->db->where('award_code', $param2);
        $this->db->update('award', $page_data);
    }

    // The function below delete from award table //
    function deleteAwardFunction($param2){
        $this->db->where('award_code', $param2);
        $this->db->delete('award');
    }


	
	
}

