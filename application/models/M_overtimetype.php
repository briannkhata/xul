<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_overtimetype extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_overtimetypes(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('overtimetype_id','DESC');
			$query = $this->db->get('overtimetypes');
			return $query->result_array();
		}

		function get_overtimetype_by_id($overtimetype_id){
		    $this->db->where('overtimetype_id',$overtimetype_id);
			$query = $this->db->get('overtimetypes');
			return $query->result_array();
		}

		function get_overtimetype($overtimetype_id){
   		    $this->db->where('overtimetype_id',$overtimetype_id);
			$query = $this->db->get('overtimetypes')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['overtimetype'];
				}
			}else {
				return '';
			}
		}

		function get_rate($overtimetype_id){
			$this->db->where('overtimetype_id',$overtimetype_id);
		 $query = $this->db->get('overtimetypes')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['rate'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

}

