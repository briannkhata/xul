<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_attendance extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

		function get_attendance_id($attendance_date,$user_id,$term_id,$academic_year_id){
   		    $this->db->where('attendance_date',$attendance_date);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('attendances')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['attendance_id'];
				}
			}else {
				return '';
			}
			
		}

	  function get_attendances_by_term($term_id,$grade_level_id,$academic_year_id){
		$this->db->where('term_id',$term_id);
		$this->db->where('grade_level_id',$grade_level_id);
		$this->db->where('academic_year_id',$academic_year_id);
		$this->db->group_by('attendance_date');
		$this->db->order_by('attendance_date');
		return $query = $this->db->get('attendances')->result_array();
	 }

	  function get_attendances_by_term2($user_id,$term_id,$grade_level_id,$academic_year_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('term_id',$term_id);
		$this->db->where('grade_level_id',$grade_level_id);
		$this->db->where('academic_year_id',$academic_year_id);
		$this->db->group_by('attendance_date');
		$this->db->order_by('attendance_date');
		return $query = $this->db->get('attendances')->result_array();
	 }

		function get_attendance_code_id($attendance_date,$user_id,$term_id,$academic_year_id){
   		    $this->db->where('attendance_date',$attendance_date);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('attendances')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['attendance_code_id'];
				}
			}else {
				return '';
			}
			
		}

		
		function get_comment($attendance_date,$user_id,$term_id,$academic_year_id){
   		    $this->db->where('attendance_date',$attendance_date);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
   		    $this->db->where('term_id',$term_id);
			$query = $this->db->get('attendances')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

		
	
}

