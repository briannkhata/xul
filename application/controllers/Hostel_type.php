<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hostel_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'hostel types';
		$this->load->view($this->session->userdata('role').'/hostel_types',$data);			
    }

   
    function get_data_from_post(){
        $data['hostel_type']    = $this->input->post('hostel_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_hostel_type->get_hostel_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['hostel_type']  = $row['hostel_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('hostel_type_id',$update_id);
			$this->db->update('hostel_types',$data);
		 }else{
			$this->db->insert('hostel_types',$data);
		}

		$this->session->set_flashdata('message','hostel type saved successfully');
			if($update_id !=''):
    			redirect('hostel_type');
			else:
				redirect('hostel_type/read');
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

		$data['page_title']  = 'Create hostel type';
		$this->load->view($this->session->userdata('role').'/add_hostel_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('hostel_type_id',$param);
        $this->db->update('hostel_types',$data);
    	$this->session->set_flashdata('message','Hostel type deleted successfully');
		redirect('hostel_type');
	}

	
}