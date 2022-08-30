<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Overtimetype extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'overtime types';
		$this->load->view($this->session->userdata('role').'/overtimetypes',$data);			
    }

    function get_data_from_post(){
        $data['overtimetype']    = $this->input->post('overtimetype');
        $data['rate']    = $this->input->post('rate');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_overtimetype->get_overtimetype_by_id($update_id);
		foreach ($query as $row) {
		    $data['overtimetype']    = $row['overtimetype'];
        	$data['rate']    = $row['rate'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('overtimetype_id',$update_id);
			$this->db->update('overtimetypes',$data);
		 }else{
			$this->db->insert('overtimetypes',$data);
		}

		$this->session->set_flashdata('message','overtime type saved successfully');
			if($update_id !=''):
    			redirect('overtimetype');
			else:
				redirect('overtimetype/read');
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
		$this->load->view($this->session->userdata('role').'/add_overtimetype',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('overtimetype_id',$param);
        $this->db->update('overtimetypes',$data);
    	$this->session->set_flashdata('message','overtime type deleted successfully');
		redirect('overtimetype');
	}
   
}