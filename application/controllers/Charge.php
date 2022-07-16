<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class charge extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Charges';
		$this->load->view($this->session->userdata('role').'/charges',$data);			
    }

    function invoices1(){
		$this->check_session();
		$data['page_title']  = 'Generate Invoices | ';
		$this->load->view($this->session->userdata('role').'/invoices1',$data);			
    }

    function invoices2(){
		$this->check_session();
		$data['page_title']  = 'Generate Invoices | ';
		$data['academic_year_id'] = $this->input->post('academic_year_id');
		$data['study_mode_id'] = $this->input->post('study_mode_id');
		$data['term_id'] = $this->input->post('term_id');
		$data['charge_type_id'] = $this->input->post('charge_type_id');
		$data['scholarship_type_id'] = $this->input->post('scholarship_type_id');
		$data['grade_level_id'] = $this->input->post('grade_level_id');
		$this->load->view($this->session->userdata('role').'/invoices2',$data);			
    }

    function apply_charges(){
		
    	foreach ($this->input->post('user_id') as $key => $value) {
        	$academic_year_id = $this->input->post('academic_year_id');
			$term_id = $this->input->post('term_id');
			$charge_type_id = $this->input->post('charge_type_id');
		    $data = array(
	     		'user_id' =>$value, 
	     		'academic_year_id' =>$academic_year_id, 
	     		'term_id' =>$term_id, 
	     		'amount' =>$this->M_charge_type->get_amount($charge_type_id), 
   	     		'balance' =>$this->M_charge_type->get_amount($charge_type_id), 
   	     		'charge_type_id' =>$charge_type_id
	        );
	    	$this->db->insert('charges',$data);
	    }
	    return;
    }

    function pay_invoices1(){
		$this->check_session();
		$data['page_title']  = 'Pay Invoices | ';
		$this->load->view($this->session->userdata('role').'/pay_invoices1',$data);			
    }

     function pay_invoices2(){
		$this->check_session();
		$data['page_title']  = 'Pay Invoices | ';
		$data['academic_year_id'] = $this->input->post('academic_year_id');
		$data['scholarship_type_id'] = $this->input->post('scholarship_type_id');
		$data['term_id'] = $this->input->post('term_id');
		$data['grade_level_id'] = $this->input->post('grade_level_id');
		$this->load->view($this->session->userdata('role').'/pay_invoices2',$data);			
    }

    function pay_charges(){
		
    	foreach ($this->input->post('charge_id') as $key => $value) {
        	$academic_year_id = $this->input->post('academic_year_id');
			$term_id = $this->input->post('term_id');
			$amount_paid = $this->input->post('amount_paid');
		    $data = array(
	     		'charge_id' =>$value, 
	     		'amount_paid' =>$amount_paid[$key], 
   	     		'date_paid' =>date('Y-m-d-H-i-s'), 
   	     		'added_by' =>$this->session->userdata('user_id')
	        );
	    	$this->db->insert('payments',$data);

	      $amount = $this->M_charge->get_amount($value);
		  $deleted['balance'] = intval($this->M_charge->get_balance($value)) - intval($data['amount_paid']);
		
		if($deleted['balance'] <= 0){
		   $deleted['deleted'] = 1;
		}elseif(($deleted['balance'] > 0) && ($deleted['balance'] < $amount)){
			$deleted['deleted'] = 2;
		}else{

		}

		$this->db->where('charge_id',$value);
		$this->db->update('charges',$deleted);
	    }
	    return;
    }



    function pay($param='',$param1='',$param2='',$param3='',$param4=''){
		$this->check_session();
		$data['page_title']  = 'Pay the Charge | ';
		$data['charge_id'] = $param;
		$data['term_id'] = $param1;
		$data['academic_year_id'] = $param2;
		$data['user_id'] = $param3;
		$data['charge_type_id'] = $param4;
		$this->load->view($this->session->userdata('role').'/pay_charge',$data);			
    }

    function pay2(){
		$this->check_session();
        $data['charge_id']    = $this->input->post('charge_id');
        $data['payment_mode']    = $this->input->post('payment_mode');
        $data['amount_paid']    = $this->input->post('amount_paid');
        $data['date_paid']    = date('Y-m-d-H-i-s');
        $data['added_by']    = $this->session->userdata('user_id');
		$this->db->insert('payments',$data);

		$amount = $this->M_charge->get_amount($data['charge_id']);
		$deleted['balance'] = intval($this->M_charge->get_balance($data['charge_id'])) - intval($data['amount_paid']);
		
		if($deleted['balance'] <= 0){
		   $deleted['deleted'] = 1;
		}elseif(($deleted['balance'] > 0) && ($deleted['balance'] < $amount)){
			$deleted['deleted'] = 2;
		}else{

		}

		$this->db->where('charge_id',$data['charge_id']);
		$this->db->update('charges',$deleted);
		$this->session->set_flashdata('message','Charge paid successfully');
		redirect('charge');
    }

    function get_data_from_post(){
        $data['charge_type_id']    = $this->input->post('charge_type_id');
        $data['amount']    = $this->M_charge_type->get_amount($data['charge_type_id']);
        $data['balance']    = $this->M_charge_type->get_amount($data['charge_type_id']);
        $data['user_id']    = $this->input->post('user_id');
        $data['term_id']    = $this->input->post('term_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_charge->get_charge_by_id($update_id);
		foreach ($query as $row) {
		    $data['charge_type_id']    = $row['charge_type_id'];
	        $data['user_id']    = $row['user_id'];
	        $data['term_id']    = $row['term_id'];
	        $data['amount']    = $row['amount'];
	        $data['balance']    = $row['balance'];
	        $data['academic_year_id']    = $row['academic_year_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('charge_id',$update_id);
			$this->db->update('charges',$data);
		 }else{
			$this->db->insert('charges',$data);
		}

		$this->session->set_flashdata('message','CHARGE saved successfully');
			if($update_id !=''):
    			redirect('charge');
			else:
				redirect('charge/read');
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

		$data['page_title']  = 'Create charge';
		$this->load->view($this->session->userdata('role').'/add_charge',$data);			
	}

	function delete($param=''){
		$this->db->where('charge_id',$param);
        $this->db->delete('charges');
    	$this->session->set_flashdata('message','charge deleted successfully');
		redirect('charge');
	}

}