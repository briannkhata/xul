<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_expense_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_expense_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('expense_type_id');
			$query = $this->db->get('expense_types');
			return $query->result_array();
		}

		function get_expense_type_by_id($expense_type_id){
		    $this->db->where('expense_type_id',$expense_type_id);
			$query = $this->db->get('expense_types');
			return $query->result_array();
		}

		function get_expense_type($expense_type_id){
   		    $this->db->where('expense_type_id',$expense_type_id);
			$query = $this->db->get('expense_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['expense_type'];
				}
			}else {
				return '';
			}
			
		}


	
}

