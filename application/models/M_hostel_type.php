<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hostel_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_hostel_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('hostel_type_id');
			$query = $this->db->get('hostel_types');
			return $query->result_array();
		}

		function get_hostel_type_by_id($hostel_type_id){
		    $this->db->where('hostel_type_id',$hostel_type_id);
			$query = $this->db->get('hostel_types');
			return $query->result_array();
		}

		function get_hostel_type($hostel_type_id){
   		    $this->db->where('hostel_type_id',$hostel_type_id);
			$query = $this->db->get('hostel_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['hostel_type'];
				}
			}else {
				return '';
			}
			
		}

	
}

