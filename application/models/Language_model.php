<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Language_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function createNewLanguage(){
        
        $language   =   $this->input->post('language');
        $this->load->dbforge();

        $fields =   array(
            $language => array('type' => 'LONGTEXT')
        );

        $this->dbforge->add_column('language', $fields);

    }


    function createNewLanguagePhrase(){

        $page_data['phrase']    = html_escape($this->input->post('phrase'));
        $this->db->insert('language', $page_data);


        
    }

    function deleteLanguage($param2){

        $language   =   $param2;
        $this->load->dbforge();
        $this->dbforge->drop_column('language', $language);
        
    }


}


