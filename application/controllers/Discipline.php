<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class discipline extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Disciplines |';
		$this->load->view($this->session->userdata('role').'/disciplines',$data);			
    }

    function get_data_from_post(){
        $data['offence']    = $this->input->post('offence');
        $data['resolution']    = $this->input->post('resolution');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
        $data['user_id']    = $this->input->post('user_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['offence_date']    = $this->input->post('offence_date');
        $data['added_by']    = $this->input->post('added_by');
        $data['presiding_team']    = $this->input->post('presiding_team');
        $data['presiding_date']    = $this->input->post('presiding_date');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_discipline->get_discipline_by_id($update_id);
		foreach ($query as $row) {
		    $data['offence']    = $row['offence'];
	        $data['resolution']    = $row['resolution'];
	        $data['grade_level_id']    = $row['grade_level_id'];
	        $data['user_id']    = $row['user_id'];
	        $data['academic_year_id']    = $row['academic_year_id'];
	        $data['offence_date']    = $row['offence_date'];
	        $data['presiding_team']    = $row['presiding_team'];
   	        $data['presiding_date']    = $row['presiding_date'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('discipline_id',$update_id);
			$this->db->update('disciplines',$data);
		 }else{
			$this->db->insert('disciplines',$data);
		}

		$this->session->set_flashdata('message','Discipline saved successfully');
			if($update_id !=''):
    			redirect('discipline');
			else:
				redirect('discipline/read');
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

		$data['page_title']  = 'Create Discipline';
		$this->load->view($this->session->userdata('role').'/add_discipline',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('discipline_id',$param);
        $this->db->update('disciplines',$data);
    	$this->session->set_flashdata('message','Discipline deleted successfully');
		redirect('discipline');
	}

}