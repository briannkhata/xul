<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class sms extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Sms History';
		$this->load->view($this->session->userdata('role').'/sms_history',$data);			
    }
	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('sms_id',$param);
        $this->db->delete('sms',$data);
    	$this->session->set_flashdata('message','Sms deleted successfully');
		redirect('sms');
	}


    function send_sms(){
		$this->check_session();
		$data['page_title']  = 'Send SMS |';
		$this->load->view($this->session->userdata('role').'/send_sms',$data);			
    }

    function send(){
   	    $role = $this->input->post('role');
  	    $sms_body = $this->input->post('sms_body');

  	    //print_r($this->M_user->get_users_by_role($role));
  	    //return;

	    foreach ($this->M_user->get_users_by_role($role) as $row) {
		    $data = array(
		     	'receiver' =>$row['user_id'],
		     	'receiver_phone' =>$this->M_user->get_phone($row['user_id']),  
		     	'sending_phone' =>$this->db->get('settings')->row()->sending_phone, 
		     	'sms_body' =>$sms_body, 
	   	     	'date_sent' =>date('Y-m-d H:m:i')
		     );
		    $this->M_sms->send_sms($this->M_user->get_phone($row['user_id']),$this->db->get('settings')->row()->sending_phone,$sms_body);
	    	$this->db->insert('sms',$data);
	    }
        $this->session->set_flashdata('message','SMS Sent successfully');
		redirect('sms');
	}


}