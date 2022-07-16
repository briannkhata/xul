<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grade_group extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_grade_groups(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('grade_group_id');
			$query = $this->db->get('grade_groups');
			return $query->result_array();
		}

		function get_grade_group_by_id($grade_group_id){
		    $this->db->where('grade_group_id',$grade_group_id);
			$query = $this->db->get('grade_groups');
			return $query->result_array();
		}

		function get_grade_group($grade_group_id){
   		    $this->db->where('grade_group_id',$grade_group_id);
			$query = $this->db->get('grade_groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_group'];
				}
			}else {
				return '';
			}
			
		}

		function get_point_based($grade_group_id){
   		    $this->db->where('grade_group_id',$grade_group_id);
			$query = $this->db->get('grade_groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['point_based'];
				}
			}else {
				return '';
			}
			
		}
}

