<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_group extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_groups(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('group_id');
			$query = $this->db->get('groups');
			return $query->result_array();
		}

		function get_available_groups($limit){
		    $this->db->where('deleted',0);
   		    $this->db->where('limit >=',$limit);
			$query = $this->db->get('groups');
			return $query->result_array();
		}

		function get_full_groups(){
		    $this->db->where('deleted',0);
   		    $this->db->where('closed',1);
			$query = $this->db->get('groups');
			return $query->num_rows();
		}

		function get_group_by_id($group_id){
		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('groups');
			return $query->result_array();
		}

		function get_group($group_id){
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['group'];
				}
			}else {
				return '';
			}
			
		}

		function get_limit($group_id){
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['limit'];
				}
			}else {
				return '';
			}
			
		}


		function get_group_id_random(){
   		    $this->db->limit(1);
   		    $this->db->where('deleted',0);
   		    $this->db->where('closed',0);
   		    $this->db->order_by('group_id','random()');
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['group_id'];
				}
			}else {
				return '';
			}
			
		}


		function get_details($group_id){
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['details'];
				}
			}else {
				return '';
			}
			
		}

		function get_joining_fee($group_id){
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['joining_fee'];
				}
			}else {
				return '';
			}
			
		}

		function get_available_group_id($limit){
   		    $this->db->where('limit >',$limit);
			$query = $this->db->get('groups')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return '';
			}
			
		}

	
}

