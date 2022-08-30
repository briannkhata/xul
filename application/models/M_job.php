<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_job extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_jobs(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('job_id');
			$query = $this->db->get('jobs');
			return $query->result_array();
		}

		function get_job_by_id($job_id){
		    $this->db->where('job_id',$job_id);
			$query = $this->db->get('jobs');
			return $query->result_array();
		}

		function get_job($job_id){
   		    $this->db->where('job_id',$job_id);
			$query = $this->db->get('jobs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['job'];
				}
			}else {
				return '';
			}
		}

		function get_grade_id($job_id){
   		    $this->db->where('job_id',$job_id);
			$query = $this->db->get('jobs')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_id'];
				}
			}else {
				return '';
			}
		}

}

