<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class assesment_type extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Assesment types';
		$this->load->view($this->session->userdata('role').'/assesment_types',$data);			
    }

    function get_data_from_post(){
        $data['assesment_type']    = $this->input->post('assesment_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_assesment_type->get_assesment_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['assesment_type']    = $row['assesment_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('assesment_type_id',$update_id);
			$this->db->update('assesment_types',$data);
		 }else{
			$this->db->insert('assesment_types',$data);
		}

		$this->session->set_flashdata('message','Assesment type saved successfully');
			if($update_id !=''):
    			redirect('assesment_type');
			else:
				redirect('assesment_type/read');
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
		$this->load->view($this->session->userdata('role').'/add_assesment_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('assesment_type_id',$param);
        $this->db->update('assesment_types',$data);
    	$this->session->set_flashdata('message','Assesment type deleted successfully');
		redirect('assesment_type');
	}

}