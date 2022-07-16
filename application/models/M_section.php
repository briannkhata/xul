<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_section extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_sections(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('section_id');
			$query = $this->db->get('sections');
			return $query->result_array();
		}

		function get_section_by_id($section_id){
		    $this->db->where('section_id',$section_id);
			$query = $this->db->get('sections');
			return $query->result_array();
		}

		function get_section($section_id){
   		    $this->db->where('section_id',$section_id);
			$query = $this->db->get('sections')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['section'];
				}
			}else {
				return '';
			}
			
		}
}

