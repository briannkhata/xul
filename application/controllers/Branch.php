<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Branch List';
		$this->load->view($this->session->userdata('role').'/branches',$data);			
    }

    function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['address']    = $this->input->post('address');
        $data['rate']    = $this->input->post('rate');      
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_branch->get_branch_by_id($update_id);
		foreach ($query as $row) {
			$data['name']    = $row['name'];
			$data['address']    = $row['address'];
			$data['rate']    = $row['rate'];      
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('branch_id',$update_id);
			$this->db->update('branches',$data);
		 }else{
			$this->db->insert('branches',$data);
		}
		$this->session->set_flashdata('message','Branch Saved successfully');
			if($update_id !=''):
    			redirect('Branch');
			else:
				redirect('Branch/read');
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

		$data['page_title']  = 'Add Branch';
		$this->load->view($this->session->userdata('role').'/add_Branch',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('branch_id',$param);
        $this->db->update('branches',$data);
    	$this->session->set_flashdata('message','Branch deleted successfully');
		redirect('Branch');
	}

}