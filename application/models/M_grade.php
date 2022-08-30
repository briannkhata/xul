<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grade extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_grades(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('grade_id');
			$query = $this->db->get('grades');
			return $query->result_array();
		}

		function get_grade_by_id($grade_id){
		    $this->db->where('grade_id',$grade_id);
			$query = $this->db->get('grades');
			return $query->result_array();
		}

		function get_grade($grade_id){
   		    $this->db->where('grade_id',$grade_id);
			$query = $this->db->get('grades')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade'];
				}
			}else {
				return '';
			}
		}

		function get_description($grade_id){
		$this->db->where('grade_id',$grade_id);
		 $query = $this->db->get('grades')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['description'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	 function get_leavegrant($grade_id){
		$this->db->where('grade_id',$grade_id);
		 $query = $this->db->get('grades')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['leavegrant'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	 function get_leavedays($grade_id){
		$this->db->where('grade_id',$grade_id);
		 $query = $this->db->get('grades')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['leavedays'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_salary($grade_id){
			$this->db->where('grade_id',$grade_id);
		 $query = $this->db->get('grades')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['salary'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	
}

