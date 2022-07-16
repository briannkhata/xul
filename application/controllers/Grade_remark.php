<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class grade_remark extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Grade Remarks';
		$this->load->view($this->session->userdata('role').'/grade_remarks',$data);			
    }

   
    function get_data_from_post(){
        $data['grade_remark']    = $this->input->post('grade_remark');
        $data['grade_group_id']    = $this->input->post('grade_group_id');
        $data['mark_from']    = $this->input->post('mark_from');
        $data['mark_upto']    = $this->input->post('mark_upto');
        $data['grade_comment']    = $this->input->post('grade_comment');
        $data['headmaster']    = $this->input->post('headmaster');
        $data['classteacher']    = $this->input->post('classteacher');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_grade_remark->get_grade_remark_by_id($update_id);
		foreach ($query as $row) {
	        $data['grade_remark']    = $row['grade_remark'];
	        $data['grade_group_id']    = $row['grade_group_id'];
	        $data['mark_from']    = $row['mark_from'];
	        $data['mark_upto']    = $row['mark_upto'];
	        $data['grade_comment']    = $row['grade_comment'];
	        $data['headmaster']    = $row['headmaster'];
	        $data['classteacher']    = $row['classteacher'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('grade_remark_id',$update_id);
			$this->db->update('grade_remarks',$data);
		 }else{
			$this->db->insert('grade_remarks',$data);
		}

		$this->session->set_flashdata('message','Remark saved successfully');
			if($update_id !=''):
    			redirect('grade_remark');
			else:
				redirect('grade_remark/read');
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
		$this->load->view($this->session->userdata('role').'/add_grade_remark',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('grade_remark_id',$param);
        $this->db->update('grade_remarks',$data);
    	$this->session->set_flashdata('message','Remark deleted successfully');
		redirect('grade_remark');
	}
	
}