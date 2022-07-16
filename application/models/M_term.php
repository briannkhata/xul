<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_term extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_terms(){
		    $this->db->order_by('term_id');
			$query = $this->db->get('terms');
			return $query->result_array();
		}

		function get_active_terms(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('term_id');
			$query = $this->db->get('terms');
			return $query->result_array();
		}

		function get_term_by_id($term_id){
		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('terms');
			return $query->result_array();
		}

		function get_term($term_id){
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('terms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_start_date($term_id){
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('terms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['starts'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_end_date($term_id){
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('terms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['ends'];
				}
			}else {
				return '';
			}
		}

		function get_active_term(){
   		    $this->db->where('deleted',0);
			$query = $this->db->get('terms')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
		}

	
}

