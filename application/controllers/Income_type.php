<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class income_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Income types';
		$this->load->view($this->session->userdata('role').'/income_types',$data);			
    }

   
    function get_data_from_post(){
        $data['income_type']    = $this->input->post('income_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_income_type->get_income_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['income_type']  = $row['income_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('income_type_id',$update_id);
			$this->db->update('income_types',$data);
		 }else{
			$this->db->insert('income_types',$data);
		}

		$this->session->set_flashdata('message','income type saved successfully');
			if($update_id !=''):
    			redirect('income_type');
			else:
				redirect('income_type/read');
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

		$data['page_title']  = 'Create Income type';
		$this->load->view($this->session->userdata('role').'/add_income_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('income_type_id',$param);
        $this->db->update('income_types',$data);
    	$this->session->set_flashdata('message','Income type deleted successfully');
		redirect('income_type');
	}

	
}