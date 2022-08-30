<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_arrear extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_arrears(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('arrear_id');
			$query = $this->db->get('arrears');
			return $query->result_array();
		}

		function get_arrear_by_id($arrear_id){
		    $this->db->where('arrear_id',$arrear_id);
			$query = $this->db->get('arrears');
			return $query->result_array();
		}

		function get_arrears_by_month_and_year($month,$year){
		    $this->db->where('month',$month);
			$this->db->where('year',$year);
			$query = $this->db->get('arrears');
			return $query->result_array();
		}

		function get_month($arrear_id){
   		    $this->db->where('arrear_id',$arrear_id);
			$query = $this->db->get('arrears')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['month'];
				}
			}else {
				return '';
			}
			
		}

		function get_year($arrear_id){
		$this->db->where('arrear_id',$arrear_id);
		 $query = $this->db->get('arrears')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['year'];
			 }
		 }else {
			 return '';
		 }
		 }

		function get_amount($arrear_id){
		 $this->db->where('arrear_id',$arrear_id);
		 $query = $this->db->get('arrears')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['amount'];
			 }
		 }else {
			 return '';
		 }
	 }

	 function get_user_id($arrear_id){
	 $this->db->where('arrear_id',$arrear_id);
	 $query = $this->db->get('arrears')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['user_id'];
		 }
	 }else {
		 return '';
	 }
	 
 }

	
}

