<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_expense extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_expenses(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('expense_id');
			$query = $this->db->get('expenses');
			return $query->result_array();
		}

		function get_expense_by_id($expense_id){
		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses');
			return $query->result_array();
		}

		function get_amount($expense_id){
   		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['amount'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($expense_id){
   		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

		function get_day($expense_id){
   		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['day'];
				}
			}else {
				return '';
			}
			
		}

		function get_month($expense_id){
   		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['month'];
				}
			}else {
				return '';
			}
			
		}

		function get_year($expense_id){
   		    $this->db->where('expense_id',$expense_id);
			$query = $this->db->get('expenses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['year'];
				}
			}else {
				return '';
			}
			
		}

	
}

