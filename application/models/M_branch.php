<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_branch extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_branches(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('branch_id');
			$query = $this->db->get('branches');
			return $query->result_array();
		}

		
		function get_branch_by_id($branch_id){
		    $this->db->where('branch_id',$branch_id);
			$query = $this->db->get('branches');
			return $query->result_array();
		}

		function get_branch($branch_id){
   		    $this->db->where('branch_id',$branch_id);
			$query = $this->db->get('branches')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_address($branch_id){
   		    $this->db->where('branch_id',$branch_id);
			$query = $this->db->get('branches')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['address'];
				}
			}else {
				return '';
			}
			
		}


		function get_rate(){
			$this->db->where('branch_id',$branch_id);
			$query = $this->db->get('branches')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['rate'];
				}
			}else {
				return '';
			}
			
		}


	

	
}

