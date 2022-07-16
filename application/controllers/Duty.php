<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class duty extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Duty List';
		$this->load->view($this->session->userdata('role').'/duties',$data);			
    }

    function get_data_from_post(){
        $data['user_id']    = $this->input->post('user_id');
        $data['from_date']    = $this->input->post('from_date');
        $data['to_date']    = $this->input->post('to_date');
        $data['week_no']    = $this->input->post('week_no');
        $data['term_id']    = $this->input->post('term_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['comment']    = $this->input->post('comment');
        $data['added_by']    = $this->input->post('added_by');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_duty->get_duty_by_id($update_id);
		foreach ($query as $row) {
		    $data['user_id']    = $row['user_id'];
	        $data['from_date']    = $row['from_date'];
	        $data['to_date']    = $row['to_date'];
	        $data['term_id']    = $row['term_id'];
	       	$data['academic_year_id']    = $row['academic_year_id'];
   	       	$data['comment']    = $row['comment'];
	        $data['week_no']    = $row['week_no'];
   	        $data['added_by']    = $row['added_by'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('duty_id',$update_id);
			$this->db->update('duties',$data);
		 }else{
			$this->db->insert('duties',$data);
		}

		$this->session->set_flashdata('message','Duty saved successfully');
			if($update_id !=''):
    			redirect('duty');
			else:
				redirect('duty/read');
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

		$data['page_title']  = 'Create Duty';
		$this->load->view($this->session->userdata('role').'/add_duty',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('duties_id',$param);
        $this->db->update('duties',$data);
    	$this->session->set_flashdata('message','Duty deleted successfully');
		redirect('duties');
	}

}