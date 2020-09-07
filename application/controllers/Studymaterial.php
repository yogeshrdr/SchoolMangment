
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Studymaterial extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
                $this->load->library('session');
                $this->load->model('material_model');
    }

    // The function below manage study material //
    function study_material($param1 = '', $param2 = '', $param3 = ''){

        if ($param1 == 'insert'){
        
        $this->material_model->inserIntoMaterial();
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
        redirect(base_url(). 'studymaterial/study_material', 'refresh');
        }
        
    if($param1 == 'update'){

        $this->material_model->updateStudyMaterial($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
        redirect(base_url(). 'studymaterial/study_material', 'refresh');
    }

    if($param1 == 'delete'){
        $this->material_model->deleteFromMaterial($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
        redirect(base_url(). 'studymaterial/study_material', 'refresh');
    }

        $page_data['page_name']         = 'study_material';
        $page_data['page_title']        = get_phrase('Study Material');
        $this->load->view('backend/index', $page_data);


    }
}