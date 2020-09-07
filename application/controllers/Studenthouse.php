
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Studenthouse extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');
                $this->load->model('student_model');            // Load studemt model here
    }


    /***********  The function manages house ***********************/
    function studentHouse ($param1 = null, $param2 = null, $param3 = null)
    {
        if($param1 == 'create'){
            $this->student_model->createStudentHouse();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'studenthouse/studentHouse', 'refresh');
        }

        if($param1 == 'update')
        {
            $this->student_model->updateStudentHouse($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'studenthouse/studentHouse', 'refresh');
        }


        if($param1 == 'delete'){
            $this->student_model->deleteStudentHouse($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'studenthouse/studentHouse', 'refresh');

        }

        $page_data['page_name']     = 'studentHouse';
        $page_data['page_title']    = get_phrase('Manage House');
        $this->load->view('backend/index', $page_data);

    }




}