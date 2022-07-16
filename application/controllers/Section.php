<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class section extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Sections';
		$this->load->view($this->session->userdata('role').'/sections',$data);			
    }

   
    function get_data_from_post(){
        $data['section']    = $this->input->post('section');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_section->get_section_by_id($update_id);
		foreach ($query as $row) {
		    $data['section']  = $row['section'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('section_id',$update_id);
			$this->db->update('sections',$data);
		 }else{
			$this->db->insert('sections',$data);
		}

		$this->session->set_flashdata('message','Section saved successfully');
			if($update_id !=''):
    			redirect('section');
			else:
				redirect('section/read');
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

		$data['page_title']  = 'Create Section';
		$this->load->view($this->session->userdata('role').'/add_section',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('section_id',$param);
        $this->db->update('sections',$data);
    	$this->session->set_flashdata('message','Section deleted successfully');
		redirect('section');
	}
	
}