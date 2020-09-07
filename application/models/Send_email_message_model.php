<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Send_email_message_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function sendMessageEmail(){

        $page_data['email_subject'] =   html_escape($this->input->post('email_subject'));
        $page_data['message']       =   html_escape($this->input->post('message'));

        
        
        // Declare varriables for sending email to single  user
        $studentsingle      =    html_escape($this->input->post('student'));
        $teachersingle      =    html_escape($this->input->post('teacher'));
        $adminsingle        =    html_escape($this->input->post('admin'));
        $librariansingle    =    html_escape($this->input->post('librarian'));
        $hostelsingle       =    html_escape($this->input->post('hostel'));
        $accountantsingle   =    html_escape($this->input->post('accountant'));
        $hrmsingle          =    html_escape($this->input->post('hrm'));
        // ends here.....
        
        // Declare varriables for sending email to all  users
        $student_email      =    html_escape($this->input->post('student_email'));
        $teacher_email      =    html_escape($this->input->post('teacher_email'));
        $admin_email        =    html_escape($this->input->post('admin_email'));
        $librarian_email    =    html_escape($this->input->post('librarian_email'));
        $hostel_email       =    html_escape($this->input->post('hostel_email'));
        $accountant_email   =    html_escape($this->input->post('accountant_email'));
        $hrm_email          =    html_escape($this->input->post('hrm_email'));
        $send_date          =    date('Y-d-m');
        // ends here.....


        //******************** Sending email message to all users starts here  ***********/

        if($student_email == 1){
            // email sending configurations
            $sudents     =   $this->db->get('student')->result_array();
            $message    =   $page_data['email_subject'];
            $message    =   $page_data['message'] . ' ';
            $message    .=  get_phrase('on') . ' ' .$send_date;

            foreach ($students as $key => $student){
                $receiverEmail  =   $student['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($teacher_email == 1){
            // email sending configurations
            $teachers   =   $this->db->get('teacher')->result_array();
            $message    =   $page_data['email_subject'];
            $message    =   $page_data['message'] . ' ';
            $message    .=  get_phrase('on') . ' ' .$send_date;

            foreach ($teachers as $key => $teacher){
                $receiverEmail  =   $teacher['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if ($admin_email == 1) {
            // email sending configurations
            $admins     = $this->db->get('admin')->result_array();
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;
           
            foreach ($admins as $key => $admin) {
                $receiverEmail = $admin['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if ($librarian_email == 1) {
            // email sending configurations
            $librarians     = $this->db->get('librarian')->result_array();
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;
           
            foreach ($librarians as $key => $librarian) {
                $receiverEmail = $librarian['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if ($hostel_email == 1) {
            // email sending configurations
            $hostels     = $this->db->get('hostel')->result_array();
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;
           
            foreach ($hostels as $key => $hostel) {
                $receiverEmail = $hostel['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if ($accountant_email == 1) {
            // email sending configurations
            $accountants= $this->db->get('accountant')->result_array();
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;
           
            foreach ($accountants as $key => $accountant) {
                $receiverEmail = $accountant['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if ($hrm_email == 1) {
            // email sending configurations
            $hrms       = $this->db->get('hrm')->result_array();
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;
           
            foreach ($hrms as $key => $hrm) {
                $receiverEmail = $hrm['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        //******************** / Sending email message to all users ends here  ***********/


        //******************** Sending email message to single user starts here  ***********/
        if($studentsingle != null || $studentsingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($studentsingle as $key => $student){
                $receiverEmail = $student['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($teachersingle != null || $teachersingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($teachersingle as $key => $teacher){
                $receiverEmail = $teacher['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($adminsingle != null || $adminsingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($adminsingle as $key => $admin){
                $receiverEmail = $admin['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($librariansingle != null || $librariansingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($librariansingle as $key => $librarian){
                $receiverEmail = $librarian['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($accountantsingle != null || $accountantsingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($accountantsingle as $key => $accountant){
                $receiverEmail = $accountant['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($hostelsingle != null || $hostelsingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($hostelsingle as $key => $hostel){
                $receiverEmail = $hostel['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        if($hrmsingle != null || $hrmsingle != ''){
            $message    = $data['email_subject'] . ' ';
			$message    = $data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            foreach($hrmsingle as $key => $hrm){
                $receiverEmail = $hrm['email'];
                $this->email_model->send_email($message, $receiverEmail);
            }
        }

        //******************** Sending email message to single user ends here  ***********/






    }



}