<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_scholarship extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_scholarships(){
		    $this->db->where('user_type_id !=',null);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_users2($user_type_id){
		    $this->db->where('deleted',0);
		    $this->db->where('user_type_id',$user_type_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user_by_id($user_id){
		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user_type_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_type_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_user_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_awarded($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['date_awarded'];
				}
			}else {
				return '';
			}
			
		}


	
}

