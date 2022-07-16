<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_staff_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_staff_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('staff_type_id');
			$query = $this->db->get('staff_types');
			return $query->result_array();
		}

		function get_staff_type_by_id($staff_type_id){
		    $this->db->where('staff_type_id',$staff_type_id);
			$query = $this->db->get('staff_types');
			return $query->result_array();
		}

		function get_staff_type($staff_type_id){
   		    $this->db->where('staff_type_id',$staff_type_id);
			$query = $this->db->get('staff_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['staff_type'];
				}
			}else {
				return '';
			}
			
		}

	
}

