<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_book_category extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_book_categories(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('book_category_id');
			$query = $this->db->get('book_categories');
			return $query->result_array();
		}

		function get_book_category_by_id($book_category_id){
		    $this->db->where('book_category_id',$book_category_id);
			$query = $this->db->get('book_categories');
			return $query->result_array();
		}

		function get_book_category($book_category_id){
   		    $this->db->where('book_category_id',$book_category_id);
			$query = $this->db->get('book_categories')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['book_category'];
				}
			}else {
				return '';
			}
			
		}

	
}

