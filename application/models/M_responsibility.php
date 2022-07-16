<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_responsibility extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_responsibilities(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('responsibility_id');
			$query = $this->db->get('responsibilities');
			return $query->result_array();
		}

		function get_responsibility_by_id($responsibility_id){
		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities');
			return $query->result_array();
		}

		function get_responsibility($responsibility_id){
   		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['responsibility'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($responsibility_id){
   		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_id($responsibility_id){
   		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_description($responsibility_id){
   		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['description'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_assigned($responsibility_id){
   		    $this->db->where('responsibility_id',$responsibility_id);
			$query = $this->db->get('responsibilities')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_assigned'];
				}
			}else {
				return '';
			}
			
		}

	
}

