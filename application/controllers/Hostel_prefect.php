<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hostel_prefect extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'hostel Prefects';
		$this->load->view($this->session->userdata('role').'/hostel_prefects',$data);			
    }
   
    function get_data_from_post(){
        $data['user_id']    = $this->input->post('user_id');
        $data['hostel_id']    = $this->input->post('hostel_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['date_assigned']    = $this->input->post('date_assigned');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_hostel_prefect->get_hostel_prefect_by_id($update_id);
		foreach ($query as $row) {
		    $data['user_id']  = $row['user_id'];
		    $data['hostel_id']  = $row['hostel_id'];
		    $data['academic_year_id']  = $row['academic_year_id'];
		    $data['date_assigned']  = $row['date_assigned'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('hostel_prefect_id',$update_id);
			$this->db->update('hostel_prefects',$data);
		 }else{
			$this->db->insert('hostel_prefects',$data);
		}

		$this->session->set_flashdata('message','hostel prefect saved successfully');
			if($update_id !=''):
    			redirect('hostel_prefect');
			else:
				redirect('hostel_prefect/read');
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

		$data['page_title']  = 'Create hostel prefect';
		$this->load->view($this->session->userdata('role').'/add_hostel_prefect',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('hostel_prefect_id',$param);
        $this->db->update('hostel_prefects',$data);
    	$this->session->set_flashdata('message','hostel_prefect deleted successfully');
		redirect('hostel_prefect');
	}


	
}