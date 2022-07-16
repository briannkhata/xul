<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_book extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_books(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('book_id');
			$query = $this->db->get('books');
			return $query->result_array();
		}

		function get_available_books(){
		    $this->db->where('deleted',0);
  		    $this->db->where('instock >',0);
		    $this->db->order_by('book_id');
			$query = $this->db->get('books');
			return $query->result_array();
		}

		function get_books_by_class($grade_level_id){
		    $this->db->where('deleted',0);
  		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('books');
			return $query->result_array();
		}


		function get_missing_books_by_id($book_id){
		    $this->db->where('status',3);
  		    $this->db->where('book_id',$book_id);
		    $this->db->order_by('book_id');
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_missing_books_by_user($user_id){
		    $this->db->where('status',3);
  		    $this->db->where('user_id',$user_id);
		    $this->db->order_by('book_id');
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_missing_books(){
		    $this->db->where('status',3);
		    $this->db->order_by('book_id');
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_missing_books_by_class($grade_level_id){
		    $this->db->where('status',3);
  		    $this->db->where('grade_level_id',$grade_level_id);
		    $this->db->order_by('book_id');
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}


		function get_receivings(){
  		    //$this->db->where('instock >',0);
			$query = $this->db->get('book_receivings');
			return $query->result_array();
		}

		function get_filtered_receivings($arrival_date1,$arrival_date2){
  		    $this->db->where('arrival_date >=',$arrival_date1);
  		    $this->db->where('arrival_date <=',$arrival_date2);
			$query = $this->db->get('book_receivings');
			return $query->result_array();
		}

		function get_book_by_id($book_id){
		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books');
			return $query->result_array();
		}

		function get_title($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['title'];
				}
			}else {
				return '';
			}
			
		}

		function get_isbn($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['isbn'];
				}
			}else {
				return '';
			}
			
		}

		function get_edition($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['edition'];
				}
			}else {
				return '';
			}
			
		}

		function get_instock($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['instock'];
				}
			}else {
				return 0;
			}
			
		}

		function get_arrival_date($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['arrival_date'];
				}
			}else {
				return '';
			}
			
		}

		function get_subject_id($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['subject_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_level_id($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_added_by($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['added_by'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_donated($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_donated'];
				}
			}else {
				return '';
			}
			
		}

		function get_book_category_id($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['book_category_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_price($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('book_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['price'];
				}
			}else {
				return 0;
			}
			
		}

		function get_shelf_no($book_id){
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('books')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['shelf_no'];
				}
			}else {
				return '';
			}
			
		}

		function get_book_id($book_receiving_id){
   		    $this->db->where('book_receiving_id',$book_receiving_id);
			$query = $this->db->get('book_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['book_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_quantity($book_receiving_id){
   		    $this->db->where('book_receiving_id',$book_receiving_id);
			$query = $this->db->get('book_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['quantity'];
				}
			}else {
				return '';
			}
			
		}

		


	
}

