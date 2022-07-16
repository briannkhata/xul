<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_income extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_incomes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('income_id');
			$query = $this->db->get('incomes');
			return $query->result_array();
		}

		function get_income_by_id($income_id){
		    $this->db->where('income_id',$income_id);
			$query = $this->db->get('incomes');
			return $query->result_array();
		}

		function get_amount($income_id){
   		    $this->db->where('income_id',$income_id);
			$query = $this->db->get('incomes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['amount'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($income_id){
   		    $this->db->where('income_id',$income_id);
			$query = $this->db->get('incomes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

		function get_income_date($income_id){
   		    $this->db->where('income_id',$income_id);
			$query = $this->db->get('incomes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['income_date'];
				}
			}else {
				return '';
			}
			
		}



	
}

