<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Exam_question_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }
	
    // The function below inserts into exam question table //
    function createexamQuestion(){
        $page_data = array(
            'name'                      => html_escape($this->input->post('name')),
            'description'               => html_escape($this->input->post('description')),
            'class_id'                  => html_escape($this->input->post('class_id')),
            'subject_id'                => html_escape($this->input->post('subject_id')),
            'teacher_id'                => html_escape($this->input->post('teacher_id')),
            'timestamp'                 => html_escape($this->input->post('timestamp')),
            'file_type'                 => html_escape($this->input->post('file_type')),
            'status'                    => html_escape($this->input->post('status'))
        );
        

        //uploading file using codeigniter upload library
        $files = $_FILES['file_name'];
        $this->load->library('upload');
        $config['upload_path'] = 'uploads/exam_question/';
        $config['allowed_types'] = '*';
        $_FILES['file_name']['name'] = $files['name'];
        $_FILES['file_name']['type'] = $files['type'];
        $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
        $_FILES['file_name']['size'] = $files['size'];
        $this->upload->initialize($config);
        $this->upload->do_upload('file_name');

        $page_data['file_name'] = $_FILES['file_name']['name'];
        $this->db->insert('exam_question', $page_data);
    }

    // The function below updates exam question table //
    function updateexamQuestion($param2){
        $page_data = array(
            'name'                      => html_escape($this->input->post('name')),
            'description'               => html_escape($this->input->post('description')),
            'class_id'                  => html_escape($this->input->post('class_id')),
            'subject_id'                => html_escape($this->input->post('subject_id')),
            'teacher_id'                => html_escape($this->input->post('teacher_id')),
            'timestamp'                 => html_escape($this->input->post('timestamp')),
            'file_type'                 => html_escape($this->input->post('file_type')),
            'status'                    => html_escape($this->input->post('status'))
        );

        $this->db->where('exam_question_id', $param2);
        $this->db->update('exam_question', $page_data);
    }

    // The function below delete from exam question table //
    function deleteexamQuestion($param2){
        $this->db->where('exam_question_id', $param2);
        $this->db->delete('exam_question');
    }


	
	
}

