<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_academic_year extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_academic_years(){
		    $this->db->order_by('academic_year_id');
			$query = $this->db->get('academic_years');
			return $query->result_array();
		}

		function get_active_academic_years(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('academic_year_id');
			$query = $this->db->get('academic_years');
			return $query->result_array();
		}

		function get_academic_year_by_id($academic_year_id){
		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('academic_years');
			return $query->result_array();
		}

		function get_academic_year($academic_year_id){
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('academic_years')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_start_date($academic_year_id){
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('academic_years')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['starts'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_end_date($academic_year_id){
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('academic_years')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['ends'];
				}
			}else {
				return '';
			}
			
		}

		function get_active_academic_year(){
   		    $this->db->where('deleted',0);
			$query = $this->db->get('academic_years')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

	
}

