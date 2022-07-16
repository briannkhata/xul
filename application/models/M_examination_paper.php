<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_examination_paper extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }



      	function get_examination_papers(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('examination_paper_id');
			$query = $this->db->get('examination_papers');
			return $query->result_array();
		}

		function get_examination_paper_by_id($examination_paper_id){
		    $this->db->where('examination_paper_id',$examination_paper_id);
			$query = $this->db->get('examination_papers');
			return $query->result_array();
		}

		function get_examination_paper_by_subject_id($examination_id,$subject_id,$user_id){
		    $this->db->where('subject_id',$subject_id);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->order_by('user_id');
			$query = $this->db->get('examination_marks');
			return $query->result_array();
		}

		function get_examination_paper($examination_paper_id){
   		    $this->db->where('examination_paper_id',$examination_paper_id);
			$query = $this->db->get('examination_papers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['examination_paper'];
				}
			}else {
				return '';
			}
			
		}

		function get_subject_id($examination_paper_id){
   		    $this->db->where('examination_paper_id',$examination_paper_id);
			$query = $this->db->get('examination_papers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['subject_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_examination_paper_id($subject_id){
   		    $this->db->where('subject_id',$subject_id);
			$query = $this->db->get('examination_papers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['examination_paper_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_total_marks($examination_paper_id){
   		    $this->db->where('examination_paper_id',$examination_paper_id);
			$query = $this->db->get('examination_papers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['total_marks'];
				}
			}else {
				return 0;
			}
			
		}


	
}

