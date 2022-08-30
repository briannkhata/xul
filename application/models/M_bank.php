<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bank extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_banks(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('bank_id');
			$query = $this->db->get('banks');
			return $query->result_array();
		}

		function get_bank_by_id($bank_id){
		    $this->db->where('bank_id',$bank_id);
			$query = $this->db->get('banks');
			return $query->result_array();
		}

		function get_bank($bank_id){
   		    $this->db->where('bank_id',$bank_id);
			$query = $this->db->get('banks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['bank'];
				}
			}else {
				return '';
			}
			
		}

		function get_code($bank_id){
			$this->db->where('bank_id',$bank_id);
		 $query = $this->db->get('banks')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['code'];
			 }
		 }else {
			 return '';
		 }
	 }

	 function get_abbrev($bank_id){
	 $this->db->where('bank_id',$bank_id);
	 $query = $this->db->get('banks')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['abbrev'];
		 }
	 }else {
		 return '';
	 }
	 
 }

	
}

