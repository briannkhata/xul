<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class beneficiary extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Beneficiaries';
		$this->load->view($this->session->userdata('role').'/beneficiaries',$data);			
    }

    function get_data_from_post(){
        $data['beneficiary']    = $this->input->post('beneficiary');
        $data['join_date']    = $this->input->post('join_date');
        $data['membershiptype_id']    = $this->input->post('membershiptype_id');
        $data['membershipnumber']    = $this->input->post('membershipnumber');
        $data['schemetype_id']    = $this->input->post('schemetype_id');
        $data['benstatus']    = $this->input->post('benstatus');
        //$data['total']    = $this->input->post('total');
        $data['damount']    = $this->input->post('damount');
        $data['deduct']    = $this->input->post('deduct');
        $data['user_id']    = $this->input->post('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_beneficiary->get_beneficiary_by_id($update_id);
		foreach ($query as $row) {
		    $data['beneficiary']    = $row['beneficiary'];
			$data['join_date']    = $row['join_date'];
			$data['benstatus']    = $row['benstatus'];
			$data['membershiptype_id']    = $row['membershiptype_id'];
			$data['membershipnumber']    = $row['membershipnumber'];
			$data['schemetype_id']    = $row['schemetype_id'];
			$data['benstatus']    = $row['benstatus'];
			//$data['total']    = $row['total'];
			$data['damount']    = $row['damount'];
			$data['deduct']    = $row['deduct'];
			$data['user_id']    = $row['user_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('beneficiary_id',$update_id);
			$this->db->update('beneficiaries',$data);
		 }else{
			$this->db->insert('beneficiaries',$data);
		}

		$this->session->set_flashdata('message','beneficiary saved successfully');
			if($update_id !=''):
    			redirect('beneficiary');
			else:
				redirect('beneficiary/read');
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

		$data['page_title']  = 'Create ';
		$this->load->view($this->session->userdata('role').'/add_beneficiary',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('beneficiary_id',$param);
        $this->db->update('beneficiaries',$data);
    	$this->session->set_flashdata('message','Beneficiary deleted successfully');
		redirect('beneficiaries');
	}

}