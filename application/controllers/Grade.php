<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class grade extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Grades';
		$this->load->view($this->session->userdata('role').'/grades',$data);			
    }

   
    function get_data_from_post(){
        $data['grade']    = $this->input->post('grade');
        $data['description']    = $this->input->post('description');
		$data['salary']    = $this->input->post('salary');
		$data['leavedays']    = $this->input->post('leavedays');
		$data['leavegrant']    = $this->input->post('leavegrant');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_grade->get_grade_by_id($update_id);
		foreach ($query as $row) {
		    $data['grade']  = $row['grade'];
  		    $data['description']  = $row['description'];
			$data['salary']  = $row['salary'];
			$data['leavedays']  = $row['leavedays'];
			$data['leavegrant']  = $row['leavegrant'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('grade_id',$update_id);
			$this->db->update('grades',$data);
		 }else{
			$this->db->insert('grades',$data);
		}

		$this->session->set_flashdata('message','Grade saved successfully');
			if($update_id !=''):
    			redirect('grade');
			else:
				redirect('grade/read');
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
		$this->load->view($this->session->userdata('role').'/add_grade',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('grade_id',$param);
        $this->db->update('grades',$data);
    	$this->session->set_flashdata('message','Grade deleted successfully');
		redirect('grade');
	}
	
}