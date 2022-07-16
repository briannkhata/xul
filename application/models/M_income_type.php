<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_income_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_income_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('income_type_id');
			$query = $this->db->get('income_types');
			return $query->result_array();
		}

		function get_income_type_by_id($income_type_id){
		    $this->db->where('income_type_id',$income_type_id);
			$query = $this->db->get('income_types');
			return $query->result_array();
		}

		function get_income_type($income_type_id){
   		    $this->db->where('income_type_id',$income_type_id);
			$query = $this->db->get('income_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['income_type'];
				}
			}else {
				return '';
			}
			
		}


	
}

