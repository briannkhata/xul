<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class leaveapplication extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Leave Applications';
		$this->load->view($this->session->userdata('role').'/leaveapplications',$data);			
    }

	function approveLeave($param=''){
		$this->check_session();
		$data['page_title']  = 'Approve Leave Application';
		$data['leaveapplication_id']  = $param;
		$this->load->view($this->session->userdata('role').'/approveLeave',$data);			
    }

	function approved(){
		$this->check_session();
		$data['page_title']  = 'Approved Leave Applications';
		$this->load->view($this->session->userdata('role').'/approved',$data);			
    }

	function approvedandonleave(){
		$this->check_session();
		$data['page_title']  = 'Approved Leave Applications';
		$this->load->view($this->session->userdata('role').'/approvedandonleave',$data);			
    }

	function approve(){
		$leaveapplication_id = $this->input->post('leaveapplication_id');
		$start_date = date('Y-m-d',strtotime($this->M_leaveapplication->get_start_date($leaveapplication_id)));
		$data['days_approved'] = $this->input->post('days_approved');
        $data['approved_by'] = $this->session->userdata('user_id');
		$data['end_date'] = date('Y-m-d',$start_date.'+'.$data['days_approved'].' days');

        $data['date_approved'] = date('Y-m-d');
		if( $data['date_approved'] == $start_date){
			$data['leavestatus'] = 2;
		}else{
			$data['leavestatus'] = 1;
		}

		$this->db->where('leaveapplication_id',$leaveapplication_id);
		$this->db->update('leaveapplications',$data);
		$this->session->set_flashdata('message','Leave approved successfully');
    	redirect('leaveapplication');
    }

    function get_data_from_post(){
        $data['days_applied']  = $this->input->post('days_applied');
        $data['start_date']  = $this->input->post('start_date');
        $data['comment']  = $this->input->post('comment');
        $data['leavetype_id']    = $this->input->post('leavetype_id');
        $data['user_id']    = $this->input->post('user_id');
		$data['date_applied'] = date('Y-m-d');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_leaveapplication->get_leaveapplication_by_id($update_id);
		foreach ($query as $row) {
			$data['days_applied']    = $row['days_applied'];
			$data['start_date']    = $row['start_date'];
			$data['comment']    = $row['comment'];
			$data['leavetype_id']    = $row['leavetype_id'];
			$data['user_id']    = $row['user_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$data['end_date'] = date('Y-m-d',strtotime($data['start_date'].'+'.$data['days_applied'].' days'));

		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('leaveapplication_id',$update_id);
			$this->db->update('leaveapplications',$data);
		 }else{
			$this->db->insert('leaveapplications',$data);
		}

		$this->session->set_flashdata('message','Leave Application saved successfully');
			if($update_id !=''):
    			redirect('leaveapplication');
			else:
				redirect('leaveapplication/read');
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

		$data['page_title']  = 'Create ';
		$this->load->view($this->session->userdata('role').'/add_leaveapplication',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('leaveapplication_id',$param);
        $this->db->update('leaveapplications',$data);
    	$this->session->set_flashdata('message','Leave application deleted successfully');
		redirect('leaveapplications');
	}

}