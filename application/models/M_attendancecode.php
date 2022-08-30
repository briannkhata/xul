<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_attendancecode extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_attendancecodes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('attendancecode_id');
			$query = $this->db->get('attendancecodes');
			return $query->result_array();
		}

		function get_attendancecode_by_id($attendancecode_id){
		    $this->db->where('attendancecode_id',$attendancecode_id);
			$query = $this->db->get('attendancecodes');
			return $query->result_array();
		}

		function get_attendancecode($attendancecode_id){
   		    $this->db->where('attendancecode_id',$attendancecode_id);
			$query = $this->db->get('attendancecodes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['attendancecode'];
				}
			}else {
				return '';
			}
			
		}

		function get_deduct($attendancecode_id){
			$this->db->where('attendancecode_id',$attendancecode_id);
		 $query = $this->db->get('attendancecodes')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['deduct'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_title($attendancecode_id){
			$this->db->where('attendancecode_id',$attendancecode_id);
		 $query = $this->db->get('attendancecodes')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['title'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	
}

