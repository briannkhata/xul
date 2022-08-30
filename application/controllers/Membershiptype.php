<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class membershiptype extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Membership types';
		$this->load->view($this->session->userdata('role').'/membershiptypes',$data);			
    }

    function get_data_from_post(){
        $data['membershiptype']    = $this->input->post('membershiptype');
		$data['charge']    = $this->input->post('charge');
        $data['schemetype_id']    = $this->input->post('schemetype_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_membershiptype->get_membershiptype_by_id($update_id);
		foreach ($query as $row) {
		    $data['membershiptype']    = $row['membershiptype'];
			$data['charge']    = $row['charge'];
		    $data['schemetype_id']    = $row['schemetype_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('membershiptype_id',$update_id);
			$this->db->update('membershiptypes',$data);
		 }else{
			$this->db->insert('membershiptypes',$data);
		}

		$this->session->set_flashdata('message','Membership type saved successfully');
			if($update_id !=''):
    			redirect('membershiptype');
			else:
				redirect('membershiptype/read');
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

		$data['page_title']  = 'Create membership type';
		$this->load->view($this->session->userdata('role').'/add_membershiptype',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('membershiptype_id',$param);
        $this->db->update('membershiptypes',$data);
    	$this->session->set_flashdata('message','Membershiptype deleted successfully');
		redirect('membershiptype');
	}

}