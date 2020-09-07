
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Smssetting extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');
                $this->load->model('sms_model');    // laoding sms model from controller
    }


    function sms_settings($param1 = null, $param2 = null, $param3 = null){

    if ($param1 == 'clickatell'){
    $this->sms_model->UpdateClickattelSms();
    $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
    redirect(base_url(). 'smssetting/sms_settings', 'refresh');
    }

    if($param1 == 'msg91'){
        $this->sms_model->UpdateMsg91lSms();
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
        redirect(base_url(). 'smssetting/sms_settings', 'refresh');
    }

    if($param1 == 'sms_active'){
        $this->sms_model->setSmsGatewayActive();
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
        redirect(base_url(). 'smssetting/sms_settings', 'refresh');
    }
    
    $page_data['page_name']         = 'sms_settings';
    $page_data['page_title']        = get_phrase('SMS Settings');
    $this->load->view('backend/index', $page_data);

    }




}