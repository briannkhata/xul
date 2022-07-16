<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class email extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Email List';
		$this->load->view($this->session->userdata('role').'/emails',$data);			
    }

    function bulk(){
		$this->check_session();
		$data['page_title']  = 'Send Bulk |';
		$this->load->view($this->session->userdata('role').'/bulk_emails',$data);			
    }

   function send_email() {
     	$data['subject'] = $this->input->post('subject');
        $data['sender_email'] = $this->db->get('settings')->row()->sending_email;
        $data['receiver_email'] = $this->input->post('receiver');
        $data['message'] = $this->input->post('message');
        $data['date_sent'] = date('Y-m-d-H-i-s');

        //Load email library
        $this->load->library('email');

        $config = Array(
			 'protocol' => 'smtp',
			 'smtp_secure' => 'mail',
			 'smtp_host' => 'mail.focxuls.com',
			 'smtp_port' => 587,
			 'smtp_user' => 'info@focxuls.com', 
			 'smtp_pass' => 'MBOLA12345@', 
			 'mailtype' => 'html',
			 'charset' => 'iso-8859-1',
			 'wordwrap' => TRUE,
			 '_smtp_auth' => TRUE
			  );
        $this->email->initialize($config);
		$this->email->set_newline("\r\n");

        $this->email->from($data['sender_email'], 'FOCXULZ-SCHOOL MANAGEMENT SYSTEM');
        $this->email->to($data['receiver_email']);
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        $this->db->insert('emails',$data);
        //Send mail
        if($this->email->send())
        	echo 111;
            //$this->session->set_flashdata("message","Congragulation Email Send Successfully.");
        else
  print_r($this->email->print_debugger());die;
   			//redirect('email');

    }

    function read(){
		$data['page_title']  = 'Create |';
		$this->load->view($this->session->userdata('role').'/add_email',$data);
	}

	function send_bulk_email() {
		$role = $this->input->post('role');
     	$data['subject'] = $this->input->post('subject');
        $data['sender_email'] = $this->db->get('settings')->row()->send_email;
        $data['message'] = $this->input->post('message');
        $data['date_sent'] = date('Y-m-d-H-i-s');
        $this->load->library('email');
        $config = Array(
			 'protocol' => 'smtp',
			 'smtp_secure' => 'mail',
			 'smtp_host' => 'mail.focxuls.com',
			 'smtp_port' => 587,
			 'smtp_user' => 'info@focxuls.com', 
			 'smtp_pass' => 'MBOLA12345@', 
			 'mailtype' => 'html',
			 'charset' => 'iso-8859-1',
			 'wordwrap' => TRUE,
			 '_smtp_auth' => TRUE
			  );
        $this->email->initialize($config);
		$this->email->set_newline("\r\n");

		if ($role == 'parent') {
			$parents = $this->M_user->get_parents();
			foreach($parents as $pa){
			    $receiver = $this->M_user->get_email($pa['user_id']);
			    $data['receiver_email'] = $receiver;
		        $data['role'] = 'parent';

		        $this->email->from($data['sender_email'], 'FOCXULZ-SCHOOL MANAGEMENT SYSTEM');
		        $this->email->to($data['receiver_email']);
		        $this->email->subject($data['subject']);
		        $this->email->message($data['message']);
		        $this->db->insert('emails',$data);
		    }
		}elseif($role == 'student'){
 			$students = $this->M_user->get_students();
			foreach($students as $stu){
				$receiver = $this->M_user->get_email($stu['user_id']);
                $data['receiver_email'] = $receiver;
		        $data['role'] = 'student';

		        $this->email->from($data['sender_email'], 'FOCXULZ-SCHOOL MANAGEMENT SYSTEM');
		        $this->email->to($data['receiver_email']);
		        $this->email->subject($data['subject']);
		        $this->email->message($data['message']);
		        $this->db->insert('emails',$data);
			}
		}else{

		}
        if($this->email->send())
            $this->session->set_flashdata("message","Emails sent Successfully.");
        else
            $this->session->set_flashdata("message","You have encountered an error");
   			redirect('email');

    }
}