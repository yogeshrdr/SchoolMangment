<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Leave_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    // The function below update leave table //
    function updateLeaveFunction($param2){
        $page_data = array(
            'status' => $this->input->post('status'),
			);

        $this->db->where('leave_code', $param2);
        $this->db->update('leave', $page_data);
    }

    // The function below delete from leave table //
    function deleteLeaveFunction($param2){
        $this->db->where('leave_code', $param2);
        $this->db->delete('leave');
    }
	


	
	
}

