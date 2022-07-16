<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grade_level extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_grade_levels(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('grade_level_id');
			$query = $this->db->get('grade_levels');
			return $query->result_array();
		}

		function get_grade_level_by_id($grade_level_id){
		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('grade_levels');
			return $query->result_array();
		}

		function get_grade_level($grade_level_id){
   		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('grade_levels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_level_numeric($grade_level_id){
   		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('grade_levels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['numeric'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_group_id($grade_level_id){
   		    $this->db->where('grade_level_id',$grade_level_id);
			$query = $this->db->get('grade_levels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_group_id'];
				}
			}else {
				return '';
			}
			
		}

		
	
}

