<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allowance extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Allowances';
		$this->load->view($this->session->userdata('role').'/allowances',$data);			
    }

    function get_data_from_post(){
        $data['allowance']    = $this->input->post('allowance');
        $data['code']    = $this->input->post('code');
		$data['amount']    = $this->input->post('amount');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_allowance->get_allowance_by_id($update_id);
		foreach ($query as $row) {
		    $data['allowance']    = $row['allowance'];
		    $data['code']    = $row['code'];
			$data['amount']    = $row['amount'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('allowance_id',$update_id);
			$this->db->update('allowances',$data);
		 }else{
			$this->db->insert('allowances',$data);
		}

		$this->session->set_flashdata('message','Allowance saved successfully');
			if($update_id !=''):
    			redirect('allowance');
			else:
				redirect('allowance/read');
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
		$this->load->view($this->session->userdata('role').'/add_allowance',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('allowance_id',$param);
        $this->db->update('allowances',$data);
    	$this->session->set_flashdata('message','Allowance deleted successfully');
		redirect('allowance');
	}

}