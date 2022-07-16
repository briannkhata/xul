<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();	 
    } 

    function index(){
    	$data['page_title'] = 'Login';
		$this->load->view('login',$data);
    }

	function signin(){   
		$username = $this->input->post('username');
		$password = $this->input->post('password');			  
		//$password = MD5($this->input->post('password'));			  
		$user = $this->db->query("SELECT * FROM users WHERE username ='$username' AND password ='$password' AND deleted = 0");
		$row = $user->row();
		if (isset($row)){
			$name		=	$row->name;
			$user_id	=	$row->user_id;
			$role		=	$row->role;

			$this->session->set_userdata('user_login', '1');
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('role',$role);
			$this->session->set_userdata('name',$name);
			redirect(base_url().'user/dashboard');
		}
										   
		$data['page_title'] = 'Login';
		$this->session->set_flashdata('message','Invalid Username or Password');
		$this->load->view('login',$data);
	}

    function logout(){
		session_destroy();
		redirect(base_url());
    }

}
