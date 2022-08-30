<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bank extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'banks';
		$this->load->view($this->session->userdata('role').'/banks',$data);			
    }
   
    function get_data_from_post(){
        $data['bank']    = $this->input->post('bank');
        $data['abbrev']    = $this->input->post('abbrev');
        $data['code']    = $this->input->post('code');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_bank->get_bank_by_id($update_id);
		foreach ($query as $row) {
		    $data['bank']  = $row['bank'];
		    $data['abbrev']  = $row['abbrev'];
		    $data['code']  = $row['code'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('bank_id',$update_id);
			$this->db->update('banks',$data);
		 }else{
			$this->db->insert('banks',$data);
		}

		$this->session->set_flashdata('message','bank saved successfully');
			if($update_id !=''):
    			redirect('bank');
			else:
				redirect('bank/read');
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

		$data['page_title']  = 'Create Bank';
		$this->load->view($this->session->userdata('role').'/add_bank',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('bank_id',$param);
        $this->db->update('banks',$data);
    	$this->session->set_flashdata('message','bank deleted successfully');
		redirect('bank');
	}
	
}