<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Taxband extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Taxbands';
		$this->load->view($this->session->userdata('role').'/taxbands',$data);			
    }

    function get_data_from_post(){
        $data['band1_top']    = $this->input->post('band1_top');
		$data['band2_top']    = $this->input->post('band2_top');
        $data['band3_top']    = $this->input->post('band3_top');
        $data['band4_top']    = $this->input->post('band4_top');
        $data['band1_rate']    = $this->input->post('band1_rate');
        $data['band2_rate']    = $this->input->post('band2_rate');
        $data['band3_rate']    = $this->input->post('band3_rate');
        $data['band4_rate']    = $this->input->post('band4_rate');
        $data['title']    = $this->input->post('title');
        $data['active']    = $this->input->post('active');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_taxband->get_taxband_by_id($update_id);
		foreach ($query as $row) {
		    $data['band1_top']    = $row['band1_top'];
			$data['band2_top']    = $row['band2_top'];
			$data['band3_top']    = $row['band3_top'];
			$data['band4_top']    = $row['band4_top'];
			$data['band1_rate']    = $row['band1_rate'];
			$data['band2_rate']    = $row['band2_rate'];
			$data['band3_rate']    = $row['band3_rate'];
			$data['band4_rate']    = $row['band4_rate'];
			$data['title']    = $row['title'];
			$data['active']    = $row['active'];
			}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('taxband_id',$update_id);
			$this->db->update('taxbands',$data);
		 }else{
			$this->db->insert('taxbands',$data);
		}

		$this->session->set_flashdata('message','taxband saved successfully');
			if($update_id !=''):
    			redirect('taxband');
			else:
				redirect('taxband/read');
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
		$this->load->view($this->session->userdata('role').'/add_taxband',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('taxband_id',$param);
        $this->db->update('taxbands',$data);
    	$this->session->set_flashdata('message','taxband deleted successfully');
		redirect('taxband');
	}

}