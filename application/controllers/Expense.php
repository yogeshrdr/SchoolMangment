
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Expense extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();
        		$this->load->library('session');
    }


    function expense_category($param1 = '', $param2 = '', $param3 = ''){


    if ($param1 == 'insert'){

    $this->expense_model->insertExpenseCategory();
    $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
    redirect(base_url(). 'expense/expense_category', 'refresh');
    }


    if($param1 == 'update'){

        $this->expense_model->updateExpenseCategory($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
        redirect(base_url(). 'expense/expense_category', 'refresh');

    }

    if($param1 == 'delete'){
        $this->expense_model->deleteExpenseCategory($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
        redirect(base_url(). 'expense/expense_category', 'refresh');

    }

    $page_data['page_name']         = 'expense_category';
    $page_data['page_title']        = get_phrase('Expense Category');
    $page_data['select_expense_category']        = $this->db->get('expense_category')->result_array();
    $this->load->view('backend/index', $page_data);

    }



    // The function below manage expense //
    function expense($param1 = '', $param2 = '', $param3 = ''){

        if ($param1 == 'insert'){
        
        $this->expense_model->insertExpense();
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
        redirect(base_url(). 'expense/expense', 'refresh');
        }
        
    if($param1 == 'update'){

        $this->expense_model->updateExpense($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
        redirect(base_url(). 'expense/expense', 'refresh');
    }

    if($param1 == 'delete'){
        $this->expense_model->deleteExpense($param2);
        $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
        redirect(base_url(). 'expense/expense', 'refresh');
    }

        $page_data['page_name']         = 'expense';
        $page_data['page_title']        = get_phrase('Manage Expense');
        $page_data['select_expense']        = $this->db->get('payment')->result_array();
        $this->load->view('backend/index', $page_data);


    }











}