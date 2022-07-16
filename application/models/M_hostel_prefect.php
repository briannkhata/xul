<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hostel_prefect extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_hostel_prefects(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('hostel_prefect_id');
			$query = $this->db->get('hostel_prefects');
			return $query->result_array();
		}

		function get_hostel_prefect_by_id($hostel_prefect_id){
		    $this->db->where('hostel_prefect_id',$hostel_prefect_id);
			$query = $this->db->get('hostel_prefects');
			return $query->result_array();
		}

		function get_hostel_id($hostel_prefect_id){
   		    $this->db->where('hostel_prefect_id',$hostel_prefect_id);
			$query = $this->db->get('hostel_prefects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['hostel_id'];
				}
			}else {
				return '';
			}
			
		}


		function get_user_id($hostel_prefect_id){
   		    $this->db->where('hostel_prefect_id',$hostel_prefect_id);
			$query = $this->db->get('hostel_prefects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_assigned($hostel_prefect_id){
   		    $this->db->where('hostel_prefect_id',$hostel_prefect_id);
			$query = $this->db->get('hostel_prefects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_assigned'];
				}
			}else {
				return 0;
			}
			
		}

		function get_academic_year_id($hostel_prefect_id){
   		    $this->db->where('hostel_prefect_id',$hostel_prefect_id);
			$query = $this->db->get('hostel_prefects')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

	
}

