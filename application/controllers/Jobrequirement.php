<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class jobrequirement extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Job Requirements';
		$this->load->view($this->session->userdata('role').'/jobrequirements',$data);			
    }

   
    function get_data_from_post(){
        $data['jobrequirement']    = $this->input->post('jobrequirement');
        $data['job_id']= $this->input->post('job_id');
        $data['status']= $this->input->post('status');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_jobrequirement->get_jobrequirement_by_id($update_id);
		foreach ($query as $row) {
		    $data['jobrequirement']  = $row['jobrequirement'];
  		    $data['job_id']= $row['job_id'];
   		    $data['status']= $row['status'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('jobrequirement_id',$update_id);
			$this->db->update('jobrequirements',$data);
		 }else{
			$this->db->insert('jobrequirements',$data);
		}

		$this->session->set_flashdata('message','Job requirement saved successfully');
			if($update_id !=''):
    			redirect('jobrequirement');
			else:
				redirect('jobrequirement/read');
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
		$this->load->view($this->session->userdata('role').'/add_jobrequirement',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('jobrequirement_id',$param);
        $this->db->update('jobrequirements',$data);
    	$this->session->set_flashdata('message','Job requirement deleted successfully');
		redirect('jobrequirement');
	}	
}