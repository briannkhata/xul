<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class attendancecode extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Attendance Codes';
		$this->load->view($this->session->userdata('role').'/attendancecodes',$data);			
    }

    function get_data_from_post(){
        $data['attendancecode']    = $this->input->post('attendancecode');
        $data['title']    = $this->input->post('title');
		$data['deduct']    = $this->input->post('deduct');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_attendance_code->get_attendance_code_by_id($update_id);
		foreach ($query as $row) {
		    $data['attendancecode'] = $row['attendancecode'];
   		    $data['title'] = $row['title'];
			$data['deduct'] = $row['deduct'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('attendancecode_id',$update_id);
			$this->db->update('attendancecodes',$data);
		 }else{
			$this->db->insert('attendancecodes',$data);
		}

		$this->session->set_flashdata('message','Attendance Code saved successfully');
			if($update_id !=''):
    			redirect('attendancecode');
			else:
				redirect('attendancecode/read');
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

		$data['page_title']  = 'Create attendance code';
		$this->load->view($this->session->userdata('role').'/add_attendancecode',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('attendancecode_id',$param);
        $this->db->update('attendancecodes',$data);
    	$this->session->set_flashdata('message','Attendance Code deleted successfully');
		redirect('attendancecode');
	}

}