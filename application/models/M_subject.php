<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_subject extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_subjects(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('subject_id');
			$query = $this->db->get('subjects');
			return $query->result_array();
		}

		function get_subject_by_id($subject_id){
		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('subjects');
			return $query->result_array();
		}

		function get_subject($subject_id){
   		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('subjects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['subject'];
				}
			}else {
				return '';
			}
			
		}

		function get_title($subject_id){
   		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('subjects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['title'];
				}
			}else {
				return '';
			}
			
		}

		function get_code($subject_id){
   		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('subjects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['code'];
				}
			}else {
				return '';
			}
			
		}

		function get_key_subject($subject_id){
   		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('subjects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['key_subject'];
				}
			}else {
				return '';
			}
			
		}

		
	
}

