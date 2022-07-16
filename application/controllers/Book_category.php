<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class book_category extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Book Categories';
		$this->load->view($this->session->userdata('role').'/book_categories',$data);			
    }

    function get_data_from_post(){
        $data['book_category']    = $this->input->post('book_category');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_book_category->get_book_category_by_id($update_id);
		foreach ($query as $row) {
		    $data['book_category']    = $row['book_category'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('book_category_id',$update_id);
			$this->db->update('book_categories',$data);
		 }else{
			$this->db->insert('book_categories',$data);
		}

		$this->session->set_flashdata('message','Book Category saved successfully');
			if($update_id !=''):
    			redirect('book_category');
			else:
				redirect('book_category/read');
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

		$data['page_title']  = 'Create Book Category';
		$this->load->view($this->session->userdata('role').'/add_book_category',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('book_category_id',$param);
        $this->db->update('book_categories',$data);
    	$this->session->set_flashdata('message','Book Category deleted successfully');
		redirect('book_category');
	}

}