<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_leaveapplication extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_leaveapplications(){
		    $this->db->where('leavestatus',0);
			$this->db->where('deleted',0);
		    $this->db->order_by('leaveapplication_id');
			$query = $this->db->get('leaveapplications');
			return $query->result_array();
		}

		function get_approved_leaveapplications(){
			$this->db->where('deleted',0);
		    $this->db->where('leavestatus',1);
		    $this->db->order_by('leaveapplication_id');
			$query = $this->db->get('leaveapplications');
			return $query->result_array();
		}

		function get_approved_and_on_leave(){
		    $this->db->where('deleted',0);
			$this->db->where('leavestatus',2);
		    $this->db->order_by('leaveapplication_id');
			$query = $this->db->get('leaveapplications');
			return $query->result_array();
		}

		function get_leaveapplication_by_id($leaveapplication_id){
		    $this->db->where('leaveapplication_id',$leaveapplication_id);
			$query = $this->db->get('leaveapplications');
			return $query->result_array();
		}

		function get_leavetype_id($leaveapplication_id){
   		    $this->db->where('leaveapplication_id',$leaveapplication_id);
			$query = $this->db->get('leaveapplications')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['leavetype_id'];
				}
			}else {
				return '';
			}
		}

		function get_user_id($leaveapplication_id){
   		    $this->db->where('leaveapplication_id',$leaveapplication_id);
			$query = $this->db->get('leaveapplications')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
		}

		function get_startdate($leaveapplication_id){
   		    $this->db->where('leaveapplication_id',$leaveapplication_id);
			$query = $this->db->get('leaveapplications')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['startdate'];
				}
			}else {
				return '';
			}
		}

		function get_days_applied($leaveapplication_id){
		 $this->db->where('leaveapplication_id',$leaveapplication_id);
		 $query = $this->db->get('leaveapplications')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['days_applied'];
			 }
		 }else {
			 return '';
		 }
		}

		function get_days_approved($leaveapplication_id){
			$this->db->where('leaveapplication_id',$leaveapplication_id);
		 $query = $this->db->get('leaveapplications')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['days_approved'];
			 }
		 }else {
			 return '';
		 }
	   }

	   function get_approved_by($leaveapplication_id){
		$this->db->where('leaveapplication_id',$leaveapplication_id);
		$query = $this->db->get('leaveapplications')->result_array();
		if(count($query) > 0){
			foreach ($query as $row) {
				return $row['approved_by'];
			}
		}else {
			return '';
		}
	  }

	function get_leave_status($leaveapplication_id){
	 $this->db->where('leaveapplication_id',$leaveapplication_id);
	 $query = $this->db->get('leaveapplications')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['leave_status'];
		 }
	 }else {
		 return '';
	 }
 }

	function get_leave_grant($leaveapplication_id){
	$this->db->where('leaveapplication_id',$leaveapplication_id);
	 $query = $this->db->get('leaveapplications')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['leave_grant'];
		 }
	 }else {
		 return '';
	 }
	 
 }

	function get_end_date($leaveapplication_id){
	$this->db->where('leaveapplication_id',$leaveapplication_id);
	 $query = $this->db->get('leaveapplications')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			return $row['end_date'];
		 }
	 }else {
		 return '';
	 }
 }

 function get_date_approved($leaveapplication_id){
	$this->db->where('leaveapplication_id',$leaveapplication_id);
	$query = $this->db->get('leaveapplications')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			return $row['date_approved'];
		 }
	 }else {
		 	return '';
	 }
   }

}

