
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Department extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
        		$this->load->library('session');		
    }



        function department ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'insert'){
            $this->department_model->insertDepartmentFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'department/department', 'refresh');
        }

        if($param1 == 'update'){
            $this->department_model->updateDepartmentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'department/department', 'refresh');
        }


        if($param1 == 'delete'){
            $this->department_model->deleteDepartmentFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'department/department', 'refresh');
            }


        $page_data['page_name']     = 'department';
        $page_data['page_title']    = get_phrase('Manage Department');
        $page_data['select_department']  = $this->db->get('department')->result_array();
        $this->load->view('backend/index', $page_data);

        }


        function delete_designation($department_id = ''){

            $this->db->where('department_id', $department_id);
            $this->db->delete('designation');
            echo 'success';
        }


}