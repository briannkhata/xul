<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class examination_paper extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Examination papers';
		$this->load->view($this->session->userdata('role').'/examination_papers',$data);			
    }

   
    function get_data_from_post(){
        $data['examination_paper']    = $this->input->post('examination_paper');
        $data['subject_id']= $this->input->post('subject_id');
        $data['total_marks']= $this->input->post('total_marks');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_examination_paper->get_examination_paper_by_id($update_id);
		foreach ($query as $row) {
		    $data['examination_paper']  = $row['examination_paper'];
  		    $data['subject_id']= $row['subject_id'];
   		    $data['total_marks']= $row['total_marks'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('examination_paper_id',$update_id);
			$this->db->update('examination_papers',$data);
		 }else{
			$this->db->insert('examination_papers',$data);
		}

		$this->session->set_flashdata('message','Examination paper saved successfully');
			if($update_id !=''):
    			redirect('examination_paper');
			else:
				redirect('examination_paper/read');
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
		$this->load->view($this->session->userdata('role').'/add_examination_paper',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('examination_paper_id',$param);
        $this->db->update('examination_papers',$data);
    	$this->session->set_flashdata('message','Examination paper deleted successfully');
		redirect('examination_paper');
	}

	
}