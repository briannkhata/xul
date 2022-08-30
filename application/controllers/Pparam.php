<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pparam extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'pension parameters';
		$this->load->view($this->session->userdata('role').'/pparams',$data);			
    }

    function get_data_from_post(){
        $data['staff']    = $this->input->post('staff');
		$data['company']    = $this->input->post('company');
        $data['gla']    = $this->input->post('gla');
        $data['broker']    = $this->input->post('broker');
        $data['vat']    = $this->input->post('vat');
        $data['admin_fee']    = $this->input->post('admin_fee');
        $data['title']    = $this->input->post('title');
        $data['active']    = $this->input->post('active');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_pparam->get_param_by_id($update_id);
		foreach ($query as $row) {
		    $data['staff']    = $row['staff'];
			$data['company']    = $row['company'];
			$data['gla']    = $row['gla'];
			$data['broker']    = $row['broker'];
			$data['vat']    = $row['vat'];
			$data['admin_fee']    = $row['admin_fee'];
			$data['title']    = $row['title'];
			$data['active']    = $row['active'];
			}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('pparam_id',$update_id);
			$this->db->update('pparams',$data);
		 }else{
			$this->db->insert('pparams',$data);
		}

		$this->session->set_flashdata('message','Parameter saved successfully');
			if($update_id !=''):
    			redirect('pparam');
			else:
				redirect('pparam/read');
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
		$this->load->view($this->session->userdata('role').'/add_pparam',$data);			
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('pparam_id',$param);
        $this->db->update('pparams',$data);
    	$this->session->set_flashdata('message','Parameter deleted successfully');
		redirect('pparam');
	}

}