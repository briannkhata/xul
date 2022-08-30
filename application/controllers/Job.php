<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Job Titles';
		$this->load->view($this->session->userdata('role').'/jobs',$data);			
    }

    function get_data_from_post(){
        $data['job']    = $this->input->post('job');
		$data['grade_id']    = $this->input->post('grade_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_job->get_job_by_id($update_id);
		foreach ($query as $row) {
		    $data['job']  = $row['job'];
			$data['grade_id']  = $row['grade_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('job_id',$update_id);
			$this->db->update('jobs',$data);
		 }else{
			$this->db->insert('jobs',$data);
		}

		$this->session->set_flashdata('message','Job saved successfully');
			if($update_id !=''):
    			redirect('job');
			else:
				redirect('job/read');
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

		$data['page_title']  = 'Add Job';
		$this->load->view($this->session->userdata('role').'/add_job',$data);			
	}

	
	function delete($param=''){
		$this->db->where('job_id',$param);
        $this->db->delete('jobs');
    	$this->session->set_flashdata('message','Job deleted successfully');
		redirect('job');
	}
	
}