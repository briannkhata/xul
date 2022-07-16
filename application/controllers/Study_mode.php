<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class study_mode extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Study Modes';
		$this->load->view($this->session->userdata('role').'/study_modes',$data);			
    }

   
    function get_data_from_post(){
        $data['study_mode']    = $this->input->post('study_mode');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_study_mode->get_study_mode_by_id($update_id);
		foreach ($query as $row) {
		    $data['study_mode']  = $row['study_mode'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('study_mode_id',$update_id);
			$this->db->update('study_modes',$data);
		 }else{
			$this->db->insert('study_modes',$data);
		}

		$this->session->set_flashdata('message','study mode saved successfully');
			if($update_id !=''):
    			redirect('study_mode');
			else:
				redirect('study_mode/read');
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

		$data['page_title']  = 'Create study_mode';
		$this->load->view($this->session->userdata('role').'/add_study_mode',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('study_mode_id',$param);
        $this->db->update('study_modes',$data);
    	$this->session->set_flashdata('message','Study Mode deleted successfully');
		redirect('study_mode');
	}
	
}