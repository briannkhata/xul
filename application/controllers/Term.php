<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class term extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'School terms';
		$this->load->view($this->session->userdata('role').'/terms',$data);			
    }
   
    function get_data_from_post(){
        $data['term']    = $this->input->post('term');
        $data['starts']= $this->input->post('starts');
        $data['ends']   = $this->input->post('ends');
        $data['academic_year_id']   = $this->input->post('academic_year_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_term->get_term_by_id($update_id);
		foreach ($query as $row) {
		    $data['term']  = $row['term'];
  		    $data['starts']= $row['starts'];
		    $data['ends'] = $row['ends'];
   		    $data['academic_year_id'] = $row['academic_year_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('term_id',$update_id);
			$this->db->update('terms',$data);
		 }else{
			$this->db->insert('terms',$data);
		}

		$this->session->set_flashdata('message','School term saved successfully');
			if($update_id !=''):
    			redirect('term');
			else:
				redirect('term/read');
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

		$data['page_title']  = 'Create academic Year';
		$this->load->view($this->session->userdata('role').'/add_term',$data);			
	}

	
	function delete($param=''){
		$this->db->where('term_id',$param);
        $this->db->delete('terms');
    	$this->session->set_flashdata('message','School term deleted successfully');
		redirect('term');
	}

	function close($param=''){
		$data['deleted'] = 1;
		$this->db->where('term_id',$param);
        $this->db->update('terms',$data);
    	$this->session->set_flashdata('message','Term closed successfully');
		redirect('term');
	}

	function open($param=''){
		$data['deleted'] = 0;
		$this->db->where('term_id',$param);
        $this->db->update('terms',$data);
    	$this->session->set_flashdata('message','Term Open successfully');
		redirect('term');
	}
	
}