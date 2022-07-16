<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class department extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Departments';
		$this->load->view($this->session->userdata('role').'/departments',$data);			
    }

    function get_data_from_post(){
        $data['department']    = $this->input->post('department');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_department->get_department_by_id($update_id);
		foreach ($query as $row) {
		    $data['department']    = $row['department'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('department_id',$update_id);
			$this->db->update('departments',$data);
		 }else{
			$this->db->insert('departments',$data);
		}

		$this->session->set_flashdata('message','Department saved successfully');
			if($update_id !=''):
    			redirect('department');
			else:
				redirect('department/read');
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

		$data['page_title']  = 'Create Department';
		$this->load->view($this->session->userdata('role').'/add_department',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('department_id',$param);
        $this->db->update('departments',$data);
    	$this->session->set_flashdata('message','Department deleted successfully');
		redirect('department');
	}

}