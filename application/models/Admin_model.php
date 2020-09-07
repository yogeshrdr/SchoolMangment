<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function createNewAdministrator(){

        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['email']  = html_escape($this->input->post('email'));
        $page_data['phone']  = html_escape($this->input->post('phone'));
        $page_data['password']  = sha1($this->input->post('name'));
        $page_data['level']     = html_escape($this->input->post('level'));
        $this->db->insert('admin', $page_data);
        $admin_id = $this->db->insert_id();
        move_uploaded_file($_FILES['admin_image']['tmp_name'], 'uploads/admin_image/' . $admin_id . '.jpg');

        $page_data2['admin_id'] =  $admin_id;
        $this->db->insert('admin_role', $page_data2);


    }

    function deleteAdministrator($param2){
        
        $this->db->where('admin_id', $param2);
        $this->db->delete('admin');
    }

    function select_all_the_administrator_from_admin_table(){
        $all_selected_administrator = $this->db->get('admin');
        return $all_selected_administrator->result_array();

    }

    function updateAllDetailsForAdminRole($param2){
        $page_data['dashboard']  = html_escape($this->input->post('dashboard'));
        $page_data['manage_academics']  = html_escape($this->input->post('manage_academics'));
        $page_data['manage_employee']   = html_escape($this->input->post('manage_employee'));
        $page_data['manage_student']    = html_escape($this->input->post('manage_student'));
        $page_data['manage_attendance']     = html_escape($this->input->post('manage_attendance'));
        $page_data['download_page']     = html_escape($this->input->post('download_page'));
        $page_data['manage_parent']     = html_escape($this->input->post('manage_parent'));
        $page_data['manage_alumni']     = html_escape($this->input->post('manage_alumni'));

        $this->db->where('admin_id', $param2);
        $this->db->update('admin_role', $page_data);


    }

    
}