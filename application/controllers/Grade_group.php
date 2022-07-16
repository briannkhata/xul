<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class grade_group extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Grade groups';
		$this->load->view($this->session->userdata('role').'/grade_groups',$data);			
    }

   
    function get_data_from_post(){
        $data['grade_group']    = $this->input->post('grade_group');
        $data['point_based']    = $this->input->post('point_based');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_grade_group->get_grade_group_by_id($update_id);
		foreach ($query as $row) {
		    $data['grade_group']  = $row['grade_group'];
  		    $data['point_based']  = $row['point_based'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('grade_group_id',$update_id);
			$this->db->update('grade_groups',$data);
		 }else{
			$this->db->insert('grade_groups',$data);
		}

		$this->session->set_flashdata('message','Grade group saved successfully');
			if($update_id !=''):
    			redirect('grade_group');
			else:
				redirect('grade_group/read');
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
		$this->load->view($this->session->userdata('role').'/add_grade_group',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('grade_group_id',$param);
        $this->db->update('grade_groups',$data);
    	$this->session->set_flashdata('message','Grade group deleted successfully');
		redirect('grade_group');
	}
	
}