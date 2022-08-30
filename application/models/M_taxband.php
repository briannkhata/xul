<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_taxband extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_taxbands(){
		    $this->db->order_by('taxband_id');
			$query = $this->db->get('taxbands');
			return $query->result_array();
		}

		function get_active_taxbands(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('taxband_id');
			$query = $this->db->get('taxbands');
			return $query->result_array();
		}

		function get_taxband_by_id($taxband_id){
		    $this->db->where('taxband_id',$taxband_id);
			$query = $this->db->get('taxbands');
			return $query->result_array();
		}

		function get_band1_top($taxband_id){
   		    $this->db->where('taxband_id',$taxband_id);
			$query = $this->db->get('taxbands')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['band1_top'];
				}
			}else {
				return '';
			}
			
		}

		function get_band2_top($taxband_id){
			$this->db->where('taxband_id',$taxband_id);
		 $query = $this->db->get('taxbands')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['band2_top'];
			 }
		 }else {
			 return '';
		 }
	 }

	function get_band3_top($taxband_id){
	$this->db->where('taxband_id',$taxband_id);
	 $query = $this->db->get('taxbands')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['band3_top'];
		 }
	 }else {
		 return '';
	 }
	 
 }

 function get_band4_top($taxband_id){
 $this->db->where('taxband_id',$taxband_id);
 $query = $this->db->get('taxbands')->result_array();
 if(count($query) > 0){
	 foreach ($query as $row) {
		 return $row['band4_top'];
	 }
 }else {
	 return '';
 }
 
}

	
}

