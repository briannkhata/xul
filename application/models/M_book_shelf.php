<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_book_shelf extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_book_shelfs(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('book_shelf_id');
			$query = $this->db->get('book_shelfs');
			return $query->result_array();
		}

		function get_book_shelf_by_id($book_shelf_id){
		    $this->db->where('book_shelf_id',$book_shelf_id);
			$query = $this->db->get('book_shelfs');
			return $query->result_array();
		}

		function get_books_by_shelf_id($book_shelf_id){
		    $this->db->where('book_shelf_id',$book_shelf_id);
			$query = $this->db->get('books');
			return $query->result_array();
		}

		function get_book_shelf($book_shelf_id){
   		    $this->db->where('book_shelf_id',$book_shelf_id);
			$query = $this->db->get('book_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['book_shelf'];
				}
			}else {
				return '';
			}
			
		}

		function get_code($book_shelf_id){
   		    $this->db->where('book_shelf_id',$book_shelf_id);
			$query = $this->db->get('book_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['code'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($book_shelf_id){
   		    $this->db->where('book_shelf_id',$book_shelf_id);
			$query = $this->db->get('book_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

	
}

