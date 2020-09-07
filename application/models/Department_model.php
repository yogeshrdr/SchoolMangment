<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Department_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function insertDepartmentFunction(){

        $department_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['department_code']    = $department_code;
        $data['name']               = $this->input->post('name');
        $this->db->insert('department',$data);
        $department_id              = $this->db->insert_id();
        $designation                = $this->input->post('designation');
        
        foreach ($designation as $designation):
            if($designation != ""):
            $data2['department_id'] = $department_id;
            $data2['name']          = $designation;
            $this->db->insert('designation',$data2);
        endif;
        endforeach;
    }

// The function below upate update department and designation function //
    function updateDepartmentFunction($department_code = ''){
        $department_id  = $this->db->get_where('department', array('department_code' => $department_code))->row()->department_id;
        
        $data['name']   = $this->input->post('name');
        
        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data);
        
        // UPDATE EXISTING DESIGNATIONS
        $designations = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach ($designations as $row):
           $data2['name'] = $this->input->post('designation_' . $row['designation_id']);
           $this->db->where('designation_id',  $row['designation_id']);
           $this->db->update('designation', $data2);
        endforeach;
        
        // CREATE NEW DESIGNATIONS
        $designations = $this->input->post('designation');
        
        foreach($designations as $designation)
            if($designation != ""):
                $data3['department_id'] = $department_id;
                $data3['name']          = $designation;
                $this->db->insert('designation', $data3);
        endif;

    }

     //DELETE DEPARTMENT
    function deleteDepartmentFunction($department_code = ''){

        $department_id = $this->db->get_where('department',array('department_code'=>$department_code))->row()->department_id;
        $this->db->where('department_id',$department_id);
        $this->db->delete('designation');

        $this->db->where('department_id',$department_id);
        $this->db->delete('department');
    }

	


	
	
}
