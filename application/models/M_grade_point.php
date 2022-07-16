<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grade_point extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_grade_points(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('grade_point_id');
			$query = $this->db->get('grade_points');
			return $query->result_array();
		}

		function get_grade_points_by_grade_group_id($grade_group_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('grade_group_id',$grade_group_id);
		    $this->db->order_by('grade_point_id');
			$query = $this->db->get('grade_points');
			return $query->result_array();
		}

		function get_grade_point_by_id($grade_point_id){
		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points');
			return $query->result_array();
		}

		function get_grade_point($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_point'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_from($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_from'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_upto($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_upto'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

		function get_name($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_group_id($grade_point_id){
   		    $this->db->where('grade_point_id',$grade_point_id);
			$query = $this->db->get('grade_points')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_group_id'];
				}
			}else {
				return '';
			}
			
		}

		
	
}

