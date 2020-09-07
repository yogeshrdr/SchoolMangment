<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student_payment_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
    }



        function createStudentSinglePaymentFunction (){

            $page_data['invoice_number']    =   html_escape($this->input->post('invoice_number')) + rand(10000, 1000000);
            $page_data['student_id']        =   html_escape($this->input->post('student_id'));
            $page_data['title']             =   html_escape($this->input->post('title'));
            $page_data['description']       =   html_escape($this->input->post('description'));
            $page_data['amount']            =   html_escape($this->input->post('amount'));
            $page_data['discount']          =   html_escape($this->input->post('discount'));
            $page_data['amount_paid']       =   html_escape($this->input->post('amount_paid'));
            $page_data['due']               =   $page_data['amount']  - $page_data['amount_paid'];
            $page_data['creation_timestamp']    =   html_escape($this->input->post('creation_timestamp'));
            $page_data['payment_method']        =   html_escape($this->input->post('payment_method'));
            $page_data['status']                =   html_escape($this->input->post('status'));
            $page_data['year']                  =  $this->db->get_where('settings', array('type' => 'session'))->row()->description;

            $this->db->insert('invoice', $page_data);
            $invoice_id = $this->db->insert_id();

            $page_data2['invoice_id']   =   $invoice_id;
            $page_data2['student_id']   =   html_escape($this->input->post('student_id'));
            $page_data2['title']        =   html_escape($this->input->post('title'));
            $page_data2['description']  =   html_escape($this->input->post('description'));
            $page_data2['payment_type'] =  'income';
            $page_data2['amount']       =   html_escape($this->input->post('amount'));
            $page_data2['discount']     =   html_escape($this->input->post('discount'));
            $page_data2['timestamp']    =   strtotime($this->input->post('creation_timestamp'));
            $page_data2['year']         =   $this->db->get_where('settings', array('type' => 'session'))->row()->description;
            $page_data2['method']       =   html_escape($this->input->post('payment_method'));

            $this->db->insert('payment', $page_data2);
            $payment_id = $this->db->insert_id();
        }

        function createStudentMassPaymentFunction(){

            foreach($this->input->post('student_id') as $key => $id)
            $page_data['invoice_number']    =   html_escape($this->input->post('invoice_number')) + rand(10000, 1000000);
            $page_data['student_id']        =   $id;
            $page_data['title']             =   html_escape($this->input->post('title'));
            $page_data['description']       =   html_escape($this->input->post('description'));
            $page_data['amount']            =   html_escape($this->input->post('amount'));
            $page_data['discount']          =   html_escape($this->input->post('discount'));
            $page_data['amount_paid']       =   html_escape($this->input->post('amount_paid'));
            $page_data['due']               =   $page_data['amount']  - $page_data['amount_paid'];
            $page_data['creation_timestamp']    =   html_escape($this->input->post('creation_timestamp'));
            $page_data['payment_method']        =   html_escape($this->input->post('payment_method'));
            $page_data['status']                =   html_escape($this->input->post('status'));
            $page_data['year']                  =  $this->db->get_where('settings', array('type' => 'session'))->row()->description;

            $this->db->insert('invoice', $page_data);
            $invoice_id = $this->db->insert_id();

            $page_data2['invoice_id']   =   $invoice_id;
            $page_data2['student_id']   =   $id;
            $page_data2['title']        =   html_escape($this->input->post('title'));
            $page_data2['description']  =   html_escape($this->input->post('description'));
            $page_data2['payment_type']  =  'income';
            $page_data2['amount']       =   html_escape($this->input->post('amount'));
            $page_data2['discount']     =   html_escape($this->input->post('discount'));
            $page_data2['timestamp']    =   strtotime($this->input->post('creation_timestamp'));
            $page_data2['year']         =   $this->db->get_where('settings', array('type' => 'session'))->row()->description;
            $page_data2['method']       =   html_escape($this->input->post('payment_method'));

            $this->db->insert('payment', $page_data2);
            $payment_id = $this->db->insert_id();


        }


        function takeNewPaymentFromStudent($param2){
            $page_data['invoice_id']        =   html_escape($this->input->post('invoice_id'));
            $page_data['student_id']        =   html_escape($this->input->post('student_id'));
            $page_data['title']             =   html_escape($this->input->post('title'));
            $page_data['description']       =   html_escape($this->input->post('description'));
            $page_data['amount']            =   html_escape($this->input->post('amount'));
            $page_data['payment_type']      =   'income';
            $page_data['method']            =   html_escape($this->input->post('method'));
            $page_data['timestamp']         =   strtotime($this->input->post('timestamp'));
            $page_data['amount']            =   html_escape($this->input->post('amount'));
            $page_data['year']              =  $this->db->get_where('settings', array('type' => 'session'))->row()->description;
            
            $this->db->insert('payment', $page_data);
            $payment_id = $this->db->insert_id();

            $page_data2['amount_paid'] = html_escape($this->input->post('amount'));
            $this->db->where('invoice_id', $param2);
            $this->db->set('amount_paid', 'amount_paid + ' . $page_data2['amount_paid'], FALSE);
            $this->db->set('due', 'due - ' . $page_data2['amount_paid'], FALSE);
            $this->db->update('invoice');

        }


        function updateStudentPaymentFunction($param2){

            $page_data['student_id']        =  html_escape($this->input->post('student_id'));
            $page_data['title']             =   html_escape($this->input->post('title'));
            $page_data['description']       =   html_escape($this->input->post('description'));
            $page_data['amount']            =   html_escape($this->input->post('amount'));
            $page_data['amount_paid']       =   html_escape($this->input->post('amount_paid'));
            $page_data['due']               =   $page_data['amount']  - $page_data['amount_paid'];
            $page_data['creation_timestamp']    =   html_escape($this->input->post('date'));
            $page_data['status']                =   html_escape($this->input->post('status'));

            $this->db->where('invoice_id', $param2);
            $this->db->update('invoice', $page_data);


        }

        function deleteStudentPaymentFunction($param2){
            $this->db->where('invoice_id', $param2);
            $this->db->delete('invoice');

        }

    



}