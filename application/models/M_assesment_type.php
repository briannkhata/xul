<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_assesment_type extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_assesment_types(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('assesment_type_id');
			$query = $this->db->get('assesment_types');
			return $query->result_array();
		}

		function get_assesment_type_by_id($assesment_type_id){
		    $this->db->where('assesment_type_id',$assesment_type_id);
			$query = $this->db->get('assesment_types');
			return $query->result_array();
		}

		function get_assesment_type($assesment_type_id){
   		    $this->db->where('assesment_type_id',$assesment_type_id);
			$query = $this->db->get('assesment_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['assesment_type'];
				}
			}else {
				return '';
			}
			
		}

	
}

