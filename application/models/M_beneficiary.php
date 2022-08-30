<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_beneficiary extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_beneficiaries(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('beneficiary_id');
			$query = $this->db->get('beneficiaries');
			return $query->result_array();
		}

		function get_beneficiary_by_id($beneficiary_id){
		    $this->db->where('beneficiary_id',$beneficiary_id);
			$query = $this->db->get('beneficiaries');
			return $query->result_array();
		}

		function get_beneficiary($beneficiary_id){
   		    $this->db->where('beneficiary_id',$beneficiary_id);
			$query = $this->db->get('beneficiaries')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['beneficiary'];
				}
			}else {
				return '';
			}
		}

		function get_deduct($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['deduct'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_damount($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['damount'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_month($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['month'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_year($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['year'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_total($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['total'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_dob($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['dob'];
				 }
			 }else {
				 return '';
			 }
		 }

		function get_schemetype_id($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['schemetype_id'];
				 }
			 }else {
				 return '';
			 }
		 }



		function get_membershiptype_id($beneficiary_id){
			$this->db->where('beneficiary_id',$beneficiary_id);
			 $query = $this->db->get('beneficiaries')->result_array();
			 if(count($query) > 0){
				 foreach ($query as $row) {
					 return $row['membershiptype_id'];
				 }
			 }else {
				 return '';
			 }
		 }

		

		function get_membershipnumber($beneficiary_id){
		$this->db->where('beneficiary_id',$beneficiary_id);
		 $query = $this->db->get('beneficiaries')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['membershipnumber'];
			 }
		 }else {
			 return '';
		 }
	 }

		function get_benstatus($beneficiary_id){
		$this->db->where('beneficiary_id',$beneficiary_id);
		 $query = $this->db->get('beneficiaries')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['benstatus'];
			 }
		 }else {
			 return '';
		 }
	 }

		function get_join_date($beneficiary_id){
		$this->db->where('beneficiary_id',$beneficiary_id);
		 $query = $this->db->get('beneficiaries')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['join_date'];
			 }
		 }else {
			 return '';
		 }
	 	}

		function get_user_id($beneficiary_id){
		 $this->db->where('beneficiary_id',$beneficiary_id);
		 $query = $this->db->get('beneficiaries')->result_array();
		 if(count($query) > 0){
			 foreach ($query as $row) {
				 return $row['user_id'];
			 }
		 }else {
			 return '';
		 }
	 }

	
}

