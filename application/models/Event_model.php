<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Event_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    function createNoticeboardFunction(){

        $page_data['title'] =   html_escape($this->input->post('title'));
        $page_data['location'] =   html_escape($this->input->post('location'));
        $page_data['timestamp'] =   strtotime($this->input->post('timestamp'));
        $page_data['description'] =   html_escape($this->input->post('description'));

        $this->db->insert('noticeboard', $page_data);
        $sendphone  =   html_escape($this->input->post('sendsms'));

        if($sendphone == 1){
            $parents = $this->db->get('parent')->result_array();
            $teachers = $this->db->get('teacher')->result_array();
            $students = $this->db->get('student')->result_array();
            $senddate= html_escape($this->input->post('timestamp'));

            $message = $page_data['title']. ' ';
            $message .= get_phrase('on'). ' ' . $senddate;

            foreach($parents as $key => $parent){
                $recieverPhoneNumber = $parent['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }
            foreach($teachers as $key => $teacher){
                $recieverPhoneNumber = $teacher['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }
            foreach($students as $key => $student){
                $recieverPhoneNumber = $student['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }


        }
    }

    function updateNoticeboardFunction($param2){

        $page_data['title'] =   html_escape($this->input->post('title'));
        $page_data['location'] =   html_escape($this->input->post('location'));
        $page_data['timestamp'] =   strtotime($this->input->post('timestamp'));
        $page_data['description'] =   html_escape($this->input->post('description'));

        $this->db->where('noticeboard_id', $param2);
        $this->db->update('noticeboard', $page_data);
    }

    function deleteNoticeboardFunction($param2){
        $this->db->where('noticeboard_id', $param2);
        $this->db->delete('noticeboard');

    }
	


	
	
}

