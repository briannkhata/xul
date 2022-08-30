<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_membershiptype extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_membershiptypes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('membershiptype_id');
			$query = $this->db->get('membershiptypes');
			return $query->result_array();
		}

		function get_membershiptype_by_id($membershiptype_id){
		    $this->db->where('membershiptype_id',$membershiptype_id);
			$query = $this->db->get('membershiptypes');
			return $query->result_array();
		}

		function get_membershiptype($membershiptype_id){
   		    $this->db->where('membershiptype_id',$membershiptype_id);
			$query = $this->db->get('membershiptypes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['membershiptype'];
				}
			}else {
				return '';
			}
		}

		function get_schemeType_id($membershiptype_id){
		$this->db->where('membershiptype_id',$membershiptype_id);
		 $query = $this->db->get('membershiptypes')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				return $row['schemetype_id'];
			 }
		 }else {
			 return '';
		 }
	 	}

		function get_charge($membershiptype_id){
		$this->db->where('membershiptype_id',$membershiptype_id);
		 $query = $this->db->get('membershiptypes')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				return $row['charge'];
			 }
		 }else {
			 return '';
		 }
		 
	 }
}

