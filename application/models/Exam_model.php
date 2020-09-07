<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Exam_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    // The function below insert into exam table //
    function createExamination(){
        $page_data = array(
            'name'      => $this->input->post('name'),
            'comment'   => $this->input->post('comment'),
            'timestamp' => $this->input->post('timestamp')
		);

        $this->db->insert('exam', $page_data);
    }


    // The function below update update exam table //
    function updateExamination($param2){
        $page_data = array(
            'name'      => $this->input->post('name'),
            'comment'   => $this->input->post('comment'),
            'timestamp' => $this->input->post('timestamp')
		);
        $this->db->where('exam_id', $param2);
        $this->db->update('exam', $page_data);
    }

    // The function below delete from exam table //
    function deleteExamination($param2){
        $this->db->where('exam_id', $param2);
        $this->db->delete('exam');
    }
	


	
	
}

