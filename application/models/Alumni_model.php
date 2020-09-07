<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Alumni_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }



    function insert_alumni(){
        $page_data = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
        	'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'marital_status' => $this->input->post('marital_status'),
			'g_year' => $this->input->post('g_year'),
        	'club_id' => $this->input->post('club_id'),
        	'interest' => $this->input->post('interest')
			);

            $page_data['email'] = $this->input->post('email');
            $check_email = $this->db->get_where('alumni', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
            if($check_email != null) 
            {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            redirect(base_url() . 'admin/alumni/', 'refresh');
            }
            else
            {
            $this->db->insert('alumni', $page_data);
            $alumni_id = $this->db->insert_id();
            
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/alumni_image/' . $alumni_id . '.jpg');			// image with user ID
                //$this->email_model->account_opening_email('librarian', $data['email']); //Send email to receipient email adddrress upon account opening
        }
    }


    function update_alumni($param2){
        $page_data = array(
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
        	'address' => $this->input->post('address'),
            'profession' => $this->input->post('profession'),
            'marital_status' => $this->input->post('marital_status'),
			'g_year' => $this->input->post('g_year'),
        	'club_id' => $this->input->post('club_id'),
        	'interest' => $this->input->post('interest')
			);

        $this->db->where('alumni_id', $param2);
        $this->db->update('alumni', $page_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/alumni_image/' . $param2 . '.jpg');
    }

    function delete_alumni($param2){
        $this->db->where('alumni_id', $param2);
        $this->db->delete('alumni');
    }

	


	
	
}
