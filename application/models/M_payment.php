<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_payment extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_payments(){
		    $this->db->order_by('payment_id');
		    $this->db->join('charges','charges.charge_id = payments.charge_id');
			$query = $this->db->get('payments');
			return $query->result_array();
		}


		function get_total_payments_by_charge($charge_id){
		    $this->db->select_sum('amount_paid');
   		    $this->db->where('charge_id',$charge_id);
			return $query = $this->db->get('payments')->row()->amount_paid;
		}

	
		function get_charge_id($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['charge_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_amount_paid($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['amount_paid'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_paid($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_paid'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year'];
				}
			}else {
				return '';
			}
			
		}

		function get_charge_type_id($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['charge_type_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_added($payment_id){
   		    $this->db->where('payment_id',$payment_id);
			$query = $this->db->get('payments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_added'];
				}
			}else {
				return '';
			}
			
		}

	
}

