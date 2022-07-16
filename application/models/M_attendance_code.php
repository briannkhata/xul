<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_attendance_code extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_attendance_codes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('attendance_code_id');
			$query = $this->db->get('attendance_codes');
			return $query->result_array();
		}

		function get_attendance_code_by_id($attendance_code_id){
		    $this->db->where('attendance_code_id',$attendance_code_id);
			$query = $this->db->get('attendance_codes');
			return $query->result_array();
		}

		function get_attendance_code($attendance_code_id){
   		    $this->db->where('attendance_code_id',$attendance_code_id);
			$query = $this->db->get('attendance_codes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['attendance_code'];
				}
			}else {
				return '';
			}
			
		}

	
}

