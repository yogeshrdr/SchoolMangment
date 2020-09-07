
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Socialcategory extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');
                $this->load->model('social_model');            // Load social model here
    }


    /***********  The function manages social category ***********************/
    function socialCategory ($param1 = null, $param2 = null, $param3 = null)
    {
        if($param1 == 'create'){
            $this->social_model->createSocialCategory();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'socialcategory/socialCategory', 'refresh');
        }

        if($param1 == 'update')
        {
            $this->social_model->updateSocialCategory($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'socialcategory/socialCategory', 'refresh');
        }


        if($param1 == 'delete'){
            $this->social_model->deleteSocialCategory($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'socialcategory/socialCategory', 'refresh');

        }

        $page_data['page_name']     = 'socialCategory';
        $page_data['page_title']    = get_phrase('Social Category');
        $this->load->view('backend/index', $page_data);

    }




}