<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hostel extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_hostels(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('hostel_id');
			$query = $this->db->get('hostels');
			return $query->result_array();
		}

		function get_student_hostels(){
			$query = $this->db->get('student_hostels');
			return $query->result_array();
		}

		function get_student_hostels2($hostel_id,$academic_year_id){
			$this->db->where('hostel_id',$hostel_id);
			$this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('student_hostels');
			return $query->result_array();
		}

		function get_student_hostels3($academic_year_id){
			$this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('student_hostels');
			return $query->result_array();
		}

		function get_hostel_by_type($hostel_type_id){
			$this->db->where('hostel_type_id',$hostel_type_id);
			$query = $this->db->get('hostels');
			return $query->result_array();
		}

		function get_hostel_by_id($hostel_id){
		    $this->db->where('hostel_id',$hostel_id);
			$query = $this->db->get('hostels');
			return $query->result_array();
		}

		function get_name($hostel_id){
   		    $this->db->where('hostel_id',$hostel_id);
			$query = $this->db->get('hostels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_available_hostel(){
   		    $this->db->order_by('hostel_id','RANDOM');
   		    $this->db->where('capacity >',0);
			$query = $this->db->get('hostels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['hostel_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_location($hostel_id){
   		    $this->db->where('hostel_id',$hostel_id);
			$query = $this->db->get('hostels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['location'];
				}
			}else {
				return '';
			}
			
		}

		function get_capacity($hostel_id){
   		    $this->db->where('hostel_id',$hostel_id);
			$query = $this->db->get('hostels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['capacity'];
				}
			}else {
				return 0;
			}
			
		}

		function get_hostel_type_id($hostel_id){
   		    $this->db->where('hostel_id',$hostel_id);
			$query = $this->db->get('hostels')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['hostel_type_id'];
				}
			}else {
				return '';
			}
			
		}

	
}

