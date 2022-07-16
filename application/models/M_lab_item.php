<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lab_item extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_lab_items(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_items');
			return $query->result_array();
		}

		function get_available_lab_items(){
		    $this->db->where('deleted',0);
  		    $this->db->where('instock >',0);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_items');
			return $query->result_array();
		}

		function get_lab_items_by_class($grade_level_id){
		    $this->db->where('deleted',0);
  		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('lab_items');
			return $query->result_array();
		}


		function get_missing_lab_items_by_id($lab_item_id){
		    $this->db->where('status',3);
  		    $this->db->where('lab_item_id',$lab_item_id);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_item_rentouts');
			return $query->result_array();
		}

		function get_missing_lab_items_by_user($user_id){
		    $this->db->where('status',3);
  		    $this->db->where('user_id',$user_id);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_item_rentouts');
			return $query->result_array();
		}

		function get_missing_lab_items(){
		    $this->db->where('status',3);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_item_rentouts');
			return $query->result_array();
		}

		function get_missing_lab_items_by_class($grade_level_id){
		    $this->db->where('status',3);
  		    $this->db->where('grade_level_id',$grade_level_id);
		    $this->db->order_by('lab_item_id');
			$query = $this->db->get('lab_item_rentouts');
			return $query->result_array();
		}


		function get_receivings(){
  		    //$this->db->where('instock >',0);
			$query = $this->db->get('lab_item_receivings');
			return $query->result_array();
		}

		function get_filtered_receivings($arrival_date1,$arrival_date2){
  		    $this->db->where('arrival_date >=',$arrival_date1);
  		    $this->db->where('arrival_date <=',$arrival_date2);
			$query = $this->db->get('lab_item_receivings');
			return $query->result_array();
		}

		function get_lab_item_by_id($lab_item_id){
		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items');
			return $query->result_array();
		}

		function get_lab_item($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['lab_item'];
				}
			}else {
				return '';
			}
			
		}

		function get_item_code($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['item_code'];
				}
			}else {
				return '';
			}
			
		}

		function get_edition($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['edition'];
				}
			}else {
				return '';
			}
			
		}

		function get_instock($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['qty'];
				}
			}else {
				return 0;
			}
			
		}

		function get_arrival_date($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['arrival_date'];
				}
			}else {
				return '';
			}
			
		}

		

		function get_date_donated($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_donated'];
				}
			}else {
				return '';
			}
			
		}

		function get_lab_item_category_id($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['lab_item_category_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_price($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_item_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['price'];
				}
			}else {
				return 0;
			}
			
		}

		function get_shelf_no($lab_item_id){
   		    $this->db->where('lab_item_id',$lab_item_id);
			$query = $this->db->get('lab_items')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['shelf_no'];
				}
			}else {
				return '';
			}
			
		}

		function get_lab_item_id($lab_item_receiving_id){
   		    $this->db->where('lab_item_receiving_id',$lab_item_receiving_id);
			$query = $this->db->get('lab_item_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['lab_item_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_quantity($lab_item_receiving_id){
   		    $this->db->where('lab_item_receiving_id',$lab_item_receiving_id);
			$query = $this->db->get('lab_item_receivings')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['quantity'];
				}
			}else {
				return '';
			}
			
		}

		


	
}

