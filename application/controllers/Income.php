<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class income extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Income List';
		$this->load->view($this->session->userdata('role').'/incomes',$data);			
    }

    function get_data_from_post(){
        $data['amount']    = $this->input->post('amount');
        $data['income_date']    = $this->input->post('income_date');
        $data['comment']    = $this->input->post('comment');
        $data['added_by']    = $this->input->post('added_by');
        $data['income_type_id']    = $this->input->post('income_type_id');
        $data['date_added']    = date('Y-m-d h:i:s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_income->get_income_by_id($update_id);
		foreach ($query as $row) {
		    $data['amount']    = $row['amount'];
	        $data['income_date']    = $row['income_date'];
	        $data['comment']    = $row['comment'];
	        $data['added_by']    = $row['added_by'];
	        $data['income_type_id']    = $row['income_type_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('income_id',$update_id);
			$this->db->update('incomes',$data);
		 }else{
			$this->db->insert('incomes',$data);
		}

		$this->session->set_flashdata('message','income saved successfully');
			if($update_id !=''):
    			redirect('income');
			else:
				redirect('income/read');
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

		$data['page_title']  = 'Create Income';
		$this->load->view($this->session->userdata('role').'/add_income',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('income_id',$param);
        $this->db->update('incomes',$data);
    	$this->session->set_flashdata('message','Income deleted successfully');
		redirect('income');
	}

}