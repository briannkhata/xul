<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class staff_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'staff types';
		$this->load->view($this->session->userdata('role').'/staff_types',$data);			
    }

    function get_data_from_post(){
        $data['staff_type']    = $this->input->post('staff_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_staff_type->get_staff_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['staff_type']    = $row['staff_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('staff_type_id',$update_id);
			$this->db->update('staff_types',$data);
		 }else{
			$this->db->insert('staff_types',$data);
		}

		$this->session->set_flashdata('message','Staff type saved successfully');
			if($update_id !=''):
    			redirect('staff_type');
			else:
				redirect('staff_type/read');
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

		$data['page_title']  = 'Create staff type';
		$this->load->view($this->session->userdata('role').'/add_staff_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('staff_type_id',$param);
        $this->db->update('staff_types',$data);
    	$this->session->set_flashdata('message','Staff type deleted successfully');
		redirect('staff_type');
	}

}