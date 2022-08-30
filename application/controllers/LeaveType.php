<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Leavetype extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Leave types';
		$this->load->view($this->session->userdata('role').'/leavetypes',$data);			
    }

    function get_data_from_post(){
        $data['leavetype']    = $this->input->post('leavetype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_leavetype->get_leavetype_by_id($update_id);
		foreach ($query as $row) {
		    $data['leavetype']    = $row['leavetype'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('leavetype_id',$update_id);
			$this->db->update('leavetypes',$data);
		 }else{
			$this->db->insert('leavetypes',$data);
		}

		$this->session->set_flashdata('message','overtime type saved successfully');
			if($update_id !=''):
    			redirect('leavetype');
			else:
				redirect('leavetype/read');
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

		$data['page_title']  = 'Create';
		$this->load->view($this->session->userdata('role').'/add_leavetype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('leavetype_id',$param);
        $this->db->update('leavetypes',$data);
    	$this->session->set_flashdata('message','overtime type deleted successfully');
		redirect('leavetype');
	}
   
}