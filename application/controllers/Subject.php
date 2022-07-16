<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class subject extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Subjects';
		$this->load->view($this->session->userdata('role').'/subjects',$data);			
    }

   
    function get_data_from_post(){
        $data['subject']    = $this->input->post('subject');
        $data['code']= $this->input->post('code');
        $data['key_subject']= $this->input->post('key_subject');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_subject->get_subject_by_id($update_id);
		foreach ($query as $row) {
		    $data['subject']  = $row['subject'];
  		    $data['code']= $row['code'];
  		    $data['key_subject']= $row['key_subject'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('subject_id',$update_id);
			$this->db->update('subjects',$data);
		 }else{
			$this->db->insert('subjects',$data);
		}

		$this->session->set_flashdata('message','Subject saved successfully');
			if($update_id !=''):
    			redirect('subject');
			else:
				redirect('subject/read');
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

		$data['page_title']  = 'Create Subject';
		$this->load->view($this->session->userdata('role').'/add_subject',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('subject_id',$param);
        $this->db->update('subjects',$data);
    	$this->session->set_flashdata('message','Subject deleted successfully');
		redirect('subject');
	}
	
}