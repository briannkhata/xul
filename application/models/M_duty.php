<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_duty extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_duties(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('duty_id');
			$query = $this->db->get('duties');
			return $query->result_array();
		}

		function get_duty_by_id($duty_id){
		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties');
			return $query->result_array();
		}

		function get_from_date($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['from_date'];
				}
			}else {
				return '';
			}
			
		}

		function get_to_date($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['to_date'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_id($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_week_no($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['week_no'];
				}
			}else {
				return '';
			}
			
		}

		function get_user_id($duty_id){
   		    $this->db->where('duty_id',$duty_id);
			$query = $this->db->get('duties')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
			
		}

	
}

