<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class expense extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Expense List';
		$this->load->view($this->session->userdata('role').'/expenses',$data);			
    }

    function get_data_from_post(){
        $data['amount']    = $this->input->post('amount');
        $data['expense_date']    = $this->input->post('expense_date');
        $data['comment']    = $this->input->post('comment');
        $data['added_by']    = $this->input->post('added_by');
        $data['expense_type_id']    = $this->input->post('expense_type_id');
        $data['date_added']    = date('Y-m-d h:i:s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_expense->get_expense_by_id($update_id);
		foreach ($query as $row) {
		    $data['amount']    = $row['amount'];
	        $data['expense_date']    = $row['expense_date'];
	        $data['comment']    = $row['comment'];
	        $data['added_by']    = $row['added_by'];
	        $data['expense_type_id']    = $row['expense_type_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('expense_id',$update_id);
			$this->db->update('expenses',$data);
		 }else{
			$this->db->insert('expenses',$data);
		}

		$this->session->set_flashdata('message','Expense saved successfully');
			if($update_id !=''):
    			redirect('expense');
			else:
				redirect('expense/read');
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

		$data['page_title']  = 'Create Expense';
		$this->load->view($this->session->userdata('role').'/add_expense',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('expense_id',$param);
        $this->db->update('expenses',$data);
    	$this->session->set_flashdata('message','Expense deleted successfully');
		redirect('expense');
	}

}