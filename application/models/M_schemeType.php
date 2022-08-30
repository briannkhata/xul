<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_schemeType extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_schemeTypes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('schemeType_id');
			$query = $this->db->get('schemeTypes');
			return $query->result_array();
		}

		function get_schemeType_by_id($schemeType_id){
		    $this->db->where('schemeType_id',$schemeType_id);
			$query = $this->db->get('schemeTypes');
			return $query->result_array();
		}

		function get_schemeType($schemeType_id){
   		    $this->db->where('schemeType_id',$schemeType_id);
			$query = $this->db->get('schemeTypes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['schemetype'];
				}
			}else {
				return '';
			}
			
		}

}

