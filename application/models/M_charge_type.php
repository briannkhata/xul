<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_charge_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_charge_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('charge_type_id');
			$query = $this->db->get('charge_types');
			return $query->result_array();
		}

		function get_charge_type_by_id($charge_type_id){
		    $this->db->where('charge_type_id',$charge_type_id);
			$query = $this->db->get('charge_types');
			return $query->result_array();
		}

		function get_charge_type($charge_type_id){
   		    $this->db->where('charge_type_id',$charge_type_id);
			$query = $this->db->get('charge_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['charge_type'];
				}
			}else {
				return '';
			}
			
		}

		function get_amount($charge_type_id){
   		    $this->db->where('charge_type_id',$charge_type_id);
			$query = $this->db->get('charge_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['amount'];
				}
			}else {
				return '';
			}
			
		}

		function get_comment($charge_type_id){
   		    $this->db->where('charge_type_id',$charge_type_id);
			$query = $this->db->get('charge_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['comment'];
				}
			}else {
				return '';
			}
			
		}

	
}

