<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class book_shelf extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Book shelfs';
		$this->load->view($this->session->userdata('role').'/book_shelfs',$data);			
    }

    function get_data_from_post(){
        $data['book_shelf']    = $this->input->post('book_shelf');
        $data['code']    = $this->input->post('code');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_book_shelf->get_book_shelf_by_id($update_id);
		foreach ($query as $row) {
		    $data['book_shelf']    = $row['book_shelf'];
		    $data['code']    = $row['code'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('book_shelf_id',$update_id);
			$this->db->update('book_shelfs',$data);
		 }else{
			$this->db->insert('book_shelfs',$data);
		}

		$this->session->set_flashdata('message','Book shelf saved successfully');
			if($update_id !=''):
    			redirect('book_shelf');
			else:
				redirect('book_shelf/read');
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

		$data['page_title']  = 'Create Book shelf';
		$this->load->view($this->session->userdata('role').'/add_book_shelf',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('book_shelf_id',$param);
        $this->db->update('book_shelfs',$data);
    	$this->session->set_flashdata('message','Book shelf deleted successfully');
		redirect('book_shelf');
	}

}