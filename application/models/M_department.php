<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_department extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_departments(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('department_id');
			$query = $this->db->get('departments');
			return $query->result_array();
		}

		function get_department_by_id($department_id){
		    $this->db->where('department_id',$department_id);
			$query = $this->db->get('departments');
			return $query->result_array();
		}

		function get_department($department_id){
   		    $this->db->where('department_id',$department_id);
			$query = $this->db->get('departments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['department'];
				}
			}else {
				return '';
			}
			
		}

	
}

