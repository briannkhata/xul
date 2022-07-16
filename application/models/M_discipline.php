<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_discipline extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_disciplines(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('discipline_id');
			$query = $this->db->get('disciplines');
			return $query->result_array();
		}

		function get_discipline_by_id($discipline_id){
		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines');
			return $query->result_array();
		}

		function get_offences_by_user_count($user_id,$academic_year_id){
		    $this->db->where('user_id',$user_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('disciplines');
			return $query->result_array();
		}

	
		function get_academic_calendar_id($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_calendar_id'];
				}
			}else {
				return '';
			}
			
		}


		function get_grade_level_id($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_added_by($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['added_by'];
				}
			}else {
				return '';
			}
			
		}


		function get_academic_year_id($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_offence($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['offence'];
				}
			}else {
				return '';
			}
			
		}

		function get_offence_date($discipline_id){
   		    $this->db->where('discipline_id',$discipline_id);
			$query = $this->db->get('disciplines')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['offence_date'];
				}
			}else {
				return '';
			}
			
		}



	
}

