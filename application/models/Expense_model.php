<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Expense_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    function insertExpenseCategory(){

        $page_data = array(
            'name' => $this->input->post('name'),
			);

        $this->db->insert('expense_category', $page_data);
    }

// The function below upate expense category //
    function updateExpenseCategory($param2){
        $page_data = array(
            'name' => $this->input->post('name'),
			);

        $this->db->where('expense_category_id', $param2);
        $this->db->update('expense_category', $page_data);
    }

    function deleteExpenseCategory($param2){
        $this->db->where('expense_category_id', $param2);
        $this->db->delete('expense_category');
    }


    function insertExpense(){

        $page_data['title']                         =   $this->input->post('title');
        $page_data['expense_category_id']           =   $this->input->post('expense_category_id');
        $page_data['description']                   =   $this->input->post('description');
        $page_data['payment_type']                  =  'expense';
        $page_data['method']                        =   $this->input->post('method');
        $page_data['amount']                        =   $this->input->post('amount');
        $page_data['timestamp']                     =   $this->input->post('timestamp');
        $page_data['year']                          =   $this->db->get_where('settings', array('type' => 'session'))->row()->description;
        $this->db->insert('payment', $page_data);
    }

    function updateExpense($param2){

        $page_data['title']                         =   $this->input->post('title');
        $page_data['expense_category_id']           =   $this->input->post('expense_category_id');
        $page_data['description']                   =   $this->input->post('description');
        $page_data['payment_type']                  =  'expense';
        $page_data['method']                        =   $this->input->post('method');
        $page_data['amount']                        =   $this->input->post('amount');
        $page_data['timestamp']                     =   strtotime($this->input->post('timestamp'));

        $this->db->where('payment_id', $param2);
        $this->db->update('payment', $page_data);
    }

    function deleteExpense($param2){
        $this->db->where('payment_id', $param2);
        $this->db->delete('payment');
    }
	
	
}
