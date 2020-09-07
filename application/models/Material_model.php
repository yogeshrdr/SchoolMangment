<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Material_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }
	
   // The function below inserts into material table //
   function inserIntoMaterial(){
    $page_data = array(
        'name'                      => $this->input->post('name'),
        'description'               => $this->input->post('description'),
        'class_id'                  => $this->input->post('class_id'),
        'subject_id'                => $this->input->post('subject_id'),
        'teacher_id'                => $this->input->post('teacher_id'),
        'timestamp'                 => $this->input->post('timestamp'),
        'file_type'                 => $this->input->post('file_type')
    );
    

//uploading file using codeigniter upload library
    $files = $_FILES['file_name'];
    $this->load->library('upload');
    $config['upload_path'] = 'uploads/study_material/';
    $config['allowed_types'] = '*';
    $_FILES['file_name']['name'] = $files['name'];
    $_FILES['file_name']['type'] = $files['type'];
    $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
    $_FILES['file_name']['size'] = $files['size'];
    $this->upload->initialize($config);
    $this->upload->do_upload('file_name');

$page_data['file_name'] = $_FILES['file_name']['name'];
$this->db->insert('material', $page_data);
}

 // The function below updates material table //
 function updateStudyMaterial($param2){
    $page_data = array(
        'name'                      => $this->input->post('name'),
        'description'               => $this->input->post('description'),
        'class_id'                  => $this->input->post('class_id'),
        'subject_id'                => $this->input->post('subject_id'),
        'teacher_id'                => $this->input->post('teacher_id'),
        'timestamp'                 => $this->input->post('timestamp'),
        'file_type'                 => $this->input->post('file_type')
    );

$this->db->where('material_id', $param2);
$this->db->update('material', $page_data);
}

// The function below delete from material table //
function deleteFromMaterial($param2){
    $this->db->where('material_id', $param2);
    $this->db->delete('material');
}


	
	
}

