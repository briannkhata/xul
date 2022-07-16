<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_study_mode extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_study_modes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('study_mode_id');
			$query = $this->db->get('study_modes');
			return $query->result_array();
		}

		function get_study_mode_by_id($study_mode_id){
		    $this->db->where('study_mode_id',$study_mode_id);
			$query = $this->db->get('study_modes');
			return $query->result_array();
		}

		function get_study_mode($study_mode_id){
   		    $this->db->where('study_mode_id',$study_mode_id);
			$query = $this->db->get('study_modes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['study_mode'];
				}
			}else {
				return '';
			}
			
		}
}

