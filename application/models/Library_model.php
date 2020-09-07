<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Library_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }

    function createPublisherFunction(){

        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));
        $this->db->insert('publisher', $page_data);
        $publisher_id = $this->db->insert_id();

    }

    function updatePublisherFunction ($param2){
        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));

        $this->db->where('publisher_id', $param2);
        $this->db->update('publisher', $page_data);
    }


    function deletePublisherFunction($param2){
        $this->db->where('publisher_id', $param2);
        $this->db->delete('publisher');
    }


    function createBookCategoryFunction(){

        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));

        $this->db->insert('book_category', $page_data);
        $book_category_id = $this->db->insert_id();

    }

    function updateBookCategoryFunction ($param2){
        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));

        $this->db->where('book_category_id', $param2);
        $this->db->update('book_category', $page_data);
    }


    function deleteBookCategoryFunction($param2){
        $this->db->where('book_category_id', $param2);
        $this->db->delete('book_category');
    }


    function createAuthorFunction(){
        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));

        $this->db->insert('author', $page_data);
        $author_id = $this->db->insert_id();
    }

    function updateAuthorFunction ($param2){
        $page_data['name']  = html_escape($this->input->post('name'));
        $page_data['description']  = html_escape($this->input->post('description'));

        $this->db->where('author_id', $param2);
        $this->db->update('author', $page_data);
    }

    function deleteAuthorFunction($param2){
        $this->db->where('author_id', $param2);
        $this->db->delete('author');
    }


    function createBookFunction(){

        $page_data['name']              = html_escape($this->input->post('name'));
        $page_data['description']       = html_escape($this->input->post('description'));
        $page_data['author_id']         = html_escape($this->input->post('author_id'));
        $page_data['book_category_id']  = html_escape($this->input->post('book_category_id'));
        $page_data['publisher_id']      = html_escape($this->input->post('publisher_id'));
        $page_data['isbn']              = html_escape($this->input->post('isbn'));
        $page_data['edition']           = html_escape($this->input->post('edition'));
        $page_data['subject_id']        = html_escape($this->input->post('subject_id'));
        $page_data['quantity']          = html_escape($this->input->post('quantity'));
        $page_data['timestamp']         = strtotime($this->input->post('timestamp'));
        $page_data['class_id']          = html_escape($this->input->post('class_id'));
        $page_data['status']            = html_escape($this->input->post('status'));
        $page_data['price']             = html_escape($this->input->post('price'));
        $this->db->insert('book', $page_data);
        $book_id = $this->db->insert_id();
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/book_image/' . $book_id . '.jpg');			// image with user ID
    }

    function updateBookFunction($param2){

        $page_data['name']              = html_escape($this->input->post('name'));
        $page_data['description']       = html_escape($this->input->post('description'));
        $page_data['author_id']         = html_escape($this->input->post('author_id'));
        $page_data['book_category_id']  = html_escape($this->input->post('book_category_id'));
        $page_data['publisher_id']      = html_escape($this->input->post('publisher_id'));
        $page_data['isbn']              = html_escape($this->input->post('isbn'));
        $page_data['edition']           = html_escape($this->input->post('edition'));
        $page_data['subject_id']        = html_escape($this->input->post('subject_id'));
        $page_data['quantity']          = html_escape($this->input->post('quantity'));
        $page_data['timestamp']         = strtotime($this->input->post('timestamp'));
        $page_data['class_id']          = html_escape($this->input->post('class_id'));
        $page_data['status']            = html_escape($this->input->post('status'));
        $page_data['price']             = html_escape($this->input->post('price'));
        
        $this->db->where('book_id', $param2);
        $this->db->update('book', $page_data);
        move_uploaded_file($_FILES['bookimage']['tmp_name'], 'uploads/book_image/' . $param2 . '.jpg');

    }

    function deleteBookFunction ($param2){
        $this->db->where('book_id', $param2);
        $this->db->delete('book');
    }


	
	
}

