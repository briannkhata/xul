<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lab_shelf extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_lab_shelfs(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('lab_shelf_id');
			$query = $this->db->get('lab_shelfs');
			return $query->result_array();
		}

		function get_lab_shelf_by_id($lab_shelf_id){
		    $this->db->where('lab_shelf_id',$lab_shelf_id);
			$query = $this->db->get('lab_shelfs');
			return $query->result_array();
		}

		function get_labs_by_shelf_id($lab_shelf_id){
		    $this->db->where('lab_shelf_id',$lab_shelf_id);
			$query = $this->db->get('labs');
			return $query->result_array();
		}

		function get_lab_shelf($lab_shelf_id){
   		    $this->db->where('lab_shelf_id',$lab_shelf_id);
			$query = $this->db->get('lab_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['lab_shelf'];
				}
			}else {
				return '';
			}
			
		}

		function get_code($lab_shelf_id){
   		    $this->db->where('lab_shelf_id',$lab_shelf_id);
			$query = $this->db->get('lab_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['code'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($lab_shelf_id){
   		    $this->db->where('lab_shelf_id',$lab_shelf_id);
			$query = $this->db->get('lab_shelfs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

	
}

