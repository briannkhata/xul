<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bonus extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Bonuses';
		$this->load->view($this->session->userdata('role').'/filter_bonuses',$data);			
    }

	function refresh_bonuses(){
		$this->check_session();
		$data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  = 'BONUSES FOR '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/refresh_bonuses',$data);			
    }

	function add_bonus1(){
		$this->check_session();
		$data['page_title']  = 'Add bonus |';
		$this->load->view($this->session->userdata('role').'/add_bonus1',$data);			
    }

	function add_bonus2(){
		$this->check_session();
		$data['branch_id']   = $this->input->post('branch_id');
        $data['month']   = $this->input->post('month');
        $data['year']   = $this->input->post('year');
		$data['page_title']  = 'Staff | '. $this->M_branch->get_branch($data['branch_id'] ).' | '.$data['month'].' | '.$data['year'];
		$this->load->view($this->session->userdata('role').'/add_bonus2',$data);			
    }

    function get_data_from_post(){
        $data['user_id']  = $this->input->post('user_id');
        $data['month'] = $this->input->post('month');
        $data['year'] = $this->input->post('year');
        $data['amount'] = $this->input->post('amount');
        $data['added_by']  = $this->session->userdata('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_bonus->get_bonus_by_id($update_id);
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
			$this->db->where('bonus_id',$update_id);
			$this->db->update('bonuses',$data);
		 }else{
			$this->db->insert('bonuses',$data);
		}

		$this->session->set_flashdata('message','bonus saved successfully');
			if($update_id !=''):
    			redirect('bonus');
			else:
				redirect('bonus/read');
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

		$data['page_title']  = 'Create Bonus';
		$this->load->view($this->session->userdata('role').'/add_bonus',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('bonus_id',$param);
        $this->db->update('bonuses',$data);
    	$this->session->set_flashdata('message','bonus deleted successfully');
		redirect('bonus');
	}



}