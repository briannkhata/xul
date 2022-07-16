<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_charge extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_charges(){
		    //$this->db->where('deleted',0);
		    $this->db->order_by('charge_id');
		    //$this->db->group_by('user_id');
			$query = $this->db->get('charges');
			return $query->result_array();
		}

		function get_charges_per_user($user_id,$term_id,$academic_year_id){
		    $this->db->select_sum('amount');
			$this->db->from('charge_types');
			$this->db->where('user_id',$user_id);
			$this->db->where('term_id',$term_id);
			$this->db->where('academic_year_id',$academic_year_id);
			return $query = $this->db->get()->row()->amount;
		}

		function get_charge_by_id($charge_id){
		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges');
			return $query->result_array();
		}

		function get_payment_mode($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['payment_mode'];
				}
			}else {
				return '';
			}
			
		}

		function get_amount($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['amount'];
				}
			}else {
				return 0;
			}
			
		}

		function get_balance($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['balance'];
				}
			}else {
				return 0;
			}
			
		}

		function get_date_paid($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_paid'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year'];
				}
			}else {
				return '';
			}
			
		}

		function get_charge_type_id($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['charge_type_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_added($charge_id){
   		    $this->db->where('charge_id',$charge_id);
			$query = $this->db->get('charges')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_added'];
				}
			}else {
				return '';
			}
			
		}

	
}

