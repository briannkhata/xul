<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class book_rentout extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Book Rentouts';
		$this->load->view($this->session->userdata('role').'/book_rentouts',$data);			
    }

    function get_data_from_post(){
        $data['book_id']    = $this->input->post('book_id');
        $data['user_id']    = $this->input->post('user_id');
        $data['grade_level_id']    = $this->M_user->get_grade_level_id($data['user_id']);
        $data['borrow_date']    = date('Y-m-d h:i');
        $data['due_date']    = $this->input->post('due_date');      
        $data['added_by']    = $this->input->post('added_by');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_book_rentout->get_book_rentout_by_id($update_id);
		foreach ($query as $row) {
		    $data['book_id']    = $row['book_id'];
	        $data['user_id']    = $row['user_id'];
	        $data['grade_level_id']    = $row['grade_level_id'];
	        $data['due_date']    = $row['due_date'];      
	        $data['added_by']    = $row['added_by'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();

		$oldstock = $this->M_book->get_instock($data['book_id']);
		$new['instock'] = $oldstock - 1;
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('book_rentout_id',$update_id);
			$this->db->update('book_rentouts',$data);
		 }else{
			$this->db->insert('book_rentouts',$data);
		}

		$this->db->where('book_id',$data['book_id']);//change stock in books
		$this->db->update('books',$new);

		$this->session->set_flashdata('message','Book Rented successfully');
			if($update_id !=''):
    			redirect('book_rentout');
			else:
				redirect('book_rentout/read');
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

		$data['page_title']  = 'Lend Book';
		$this->load->view($this->session->userdata('role').'/add_book_rentout',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;

		$book_id = $this->M_book_rentout->get_book_id($param);//get book_id 
		$oldstock = $this->M_book->get_instock($book_id);// get old stock
		$new['instock'] = $oldstock + 1;

        $this->db->where('book_id',$book_id);//change stock in books
		$this->db->update('books',$new);

		$this->db->where('book_rentout_id',$param);
        $this->db->update('book_rentouts',$data);
    	$this->session->set_flashdata('message','Book rentout deleted successfully');
		redirect('book_rentout');
	}

	 function return_book($param=''){
		$this->check_session();
		$data['page_title']  = 'Return a Book |';
		$data['book_rentout_id']  = $param;
		$data['book_id']  = $this->M_book_rentout->get_book_id($param);
		$data['user_id']  = $this->M_book_rentout->get_user_id($param);
		$data['title']  = $this->M_book->get_title($data['book_id']);
		$this->load->view($this->session->userdata('role').'/return_book',$data);			
    }

    function replace_book($param=''){
		$this->check_session();
		$data['page_title']  = 'Replace a Book |';
		$data['book_rentout_id']  = $param;
		$data['book_id']  = $this->M_book_rentout->get_book_id($param);
		$data['user_id']  = $this->M_book_rentout->get_user_id($param);
		$data['title']  = $this->M_book->get_title($data['book_id']);
		$this->load->view($this->session->userdata('role').'/replace_book',$data);			
    }

    function replace(){
		
		$book_id = $this->input->post('book_id');
		$book_rentout_id = $this->input->post('book_rentout_id');
		$data['date_replaced'] = date('Y-m-d h:s');
		$data['fine'] = $this->input->post('fine');
		$data['status'] = 1;
		$oldstock = $this->M_book->get_instock($book_id);// get old stock
		$new['instock'] = $oldstock + 1;
		
        $this->db->where('book_id',$book_id);//change stock in books
		$this->db->update('books',$new);

		$this->db->where('book_rentout_id',$book_rentout_id);
        $this->db->update('book_rentouts',$data);
    	$this->session->set_flashdata('message','BOOK REPLACED SUCCESSFULLY');
		redirect('book_rentout');
	}

	function return(){
		
		$book_id = $this->input->post('book_id');
		$book_rentout_id = $this->input->post('book_rentout_id');
		$status = $this->input->post('status');

		if($status == 3){
			$data['date_lost'] = date('Y-m-d h:s');
		   $data['fine'] = $this->input->post('fine');
			$data['status'] = 3;
		}

		if($status == 1){
		   $data['date_returned'] = date('Y-m-d h:s');
		   $data['fine'] = $this->input->post('fine');
		   $data['status'] = 1;
		   $oldstock = $this->M_book->get_instock($book_id);// get old stock
		   $new['instock'] = $oldstock + 1;
		}

        $this->db->where('book_id',$book_id);//change stock in books
		$this->db->update('books',$new);

		$this->db->where('book_rentout_id',$book_rentout_id);
        $this->db->update('book_rentouts',$data);
    	$this->session->set_flashdata('message','Book returned successfully');
		redirect('book_rentout');
	}

}