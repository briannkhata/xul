<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class academic_year extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Academic Years';
		$this->load->view($this->session->userdata('role').'/academic_years',$data);			
    }

   
    function get_data_from_post(){
        $data['academic_year']    = $this->input->post('academic_year');
        $data['starts']= $this->input->post('starts');
        $data['ends']   = $this->input->post('ends');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_academic_year->get_academic_year_by_id($update_id);
		foreach ($query as $row) {
		    $data['academic_year']  = $row['academic_year'];
  		    $data['starts']= $row['starts'];
		    $data['ends'] = $row['ends'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('academic_year_id',$update_id);
			$this->db->update('academic_years',$data);
		 }else{
			$this->db->insert('academic_years',$data);
		}

		$this->session->set_flashdata('message','Academic year saved successfully');
			if($update_id !=''):
    			redirect('academic_year');
			else:
				redirect('academic_year/read');
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

		$data['page_title']  = 'Create academic Year';
		$this->load->view($this->session->userdata('role').'/add_academic_year',$data);			
	}

	
	function delete($param=''){
		$this->db->where('academic_year_id',$param);
        $this->db->delete('academic_years');
    	$this->session->set_flashdata('message','Academic Year deleted successfully');
		redirect('academic_year');
	}

	function close($param=''){
		$data['active'] = 1;
		$this->db->where('academic_year_id',$param);
        $this->db->update('academic_years',$data);
    	$this->session->set_flashdata('message','Academic Year closed successfully');
		redirect('academic_year');
	}

	function open($param=''){
		$data['active'] = 0;
		$this->db->where('academic_year_id',$param);
        $this->db->update('academic_years',$data);
    	$this->session->set_flashdata('message','Academic Year open successfully');
		redirect('academic_year');
	}
	
}