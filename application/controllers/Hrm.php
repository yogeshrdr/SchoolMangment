<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Hrm extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                                //Load Databse Class
                $this->load->library('session');					    //Load library for session
                $this->load->model('vacancy_model');
                $this->load->model('application_model');
                $this->load->model('leave_model');
                $this->load->model('payroll_model');
                $this->load->model('award_model');
    }

     /*HRM dashboard code to redirect to HRM page if successfull login** */
     function dashboard() {
        if ($this->session->userdata('hrm_login') != 1) redirect(base_url(), 'refresh');
       	$page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('HRM Dashboard');
        $this->load->view('backend/index', $page_data);
    }
	/******************* / HRM dashboard code to redirect to HRM page if successfull login** */

    function manage_profile($param1 = null, $param2 = null, $param3 = null){
        if ($this->session->userdata('hrm_login') != 1) redirect(base_url(), 'refresh');
        if ($param1 == 'update') {
    
    
            $data['name']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->db->where('hrm_id', $this->session->userdata('hrm_id'));
            $this->db->update('hrm', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hrm_image/' . $this->session->userdata('hrm_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
            redirect(base_url() . 'hrm/manage_profile', 'refresh');
           
        }
    
        if ($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               
               $this->db->where('hrm_id', $this->session->userdata('hrm_id'));
               $this->db->update('hrm', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
            }
    
            else{
                $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
            }
            redirect(base_url() . 'hrm/manage_profile', 'refresh');
        }
    
            $page_data['page_name']     = 'manage_profile';
            $page_data['page_title']    = get_phrase('Manage Profile');
            $page_data['edit_profile']  = $this->db->get_where('hrm', array('hrm_id' => $this->session->userdata('hrm_id')))->result_array();
            $this->load->view('backend/index', $page_data);
        }


        function get_designation($department_id = null){

            $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
            foreach($designation as $key => $row)
            echo '<option value="'.$row['designation_id'].'">' . $row['name'] . '</option>';
        }
    
        /***********  The function manages vacancy   ***********************/
        function vacancy ($param1 = null, $param2 = null, $param3 = null){
    
            if($param1 == 'insert'){
                $this->vacancy_model->insetVacancyFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'hrm/vacancy', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->vacancy_model->updateVacancyFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/vacancy', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->vacancy_model->deleteVacancyFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'hrm/vacancy', 'refresh');
        
            }
    
            $page_data['page_name']     = 'vacancy';
            $page_data['page_title']    = get_phrase('Manage Vacancy');
            $page_data['select_vacancy']  = $this->db->get('vacancy')->result_array();
            $this->load->view('backend/index', $page_data);
    
        }
    
    
        /***********  The function manages job applicant   ***********************/
        function application ($param1 = 'applied', $param2 = null, $param3 = null){
    
            if($param1 == 'insert'){
                $this->application_model->insertApplicantFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                redirect(base_url(). 'hrm/application', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->application_model->updateApplicantFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/application', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->application_model->deleteApplicantFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'hrm/application', 'refresh');
        
            }
    
            if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interviewed' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 ='applied';
    
            
            
            $page_data['status']        = $param1;
            $page_data['page_name']     = 'application';
            $page_data['page_title']    = get_phrase('Job Applicant');
            $this->load->view('backend/index', $page_data);
    
        }
    
    
        /***********  The function manages Leave  ***********************/
        function leave ($param1 = null, $param2 = null, $param3 = null){
    
            if($param1 == 'update'){
                $this->leave_model->updateLeaveFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/leave', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->leave_model->deleteLeaveFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'hrm/leave', 'refresh');
        
            }
            
            $page_data['page_name']     = 'leave';
            $page_data['page_title']    = get_phrase('Manage Leave');
            $this->load->view('backend/index', $page_data);
    
        }
    
    
        /***********  The function manages Awards  ***********************/
        function award ($param1 = null, $param2 = null, $param3 = null){
    
            if($param1 == 'create'){
                $this->award_model->createAwardFunction();
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/award', 'refresh');
            }
    
            if($param1 == 'update'){
                $this->award_model->updateAwardFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/award', 'refresh');
            }
    
    
            if($param1 == 'delete'){
                $this->award_model->deleteAwardFunction($param2);
                $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                redirect(base_url(). 'hrm/award', 'refresh');
        
            }
    
            $page_data['page_name']     = 'award';
            $page_data['page_title']    = get_phrase('Manage Award');
            $this->load->view('backend/index', $page_data);
    
        }
    
        function payroll(){
            
            $page_data['page_name']     = 'payroll_add';
            $page_data['page_title']    = get_phrase('Create Payslip');
            $this->load->view('backend/index', $page_data);
    
        }
    
        function get_employees($department_id = null)
        {
            $employees = $this->db->get_where('teacher', array('department_id' => $department_id))->result_array();
            foreach($employees as $key => $employees)
                echo '<option value="' . $employees['teacher_id'] . '">' . $employees['name'] . '</option>';
        }
    
        function payroll_selector()
        {
            $department_id  = $this->input->post('department_id');
            $employee_id    = $this->input->post('employee_id');
            $month          = $this->input->post('month');
            $year           = $this->input->post('year');
            
            redirect(base_url() . 'hrm/payroll_view/' . $department_id. '/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
        }
        
        function payroll_view($department_id = null, $employee_id = null, $month = null, $year = null)
        {
            $page_data['department_id'] = $department_id;
            $page_data['employee_id']   = $employee_id;
            $page_data['month']         = $month;
            $page_data['year']          = $year;
            $page_data['page_name']     = 'payroll_add_view';
            $page_data['page_title']    = get_phrase('Create Payslip');
            $this->load->view('backend/index', $page_data);
        }
    
    
        function create_payroll(){
    
            $this->payroll_model->insertPayrollFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'hrm/payroll_list/filter2/'. $this->input->post('month').'/'. $this->input->post('year'), 'refresh');
        }
    
    
        /***********  The function manages Payroll List  ***********************/
        function payroll_list ($param1 = null, $param2 = null, $param3 = null, $param4 = null){
    
            if($param1 == 'mark_paid'){
                
                $data['status'] =  1;
                $this->db->update('payroll', $data, array('payroll_id' => $param2));
    
                $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                redirect(base_url(). 'hrm/payroll_list/filter2/'. $param3.'/'. $param4, 'refresh');
            }
    
            if($param1 == 'filter'){
                $page_data['month'] = $this->input->post('month');
                $page_data['year'] = $this->input->post('year');
            }
            else{
                $page_data['month'] = date('n');
                $page_data['year'] = date('Y');
            }
    
            if($param1 == 'filter2'){
                
                $page_data['month'] = $param2;
                $page_data['year'] = $param3;
            }
    
    
            $page_data['page_name']     = 'payroll_list';
            $page_data['page_title']    = get_phrase('List Payroll');
            $this->load->view('backend/index', $page_data);
    
        }

}