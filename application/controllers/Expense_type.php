<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class expense_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Expense types';
		$this->load->view($this->session->userdata('role').'/expense_types',$data);			
    }

   
    function get_data_from_post(){
        $data['expense_type']    = $this->input->post('expense_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_expense_type->get_expense_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['expense_type']  = $row['expense_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('expense_type_id',$update_id);
			$this->db->update('expense_types',$data);
		 }else{
			$this->db->insert('expense_types',$data);
		}

		$this->session->set_flashdata('message','expense type saved successfully');
			if($update_id !=''):
    			redirect('expense_type');
			else:
				redirect('expense_type/read');
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

		$data['page_title']  = 'Create Expense type';
		$this->load->view($this->session->userdata('role').'/add_expense_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('expense_type_id',$param);
        $this->db->update('expense_types',$data);
    	$this->session->set_flashdata('message','expense type deleted successfully');
		redirect('expense_type');
	}

	
}