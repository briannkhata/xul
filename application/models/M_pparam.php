<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pparam extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_params(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('pparam_id');
			$query = $this->db->get('pparams');
			return $query->result_array();
		}

		function get_param_by_id($pparam_id){
		    $this->db->where('pparam_id',$pparam_id);
			$query = $this->db->get('pparams');
			return $query->result_array();
		}

		function get_title($pparam_id){
   		    $this->db->where('pparam_id',$pparam_id);
			$query = $this->db->get('pparams')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['title'];
				}
			}else {
				return '';
			}
		}

		function get_broker($pparam_id){
		$this->db->where('pparam_id',$pparam_id);
		 $query = $this->db->get('pparams')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['broker'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_vat($pparam_id){
			$this->db->where('pparam_id',$pparam_id);
		 $query = $this->db->get('pparams')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['vat'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_company($pparam_id){
			$this->db->where('pparam_id',$pparam_id);
		 $query = $this->db->get('pparams')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['company'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	 function get_active($pparam_id){
		$this->db->where('pparam_id',$pparam_id);
	 $query = $this->db->get('pparams')->result_array();
	 if(count($query) > 0){
		 foreach ($query as $row) {
			 return $row['active'];
		 }
	 }else {
		 return '';
	 }
	 
 }

		function get_staff($pparam_id){
			$this->db->where('pparam_id',$pparam_id);
		 $query = $this->db->get('pparams')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['staff'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

		function get_admin_fee($pparam_id){
		$this->db->where('pparam_id',$pparam_id);
		 $query = $this->db->get('pparams')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['admin_fee'];
			 }
		 }else {
			 return '';
		 }
		 
	 }

	
}

