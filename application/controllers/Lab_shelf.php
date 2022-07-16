<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lab_shelf extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Shelves';
		$this->load->view($this->session->userdata('role').'/lab_shelfs',$data);			
    }

    function get_data_from_post(){
        $data['lab_shelf']    = $this->input->post('lab_shelf');
        $data['code']    = $this->input->post('code');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_lab_shelf->get_lab_shelf_by_id($update_id);
		foreach ($query as $row) {
		    $data['lab_shelf']    = $row['lab_shelf'];
		    $data['code']    = $row['code'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('lab_shelf_id',$update_id);
			$this->db->update('lab_shelfs',$data);
		 }else{
			$this->db->insert('lab_shelfs',$data);
		}

		$this->session->set_flashdata('message','lab shelf saved successfully');
			if($update_id !=''):
    			redirect('lab_shelf');
			else:
				redirect('lab_shelf/read');
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
		$this->load->view($this->session->userdata('role').'/add_lab_shelf',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('lab_shelf_id',$param);
        $this->db->update('lab_shelfs',$data);
    	$this->session->set_flashdata('message','lab shelf deleted successfully');
		redirect('lab_shelf');
	}

}