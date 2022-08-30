<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_users(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user_by_id($user_id){
		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_users_by_branch($branch_id){
		    $this->db->where('branch_id',$branch_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_users_by_gender($gender){
		    $this->db->where('gender',$gender);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_id($user_id){
		$this->db->where('user_id',$user_id);
		 $query = $this->db->get('users')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['grade_id'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_gender($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['gender'];
				}
			}else {
				return '';
			}
		}

		function get_reg_no($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['reg_no'];
				}
			}else {
				return '';
			}
			
		}

		function get_phone($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['phone'];
				}
			}else {
				return '';
			}
		}

		function get_email($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['email'];
				}
			}else {
				return '';
			}
		}

		function get_role($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['role'];
				}
			}else {
				return '';
			}
		}

		function get_section_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['section_id'];
				}
			}else {
				return '';
			}
		}

		function get_grade_level_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level_id'];
				}
			}else {
				return '';
			}
		}

		function get_postal_address($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['postal_address'];
				}
			}else {
				return '';
			}
		}
}

