<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_scholarship_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_scholarship_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('scholarship_type_id');
			$query = $this->db->get('scholarship_types');
			return $query->result_array();
		}

		function get_scholarship_type_by_id($scholarship_type_id){
		    $this->db->where('scholarship_type_id',$scholarship_type_id);
			$query = $this->db->get('scholarship_types');
			return $query->result_array();
		}

		function get_scholarship_type($scholarship_type_id){
   		    $this->db->where('scholarship_type_id',$scholarship_type_id);
			$query = $this->db->get('scholarship_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['scholarship_type'];
				}
			}else {
				return '';
			}
			
		}

		function get_description($scholarship_type_id){
   		    $this->db->where('scholarship_type_id',$scholarship_type_id);
			$query = $this->db->get('scholarship_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['description'];
				}
			}else {
				return '';
			}
			
		}

	
}

