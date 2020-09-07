<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sms_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }


    //****************   COMON FUNCTION FOR SENDING SMS   *********************************//
    function send_sms($message = null, $recieverPhoneNumber  = null){
        $active_sms_gateway = $this->db->get_where('sms_settings', array('type' => 'active_sms_gateway'))->row()->info;
        if($active_sms_gateway != null || $active_sms_gateway == 'disabled')
        return;

        if($active_sms_gateway == 'clickatell'){
            $this->send_sms_via_clickatell($message, $recieverPhoneNumber);
        }

        if($active_sms_gateway == 'msg91'){
            $this->send_sms_via_msg91($message, $recieverPhoneNumber);
        }

    }

    //****************  SEND SMS WITH CLICKATELL SMS API   *********************************//
    function send_sms_via_clickatell($message = null, $recieverPhoneNumber = null){
        $clickatell_username = $this->db->get_where('sms_settings', array('type' => 'clickatell_username'))->row()->info;
        $clickatell_password = $this->db->get_where('sms_settings', array('type' => 'clickatell_password'))->row()->info;
        $clickatell_apikey   = $this->db->get_where('sms_settings', array('type' => 'clickatell_apikey'))->row()->info;
        $clickatell_baseurl  = "http://api.clickatell.com";

        $text   = urlencode($message);
        $to     = $recieverPhoneNumber;
        $url    = "$clickatell_baseurl/http/auth?user=$clickatell_username&password=$clickatell_password&api_id=$clickatell_apikey";
        
        //do authentication call
        $ret = file($url);

        // explode our response. return string is on first line of the data returned
        $sess = explode(":",$ret[0]);
        print_r($sess);echo '<br>';
        if ($sess[0] == "OK") {

            $sess_id = trim($sess[1]); // remove any whitespace
            $url = "$clickatell_baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

            // do sendmsg call
            $ret = file($url);
            $send = explode(":",$ret[0]);
            print_r($send);echo '<br>';
            if ($send[0] == "ID") {
                echo "successnmessage ID: ". $send[1];
            } 
            else 
            {
            echo "send message failed";
            }
            } 
            else 
            {
                    echo "Authentication failure: ". $ret[0];
        }
    }

    //****************  SEND SMS WITH MSG91 SMS API   *********************************//
    function send_sms_via_msg91($message = null , $recieverPhoneNumber = null) {

        $authKey       = $this->db->get_where('settings', array('type' => 'msg91_authentication_key'))->row()->description;
        $senderId      = $this->db->get_where('settings', array('type' => 'msg91_sender_ID'))->row()->description;
        $country_code  = $this->db->get_where('settings', array('type' => 'msg91_country_code'))->row()->description;
        $route         = $this->db->get_where('settings', array('type' => 'msg91_route'))->row()->description;

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $recieverPhoneNumber;

        //Your message to send, Add URL encoding here.
        $message = urlencode($message);

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
            'country' => $country_code
        );
        //API URL
        $url="http://api.msg91.com/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
    }


    function UpdateClickattelSms (){
        $sms_data['info']    =   $this->input->post('clickatell_username');
        $this->db->where('type', 'clickatell_username');
        $this->db->update('sms_settings', $sms_data);

        $sms_data['info']    =   $this->input->post('clickatell_password');
        $this->db->where('type', 'clickatell_password');
        $this->db->update('sms_settings', $sms_data);

        $sms_data['info']    =   $this->input->post('clickatell_apikey');
        $this->db->where('type', 'clickatell_apikey');
        $this->db->update('sms_settings', $sms_data);
    }

    function UpdateMsg91lSms (){
        $sms_data['info']    =   $this->input->post('msg91_authentication_key');
        $this->db->where('type', 'msg91_authentication_key');
        $this->db->update('sms_settings', $sms_data);

        $sms_data['info']    =   $this->input->post('msg91_sender_id');
        $this->db->where('type', 'msg91_sender_id');
        $this->db->update('sms_settings', $sms_data);

        $sms_data['info']    =   $this->input->post('msg91_route');
        $this->db->where('type', 'msg91_route');
        $this->db->update('sms_settings', $sms_data);

        $sms_data['info']    =   $this->input->post('msg91_country_code');
        $this->db->where('type', 'msg91_country_code');
        $this->db->update('sms_settings', $sms_data);
    }

    function setSmsGatewayActive (){
        $sms_data['info']    =   $this->input->post('active_sms_gateway');
        $this->db->where('type', 'active_sms_gateway');
        $this->db->update('sms_settings', $sms_data);
    }
    
    





	
	
}

