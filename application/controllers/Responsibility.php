<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class responsibility extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Responsibilities |';
		$this->load->view($this->session->userdata('role').'/responsibilities',$data);			
    }

    function get_data_from_post(){
        $data['responsibility']    = $this->input->post('responsibility');
        $data['description']    = $this->input->post('description');
        $data['user_id']    = $this->input->post('user_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['date_assigned']    = $this->input->post('date_assigned');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_responsibility->get_responsibility_by_id($update_id);
		foreach ($query as $row) {
		    $data['responsibility']    = $row['responsibility'];
	        $data['description']    = $row['description'];
	        $data['user_id']    = $row['user_id'];
	        $data['academic_year_id']    = $row['academic_year_id'];
	        $data['date_assigned']    = $row['date_assigned'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('responsibility_id',$update_id);
			$this->db->update('responsibilities',$data);
		 }else{
			$this->db->insert('responsibilities',$data);
		}

		$this->session->set_flashdata('message','Responsibility saved successfully');
			if($update_id !=''):
    			redirect('responsibility');
			else:
				redirect('responsibility/read');
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

		$data['page_title']  = 'Create Responsibilty';
		$this->load->view($this->session->userdata('role').'/add_responsibility',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('responsibility_id',$param);
        $this->db->update('responsibilities',$data);
    	$this->session->set_flashdata('message','Responsibility deleted successfully');
		redirect('responsibility');
	}

}