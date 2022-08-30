<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class schemetype extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Scheme types';
		$this->load->view($this->session->userdata('role').'/schemetypes',$data);			
    }

    function get_data_from_post(){
        $data['schemetype']    = $this->input->post('schemetype');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_schemetype->get_schemeType_by_id($update_id);
		foreach ($query as $row) {
		    $data['schemetype']  = $row['schemetype'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('schemetype_id',$update_id);
			$this->db->update('schemetypes',$data);
		 }else{
			$this->db->insert('schemetypes',$data);
		}

		$this->session->set_flashdata('message','Scheme type saved successfully');
			if($update_id !=''):
    			redirect('schemetype');
			else:
				redirect('schemetype/read');
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

		$data['page_title']  = 'Create scheme type';
		$this->load->view($this->session->userdata('role').'/add_schemetype',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('schemetype_id',$param);
        $this->db->update('schemetypes',$data);
    	$this->session->set_flashdata('message','scheme type deleted successfully');
		redirect('schemetype');
	}
	
}