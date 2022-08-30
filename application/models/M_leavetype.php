<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_leavetype extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_leavetypes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('leavetype_id');
			$query = $this->db->get('leavetypes');
			return $query->result_array();
		}

		function get_leavetype_by_id($leavetype_id){
		    $this->db->where('leavetype_id',$leavetype_id);
			$query = $this->db->get('leavetypes');
			return $query->result_array();
		}

		function get_leavetype($leavetype_id){
   		    $this->db->where('leavetype_id',$leavetype_id);
			$query = $this->db->get('leavetypes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['leavetype'];
				}
			}else {
				return '';
			}
			
		}

}

