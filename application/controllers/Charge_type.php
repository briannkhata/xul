<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class charge_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Charge types';
		$this->load->view($this->session->userdata('role').'/charge_types',$data);			
    }

   
    function get_data_from_post(){
        $data['charge_type']    = $this->input->post('charge_type');
        $data['amount']= $this->input->post('amount');
        $data['comment']   = $this->input->post('comment');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_charge_type->get_charge_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['charge_type']  = $row['charge_type'];
  		    $data['amount']= $row['amount'];
		    $data['comment'] = $row['comment'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('charge_type_id',$update_id);
			$this->db->update('charge_types',$data);
		 }else{
			$this->db->insert('charge_types',$data);
		}

		$this->session->set_flashdata('message','Charge type saved successfully');
			if($update_id !=''):
    			redirect('charge_type');
			else:
				redirect('charge_type/read');
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

		$data['page_title']  = 'Create charge type';
		$this->load->view($this->session->userdata('role').'/add_charge_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('charge_type_id',$param);
        $this->db->update('charge_types',$data);
    	$this->session->set_flashdata('message','Charge type deleted successfully');
		redirect('charge_type');
	}

	
}