<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class payment extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Payment List';
		$this->load->view($this->session->userdata('role').'/payments',$data);			
    }

   
	function delete($param='',$param1=''){
		$balance = $this->M_charge->get_balance($param1);
		$amount = $this->M_charge->get_amount($param1);

		if($balance == 0){
		   $data['deleted'] = 1;
		}elseif(($balance > 0) && ($balance < $amount)){
			$data['deleted'] = 2;
		//}elseif($balance >= $amount){
			//$data['deleted'] = 2;
		}else{

		}

		$data['balance'] = $balance + $this->M_payment->get_amount_paid($param);
		$this->db->where('charge_id',$param1);
        $this->db->update('charges',$data);
        
        $this->db->where('payment_id',$param);
        $this->db->delete('payments');

    	$this->session->set_flashdata('message','PAYMENT deleted successfully');
		redirect('payment');
	}

}