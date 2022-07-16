<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_users(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_parents(){
		    $this->db->where('deleted',0);
		    $this->db->where('role','parent');
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_scholarships(){
		    $this->db->where('scholarship_type_id !=',null);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_scholarships2($scholarship_type_id){
   		    $this->db->where('deleted',0);
		    $this->db->where('scholarship_type_id',$scholarship_type_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_students_by_class($grade_level_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('graduated',0);
   		    $this->db->where('grade_level_id',$grade_level_id);
		    $this->db->order_by('user_id','desc');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_students_by_mode_of_study($academic_year_id,$study_mode_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('graduated',0);
   		    $this->db->where('study_mode_id',$study_mode_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
		    $this->db->order_by('user_id','desc');
			$query = $this->db->get('users');
			return $query->result_array();
		}


		function get_students_by_class22($search,$grade_level_id){
   		    $this->db->like('name',$search);
		    $this->db->where('deleted',0);
		    $this->db->where('graduated',0);
   		    $this->db->where('role','student');
   		    $this->db->where('grade_level_id',$grade_level_id);
		    //$this->db->order_by('user_id','desc');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_graduates($academic_year_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('graduated',1);
   		    $this->db->where('academic_year_id',$academic_year_id);
		    $this->db->order_by('user_id','desc');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_students_by_class2($grade_level_id,$academic_year_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('academic_year_id',$academic_year_id);
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_female_students($academic_year_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('gender','female');
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_male_students($academic_year_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('gender','male');
   		    $this->db->where('academic_year_id',$academic_year_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_students(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_active_students_by_class_exam($grade_level_id,$user_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','student');
   		    $this->db->where('academic_students.grade_level_id',$grade_level_id);
   		    $this->db->or_where('academic_students.user_id',$user_id);
   			$this->db->order_by('user_id');
   			$this->db->join('academic_students','academic_students.user_id.users.user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_staffs(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','staff');
		    $this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_users_by_role($role){
		    $this->db->where('deleted',0);
   		    $this->db->where('role',$role);
		    $this->db->order_by('user_id');
		    $this->db->limit(10);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user_by_id($user_id){
		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_user($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_gender($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['gender'];
				}
			}else {
				return '';
			}
		}

		function get_reg_no($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['reg_no'];
				}
			}else {
				return '';
			}
			
		}

		function get_phone($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['phone'];
				}
			}else {
				return '';
			}
		}

		function get_email($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['email'];
				}
			}else {
				return '';
			}
		}

		function get_role($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['role'];
				}
			}else {
				return '';
			}
		}

		function get_section_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['section_id'];
				}
			}else {
				return '';
			}
		}

		function get_grade_level_id($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level_id'];
				}
			}else {
				return '';
			}
		}

		function get_postal_address($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('users')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['postal_address'];
				}
			}else {
				return '';
			}
		}
}

