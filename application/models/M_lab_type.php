<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lab_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_lab_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('lab_type_id');
			$query = $this->db->get('lab_types');
			return $query->result_array();
		}

		function get_lab_type_by_id($lab_type_id){
		    $this->db->where('lab_type_id',$lab_type_id);
			$query = $this->db->get('lab_types');
			return $query->result_array();
		}

		function get_lab_type($lab_type_id){
   		    $this->db->where('lab_type_id',$lab_type_id);
			$query = $this->db->get('lab_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['lab_type'];
				}
			}else {
				return '';
			}
			
		}

	
}

