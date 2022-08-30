<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class arrear extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Arrears';
		$this->load->view($this->session->userdata('role').'/filter_arrears',$data);			
    }

	function add_arrears1(){
		$this->check_session();
		$data['page_title']  = 'Add Arrears |';
		$this->load->view($this->session->userdata('role').'/add_arrears1',$data);			
    }

	function add_arrears2(){
		$this->check_session();
		$data['branch_id']   = $this->input->post('branch_id');
        $data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  = 'Staff | '. $this->M_branch->get_branch($data['branch_id'] ).' | '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/add_arrears2',$data);			
    }

	function refresh_arrears(){
		$this->check_session();
		$data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  = 'ARREARS FOR '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/refresh_arrears',$data);			
    }

    function get_data_from_post(){
        $data['user_id']    = $this->input->post('user_id');
        $data['month']    = $this->input->post('month');
        $data['year']    = $this->input->post('year');
        $data['amount']    = $this->input->post('amount');
        $data['added_by']    = $this->session->userdata('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_arrear->get_arrear_by_id($update_id);
		foreach ($query as $row) {
			$data['user_id']    = $row['user_id'];
			$data['month']    = $row['month'];
			$data['year']    = $row['year'];
			$data['amount']    = $row['amount'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('arrear_id',$update_id);
			$this->db->update('arrears',$data);
		 }else{
			$this->db->insert('arrears',$data);
		}

		$this->session->set_flashdata('message','Arrear saved successfully');
			if($update_id !=''):
    			redirect('arrear');
			else:
				redirect('arrear/read');
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

		$data['page_title']  = 'Create Arrear';
		$this->load->view($this->session->userdata('role').'/add_arrear',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('arrear_id',$param);
        $this->db->update('arrears',$data);
    	$this->session->set_flashdata('message','arrear deleted successfully');
		redirect('arrear');
	}



}