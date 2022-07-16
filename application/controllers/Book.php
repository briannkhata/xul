<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class book extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Books';
		$this->load->view($this->session->userdata('role').'/books',$data);			
    }

    function get_data_from_post(){
        $data['title']    = $this->input->post('title');
        $data['author']    = $this->input->post('author');
        $data['isbn']    = $this->input->post('isbn');
        $data['book_shelf_id']    = $this->input->post('book_shelf_id');
        $data['subject_id']    = $this->input->post('subject_id');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
        $data['book_category_id']    = $this->input->post('book_category_id');
        $data['edition']    = $this->input->post('edition');
        $data['added_by']    = $this->input->post('added_by');
        $data['publisher']    = $this->input->post('publisher');
        $data['date_published']    = $this->input->post('date_published');
        $data['place_published']    = $this->input->post('place_published');
        $data['date_added']    = date('Y-m-d h:i:s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_book->get_book_by_id($update_id);
		foreach ($query as $row) {
		    $data['title']    = $row['title'];
	        $data['subject_id']    = $row['subject_id'];
	        $data['grade_level_id']    = $row['grade_level_id'];
	        $data['book_category_id']    = $row['book_category_id'];
	        $data['author']    = $row['author'];
	        $data['book_shelf_id']    = $row['book_shelf_id'];
	        $data['edition']    = $row['edition'];
	        $data['isbn']    = $row['isbn'];
	        $data['added_by']    = $row['added_by'];
	        $data['publisher']    = $row['publisher'];
        	$data['date_published']    = $row['date_published'];
        	$data['place_published']    = $row['place_published'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('book_id',$update_id);
			$this->db->update('books',$data);
		 }else{
			$this->db->insert('books',$data);
		}

		$this->session->set_flashdata('message','Book saved successfully');
			if($update_id !=''):
    			redirect('book');
			else:
				redirect('book/read');
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

		$data['page_title']  = 'Create book';
		$this->load->view($this->session->userdata('role').'/add_book',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('book_id',$param);
        $this->db->update('books',$data);
    	$this->session->set_flashdata('message','book deleted successfully');
		redirect('book');
	}

	function delete_receiving($param=''){

		$book_id = $this->M_book->get_book_id($param);//get book_id 
		$oldstock = $this->M_book->get_instock($book_id);// get old stock
		$quantity = $this->M_book->get_quantity($param);//  get amount received

		$new['instock'] = $oldstock - $quantity;

        $this->db->where('book_id',$book_id);//change stock in books
		$this->db->update('books',$new);

		$this->db->where('book_receiving_id',$param);
        $this->db->delete('book_receivings');
    	$this->session->set_flashdata('message','Book Receiving deleted successfully');
		redirect('book/receivings');
	}

	function receivings(){
		$this->check_session();
		$data['page_title']  = 'Receivings';
		$this->load->view($this->session->userdata('role').'/receivings',$data);			
    }


	function receive($param=''){
		$this->check_session();
		$data['page_title']  = 'Receive Book '. $this->M_book->get_title($param);
		$data['book_id']  = $param;
		$this->load->view($this->session->userdata('role').'/receive_book',$data);			
    }

    function filter_receivings1(){
		$this->check_session();
		$data['page_title']  = 'Filter book receivings';
		$this->load->view($this->session->userdata('role').'/filter_receivings1',$data);			
    }

    function filter_receivings2(){
		$this->check_session();
		$data['arrival_date1']  = $this->input->post('arrival_date1');
		$data['arrival_date2']  = $this->input->post('arrival_date2');
		$data['page_title']  = 'Book Receivings | '.date('d M Y',strtotime($data['arrival_date1'])).' - '.date('d M Y',strtotime($data['arrival_date2']));
		$this->load->view($this->session->userdata('role').'/filter_receivings2',$data);			
    }

    function save_receive(){
		$this->check_session();
		$data['book_id'] = $this->input->post('book_id');
		$data['comment'] = $this->input->post('comment');
		$data['quantity'] = $this->input->post('quantity');
    	$data['arrival_date'] = date('Y-m-d-H-i-s',strtotime($this->input->post('arrival_date')));
    	$data['price'] = $this->input->post('price');
    	$data['total_cost'] = $data['price'] * $data['quantity'];
    	$data['added_by'] = $this->session->userdata('user_id');
		$data['date'] = date('Y-m-d h:i');

		$oldstock = $this->M_book->get_instock($data['book_id']);
		$new['instock'] = $oldstock + $data['quantity'];
        $this->db->insert('book_receivings',$data);		

        $this->db->where('book_id',$data['book_id']);//change stock in books
		$this->db->update('books',$new);

		$this->session->set_flashdata('message','Book Received updated successfully');
		redirect('book');
    }

    function filter_student_books(){
		$this->check_session();
		$data['page_title']  = 'USER Books';
		$this->load->view($this->session->userdata('role').'/filter_student_books',$data);			
    }

    function student_books(){
		$this->check_session();
		$data['page_title']  = 'Book Report';
		$data['user_id'] = $this->input->post('user_id');
  		$data['page_title'] ='LIBRARY REPORT FOR  '. strtoupper($this->M_user->get_user($data['user_id']));
		$this->load->view($this->session->userdata('role').'/student_books',$data);			
    }

    function filter_books(){
		$this->check_session();
		$data['page_title']  = 'Book Report';
		$this->load->view($this->session->userdata('role').'/filter_books',$data);			
    }

    function book_report(){
		$this->check_session();
		$data['page_title']  = 'Book Report';
		$data['grade_level_id'] = $this->input->post('grade_level_id');
		$data['subject_id'] = $this->input->post('subject_id');

		if($data['grade_level_id'] == 'all' && $data['subject_id'] == 'all'){
		   $data['page_title'] = 'ALL BOOKS | ALL SUBJECTS';
		   $data['books'] = $this->M_book->get_books();
		}else{

		if (!empty($data['grade_level_id']) && empty($data['subject_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_grade_level->get_grade_level($data['grade_level_id']));
		  $this->db->where('grade_level_id',$data['grade_level_id']);
  		  $this->db->where('deleted',0);
  		  $this->db->order_by('title');
		  $data['books'] = $this->db->get('books')->result_array();
		}

		if (empty($data['grade_level_id']) && !empty($data['subject_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_subject->get_subject($data['subject_id']));
		  $this->db->where('subject_id',$data['subject_id']);
  		  $this->db->where('deleted',0);
  		  $this->db->order_by('title');
		  $data['books'] = $this->db->get('books')->result_array();
		}

		if (!empty($data['grade_level_id']) && !empty($data['subject_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_grade_level->get_grade_level($data['grade_level_id'])).' | '.  
  		  strtoupper($this->M_subject->get_subject($data['subject_id']));
		  $this->db->where('grade_level_id',$data['grade_level_id']);
  		  $this->db->where('subject_id',$data['subject_id']);
  		  $this->db->where('deleted',0);
  		  $this->db->order_by('title');
		  $data['books'] = $this->db->get('books')->result_array();
		}
	}

		$this->load->view($this->session->userdata('role').'/book_report',$data);			
    }



    function filter1(){//missing books
		$this->check_session();
		$data['page_title']  = 'Filter Missing Books';
		$this->load->view($this->session->userdata('role').'/filter_missing_books1',$data);			
    }

    function filter2(){
		$this->check_session();
		$data['grade_level_id'] = $this->input->post('grade_level_id');
		if($data['grade_level_id'] == 'all'){
			$data['missing'] = $this->M_book->get_missing_books();
		}else{
			$data['missing'] = $this->M_book->get_missing_books_by_class($data['grade_level_id']);
		}

		$data['page_title']  = 'Missing Books | '.$this->M_grade_level->get_grade_level($data['grade_level_id']);
		$this->load->view($this->session->userdata('role').'/filter_missing_books2',$data);			
    }

   
}