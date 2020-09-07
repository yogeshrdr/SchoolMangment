
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Activity extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');
                $this->load->model('activity_model');            // Load activity model here
    }


    /***********  The function manages social category ***********************/
    function clubActivity ($param1 = null, $param2 = null, $param3 = null)
    {
        if($param1 == 'create'){
            $this->activity_model->createActivity();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'activity/clubActivity', 'refresh');
        }

        if($param1 == 'update')
        {
            $this->activity_model->updateActivity($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'activity/clubActivity', 'refresh');
        }


        if($param1 == 'delete'){
            $this->activity_model->deleteActivity($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'activity/clubActivity', 'refresh');

        }

        $page_data['page_name']     = 'clubActivity';
        $page_data['page_title']    = get_phrase('Activity Category');
        $this->load->view('backend/index', $page_data);

    }




}