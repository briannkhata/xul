<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_book_rentout extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_book_rentouts(){
		    $this->db->order_by('book_rentout_id');
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_missing_books(){
		   $this->db->where('status',3);
   		   $this->db->where('book_id',$book_id);
		   $query = $this->db->get('book_rentouts');
		   return $query->result_array();
		}

		function get_book_returns_by_book_id($book_id){
   		    $this->db->where('status',0);
   		    $this->db->where('book_id',$book_id);
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_book_rentouts_by_user_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_book_rentout_by_id($book_rentout_id){
		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts');
			return $query->result_array();
		}

		function get_book_id($book_rentout_id){
   		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['book_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_user_id($book_rentout_id){
   		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_borrow_date($book_rentout_id){
   		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['borrow_date'];
				}
			}else {
				return '';
			}
			
		}

		function get_due_date($book_rentout_id){
   		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['due_date'];
				}
			}else {
				return 0;
			}
			
		}

		function get_status($book_rentout_id){
   		    $this->db->where('book_rentout_id',$book_rentout_id);
			$query = $this->db->get('book_rentouts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['status'];
				}
			}else {
				return '';
			}
			
		}


	
}

