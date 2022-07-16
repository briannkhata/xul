<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sms extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_sms(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('sms_id');
			$query = $this->db->get('sms');
			return $query->result_array();
		}

		function get_sms_by_id($sms_id){
		    $this->db->where('sms_id',$sms_id);
			$query = $this->db->get('sms');
			return $query->result_array();
		}

		function get_sms_body($sms_id){
   		    $this->db->where('sms_id',$sms_id);
			$query = $this->db->get('sms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['sms_body'];
				}
			}else {
				return '';
			}
			
		}

		function get_sender($sms_id){
   		    $this->db->where('sms_id',$sms_id);
			$query = $this->db->get('sms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['sender'];
				}
			}else {
				return '';
			}
			
		}

		function get_receiver($sms_id){
   		    $this->db->where('sms_id',$sms_id);
			$query = $this->db->get('sms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['receiver'];
				}
			}else {
				return '';
			}
			
		}


		function send_sms($receiver,$sending_phone,$message){

			$endpoint = "https://api.smsdeliveryapi.xyz/send";
            $ch = curl_init();
            $array_post = http_build_query(array(
                'text'=>$message,
                'numbers'=>$receiver,
                'api_key'=>'SAMPLEAPIKEY0EYU9K99EF1S90P',
                'password'=>$password,
                'from'=>$sending_phone
            ));

            curl_setopt($ch, CURLOPT_URL,$endpoint);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$array_post);
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);
            echo $server_output;
		}

	
	
}

