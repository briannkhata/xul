<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class scholarship extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Scholarships';
		$this->load->view($this->session->userdata('role').'/scholarships',$data);			
    }

    function get_data_from_post(){
        $data['scholarship_type_id']    = $this->input->post('scholarship_type_id');
        $data['user_id']    = $this->input->post('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
		    $data['scholarship_type_id']    = $row['scholarship_type_id'];
		    $data['user_id']    = $row['user_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('user_id');
		//$update_id = $this->input->post('update_id', TRUE);
		//if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('users',$data);
		 //}else{
			//$this->db->insert('scholarships',$data);
		//}

		$this->session->set_flashdata('message','Scholarship saved successfully');
			if($update_id !=''):
    			redirect('scholarship');
			else:
				redirect('scholarship/read');
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
		$this->load->view($this->session->userdata('role').'/add_scholarship',$data);			
	}

	
	function delete($param=''){
		$data['scholarship_type_id'] = '';
		$this->db->where('user_id',$param);
        $this->db->update('users',$data);
    	$this->session->set_flashdata('message','Scholarship deleted successfully');
		redirect('scholarship');
	}

	function filter(){
		$data['page_title']  = 'Filter Scholarships';
		$this->load->view($this->session->userdata('role').'/filter_scholarships1',$data);			
	}

	function filter2(){
		$scholarship_type_id = $this->input->post('scholarship_type_id');
		$data['filter2'] = $this->M_user->get_scholarships2($scholarship_type_id);
		$data['page_title']  = 'Scholarships | '.$this->M_scholarship_type->get_scholarship_type($scholarship_type_id);
		$this->load->view($this->session->userdata('role').'/filter_scholarships2',$data);			
	}

}