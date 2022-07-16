<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class grade_level extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Grade Levels';
		$this->load->view($this->session->userdata('role').'/grade_levels',$data);			
    }

   
    function get_data_from_post(){
        $data['grade_level']    = $this->input->post('grade_level');
        $data['grade_group_id']    = $this->input->post('grade_group_id');
        $data['numeric']= $this->input->post('numeric');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_grade_level->get_grade_level_by_id($update_id);
		foreach ($query as $row) {
		    $data['grade_level']  = $row['grade_level'];
 		    $data['grade_group_id']  = $row['grade_group_id'];
  		    $data['numeric']= $row['numeric'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('grade_level_id',$update_id);
			$this->db->update('grade_levels',$data);
		 }else{
			$this->db->insert('grade_levels',$data);
		}

		$this->session->set_flashdata('message','Grade Level saved successfully');
			if($update_id !=''):
    			redirect('grade_level');
			else:
				redirect('grade_level/read');
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
		$this->load->view($this->session->userdata('role').'/add_grade_level',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('grade_level_id',$param);
        $this->db->update('grade_levels',$data);
    	$this->session->set_flashdata('message','Grade Level deleted successfully');
		redirect('grade_level');
	}
	
}