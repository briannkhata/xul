<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class overtime extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'All Overtimes';
		$this->load->view($this->session->userdata('role').'/filter_overtimes',$data);			
    }

	function add_overtimes1(){
		$this->check_session();
		$data['page_title']  = 'Add Overtimes |';
		$this->load->view($this->session->userdata('role').'/add_overtimes1',$data);			
    }

	function add_overtimes2(){
		$this->check_session();
		$data['branch_id']   = $this->input->post('branch_id');
        $data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  =  $this->M_branch->get_branch($data['branch_id']).' | '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/add_overtimes2',$data);			
    }

	function refresh_overtimes(){
		$this->check_session();
		$data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  = 'OVERTIMES FOR '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/refresh_overtimes',$data);			
    }

   
   function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['gender']   = $this->input->post('gender');
        $data['phone']    = $this->input->post('phone');
        $data['email']= $this->input->post('email');
        $data['relation']    = $this->input->post('relation');
		$data['role'] = 'parent';
		$data['password'] = md5($this->input->post('phone'));
  		$data['username']  = $this->input->post('email');
		$data['child_id']  = $this->input->post('child_id');
		$data['nationality']  = $this->input->post('nationality');
		$data['physical_address']  = $this->input->post('physical_address');
		$data['postal_address']  = $this->input->post('postal_address');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
		    $data['name']    = $row['name'];
	        $data['gender']   = $row['gender'];
	        $data['phone']    = $row['phone'];
	        $data['email']= $row['email'];
	        $data['relation']    = $row['relation'];
			$data['role'] = $row['role'];
			$data['child_id']  = $row['child_id'];
			$data['nationality']  = $row['nationality'];
			$data['physical_address']  = $row['physical_address'];
			$data['postal_address']  = $row['postal_address'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);

		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('users',$data);

		 }else{
			$this->db->insert('users',$data);
		}

	 $this->session->set_flashdata('message','Parent saved successfully');
			if($update_id !=''):
    			redirect('overtime');
			else:
				redirect('overtime/read');
			endif;
	}

	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}
	   
		 $data['page_title']  = 'Create';
		 $this->load->view($this->session->userdata('role').'/add_parent',$data);
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('user_id',$param);
        $this->db->update('users',$data);
    	$this->session->set_flashdata('message','Parent deleted successfully');
		redirect('overtime');
	}
	
	


 
}