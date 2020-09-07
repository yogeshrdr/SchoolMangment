<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Social_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function createSocialCategory(){

        $page_data['name']           =   html_escape($this->input->post('name'));
        $page_data['colour']         =   html_escape($this->input->post('colour'));
        $page_data['icon']           =   html_escape($this->input->post('icon'));
        $page_data['description']    =   html_escape($this->input->post('description'));

        $this->db->insert('social_category', $page_data);
    }

    function updateSocialCategory($param2){
        $page_data['name']           =   html_escape($this->input->post('name'));
        $page_data['colour']         =   html_escape($this->input->post('colour'));
        $page_data['icon']           =   html_escape($this->input->post('icon'));
        $page_data['description']    =   html_escape($this->input->post('description'));

        $this->db->where('social_category_id', $param2);
        $this->db->update('social_category', $page_data);
    }

    function deleteSocialCategory($param2){
        $this->db->where('social_category_id', $param2);
        $this->db->delete('social_category');
    }
	
	
}
