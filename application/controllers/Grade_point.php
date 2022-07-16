<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class grade_point extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Grade points';
		$this->load->view($this->session->userdata('role').'/grade_points',$data);			
    }

   
    function get_data_from_post(){
        $data['grade_point']    = $this->input->post('grade_point');
        $data['grade_group_id']    = $this->input->post('grade_group_id');
        $data['name']    = $this->input->post('name');
        $data['mark_from']    = $this->input->post('mark_from');
        $data['mark_upto']    = $this->input->post('mark_upto');
        $data['comment']    = $this->input->post('comment');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_grade_point->get_grade_point_by_id($update_id);
		foreach ($query as $row) {
	        $data['grade_point']    = $row['grade_point'];
	        $data['grade_group_id']    = $row['grade_group_id'];
	        $data['name']    = $row['name'];
	        $data['mark_from']    = $row['mark_from'];
	        $data['mark_upto']    = $row['mark_upto'];
	        $data['comment']    = $row['comment'];
	        $data['academic_year_id']    = $row['academic_year_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('grade_point_id',$update_id);
			$this->db->update('grade_points',$data);
		 }else{
			$this->db->insert('grade_points',$data);
		}

		$this->session->set_flashdata('message','Grade point saved successfully');
			if($update_id !=''):
    			redirect('grade_point');
			else:
				redirect('grade_point/read');
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
		$this->load->view($this->session->userdata('role').'/add_grade_point',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('grade_point_id',$param);
        $this->db->update('grade_points',$data);
    	$this->session->set_flashdata('message','Grade point deleted successfully');
		redirect('grade_point');
	}
	
}