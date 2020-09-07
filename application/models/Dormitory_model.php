<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dormitory_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

     // The function below insert into dormitory table //
     function createDormitoryFunction(){
        $page_data = array(
            'name'                  => html_escape($this->input->post('name')),
            'hostel_room_id'        => html_escape($this->input->post('hostel_room_id')),
            'hostel_category_id'    => html_escape($this->input->post('hostel_category_id')),
            'capacity'              => html_escape($this->input->post('capacity')),
            'address'               => html_escape($this->input->post('address')),
            'description'            => html_escape($this->input->post('description'))
		);

        $this->db->insert('dormitory', $page_data);
    }

// The function below update dormitory table //
    function updateDormitoryFunction($param2){
        $page_data = array(
            'name'                  => html_escape($this->input->post('name')),
            'hostel_room_id'        => html_escape($this->input->post('hostel_room_id')),
            'hostel_category_id'    => html_escape($this->input->post('hostel_category_id')),
            'capacity'              => html_escape($this->input->post('capacity')),
            'address'               => html_escape($this->input->post('address')),
            'description'            => html_escape($this->input->post('description'))
		);

        $this->db->where('dormitory_id', $param2);
        $this->db->update('dormitory', $page_data);
    }

    // The function below delete from dormitory table //
    function deleteDormitoryFunction($param2){
        $this->db->where('dormitory_id', $param2);
        $this->db->delete('dormitory');
    }


// The function below insert into hostel category table //
      function createHostelCategoryFunction(){
        $page_data = array(
            'name'               => html_escape($this->input->post('name')),
            'description'        => html_escape($this->input->post('description'))
		);
        $this->db->insert('hostel_category', $page_data);
    }

// The function below update hostel category table //
    function updateHostelCategoryFunction($param2){
        $page_data = array(
            'name'               => html_escape($this->input->post('name')),
            'description'        => html_escape($this->input->post('description'))
		);

        $this->db->where('hostel_category_id', $param2);
        $this->db->update('hostel_category', $page_data);
    }

    // The function below delete from hostel category table //
    function deleteHostelCategoryFunction($param2){
        $this->db->where('hostel_category_id', $param2);
        $this->db->delete('hostel_category');
    }


// The function below insert into hostel room table //
         function createHostelRoomFunction(){
            $page_data = array(
                'name'                  => html_escape($this->input->post('name')),
                'room_type'             => html_escape($this->input->post('room_type')),
                'num_bed'               => html_escape($this->input->post('num_bed')),
                'cost_bed'              => html_escape($this->input->post('cost_bed')),
                'description'            => html_escape($this->input->post('description'))
            );
    
            $this->db->insert('hostel_room', $page_data);
        }
    
    // The function below update hostel room table //
        function updateHostelRoomFunction($param2){
            $page_data = array(
                'name'                  => html_escape($this->input->post('name')),
                'room_type'             => html_escape($this->input->post('room_type')),
                'num_bed'               => html_escape($this->input->post('num_bed')),
                'cost_bed'              => html_escape($this->input->post('cost_bed')),
                'description'            => html_escape($this->input->post('description'))
            );
    
            $this->db->where('hostel_room_id', $param2);
            $this->db->update('hostel_room', $page_data);
        }
    
        // The function below delete from hostel room table //
        function deleteHostelRoomFunction($param2){
            $this->db->where('hostel_room_id', $param2);
            $this->db->delete('hostel_room');
        }
	


	
	
}

