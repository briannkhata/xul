<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jobrequirement extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_jobrequirements(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('jobrequirement_id');
			$query = $this->db->get('jobrequirements');
			return $query->result_array();
		}

		function get_jobrequirement_by_id($jobrequirement_id){
		    $this->db->where('jobrequirement_id',$jobrequirement_id);
			$query = $this->db->get('jobrequirements');
			return $query->result_array();
		}

		function get_jobrequirement($jobrequirement_id){
   		    $this->db->where('jobrequirement_id',$jobrequirement_id);
			$query = $this->db->get('jobrequirements')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['jobrequirement'];
				}
			}else {
				return '';
			}
			
		}

		function get_job_id($jobrequirement_id){
   		    $this->db->where('jobrequirement_id',$jobrequirement_id);
			$query = $this->db->get('jobrequirements')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['job_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_status($jobrequirement_id){
   		    $this->db->where('jobrequirement_id',$jobrequirement_id);
			$query = $this->db->get('jobrequirements')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['status'];
				}
			}else {
				return '';
			}
			
		}

	
}

