<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Transportation extends CI_Controller { 

            function __construct() {
                parent::__construct();
                        $this->load->database();
                        $this->load->library('session');	
                        $this->load->model('transportation_model');                      // Load Model Here	
            }


            function transport ($param1 = '', $param2 ='', $param3 =''){

                if($param1 == 'insert'){
                    $this->transportation_model->insertTransportFunction();
                    $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                    redirect(base_url(). 'transportation/transport', 'refresh');
                }
        
                if($param1 == 'update'){
                    $this->transportation_model->updateTransportFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                    redirect(base_url(). 'transportation/transport', 'refresh');
                }
        
        
                if($param1 == 'delete'){
                    $this->transportation_model->deleteTransportFunction($param2);
                    $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                    redirect(base_url(). 'transportation/transport', 'refresh');
                    }
        
        
                $page_data['page_name']     = 'transport';
                $page_data['page_title']    = get_phrase('Manage Transportation');
                $this->load->view('backend/index', $page_data);
        
                }

            

                function transport_route ($param1 = '', $param2 ='', $param3 =''){

                    if($param1 == 'insert'){
                        $this->transportation_model->insertTransportRoute();
                        $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                        redirect(base_url(). 'transportation/transport_route', 'refresh');
                    }
            
                    if($param1 == 'update'){
                        $this->transportation_model->updateTransportRoute($param2);
                        $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                        redirect(base_url(). 'transportation/transport_route', 'refresh');
                    }
            
            
                    if($param1 == 'delete'){
                        $this->transportation_model->deleteTransportRoute($param2);
                        $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                        redirect(base_url(). 'transportation/transport_route', 'refresh');
                        }
            
            
                    $page_data['page_name']     = 'transport_route';
                    $page_data['page_title']    = get_phrase('Transport Route');
                    $this->load->view('backend/index', $page_data);
            
                    }

                    function vehicle ($param1 = '', $param2 ='', $param3 =''){

                        if($param1 == 'insert'){
                            $this->transportation_model->insertVehicle();
                            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
                            redirect(base_url(). 'transportation/vehicle', 'refresh');
                        }
                
                        if($param1 == 'update'){
                            $this->transportation_model->updateVehicle($param2);
                            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
                            redirect(base_url(). 'transportation/vehicle', 'refresh');
                        }
                
                
                        if($param1 == 'delete'){
                            $this->transportation_model->deleteVehicle($param2);
                            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
                            redirect(base_url(). 'transportation/vehicle', 'refresh');
                            }
                
                
                        $page_data['page_name']     = 'vehicle';
                        $page_data['page_title']    = get_phrase('Manage Vehicle');
                        $this->load->view('backend/index', $page_data);
                
            }





}