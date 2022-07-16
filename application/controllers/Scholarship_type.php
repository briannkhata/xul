<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class scholarship_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Scholarship types';
		$this->load->view($this->session->userdata('role').'/scholarship_types',$data);			
    }

    function get_data_from_post(){
        $data['scholarship_type']    = $this->input->post('scholarship_type');
        $data['description']    = $this->input->post('description');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_scholarship_type->get_scholarship_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['scholarship_type']    = $row['scholarship_type'];
		    $data['description']    = $row['description'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('scholarship_type_id',$update_id);
			$this->db->update('scholarship_types',$data);
		 }else{
			$this->db->insert('scholarship_types',$data);
		}

		$this->session->set_flashdata('message','scholarship type saved successfully');
			if($update_id !=''):
    			redirect('scholarship_type');
			else:
				redirect('scholarship_type/read');
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

		$data['page_title']  = 'Create scholarship type';
		$this->load->view($this->session->userdata('role').'/add_scholarship_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('scholarship_type_id',$param);
        $this->db->update('scholarship_types',$data);
    	$this->session->set_flashdata('message','scholarship type deleted successfully');
		redirect('scholarship_type');
	}

}