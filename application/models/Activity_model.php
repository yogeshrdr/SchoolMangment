<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Activity_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function createActivity(){

        $page_data['name']           =   html_escape($this->input->post('name'));
        $page_data['colour']         =   html_escape($this->input->post('colour'));
        $page_data['club_id']        =   html_escape($this->input->post('club_id'));
        $page_data['icon']           =   html_escape($this->input->post('icon'));
        $page_data['description']    =   html_escape($this->input->post('description'));
        $page_data['date']           =   html_escape($this->input->post('date'));

        $this->db->insert('activity', $page_data);
    }

    function updateActivity($param2){
        $page_data['name']           =   html_escape($this->input->post('name'));
        $page_data['colour']         =   html_escape($this->input->post('colour'));
        $page_data['club_id']        =   html_escape($this->input->post('club_id'));
        $page_data['icon']           =   html_escape($this->input->post('icon'));
        $page_data['description']    =   html_escape($this->input->post('description'));
        $page_data['date']           =   html_escape($this->input->post('date'));

        $this->db->where('activity_id', $param2);
        $this->db->update('activity', $page_data);
    }

    function deleteActivity($param2){
        $this->db->where('activity_id', $param2);
        $this->db->delete('activity');
    }
	
	
}
