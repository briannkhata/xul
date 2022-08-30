<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bonus extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_bonuses(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('bonus_id');
			$query = $this->db->get('bonuses');
			return $query->result_array();
		}

		function get_bonus_by_id($bonus_id){
		    $this->db->where('bonus_id',$bonus_id);
			$query = $this->db->get('bonuses');
			return $query->result_array();
		}

		function get_bonuses_by_month_and_year($month,$year){
		    $this->db->where('month',$month);
			$this->db->where('year',$year);
			$query = $this->db->get('bonuses');
			return $query->result_array();
		}

		function get_month($bonus_id){
   		    $this->db->where('bonus_id',$bonus_id);
			$query = $this->db->get('bonuses')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['month'];
				}
			}else {
				return '';
			}
			
		}

		function get_year($bonus_id){
		$this->db->where('bonus_id',$bonus_id);
		 $query = $this->db->get('bonuses')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['year'];
			 }
		 }else {
			 return '';
		 }
		 }

		function get_amount($bonus_id){
		 $this->db->where('bonus_id',$bonus_id);
		 $query = $this->db->get('bonuses')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['amount'];
			 }
		 }else {
			 return '';
		 }
	 }

	 function get_user_id($bonus_id){
	 $this->db->where('bonus_id',$bonus_id);
	 $query = $this->db->get('bonuses')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['user_id'];
		 }
	 }else {
		 return '';
	 }
	 
 }

	
}

