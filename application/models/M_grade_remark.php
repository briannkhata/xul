<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grade_remark extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_grade_remarks(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('grade_remark_id');
			$query = $this->db->get('grade_remarks');
			return $query->result_array();
		}

		function get_grade_remarks_by_grade_group_id($grade_group_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('grade_group_id',$grade_group_id);
		    $this->db->order_by('grade_remark_id');
			$query = $this->db->get('grade_remarks');
			return $query->result_array();
		}

		function get_grade_remark_by_id($grade_remark_id){
		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks');
			return $query->result_array();
		}

		function get_grade_remark($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_remark'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_from($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_from'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_upto($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_upto'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_comment($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_comment'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_group_id($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_group_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_classteacher($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['classteacher'];
				}
			}else {
				return '';
			}
			
		}

		function get_headmaster($grade_remark_id){
   		    $this->db->where('grade_remark_id',$grade_remark_id);
			$query = $this->db->get('grade_remarks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['headmaster'];
				}
			}else {
				return '';
			}
			
		}


		
	
}

