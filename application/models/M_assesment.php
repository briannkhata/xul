<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_assesment extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_assesments(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('assesment_id','DESC');
			$query = $this->db->get('assesments');
			return $query->result_array();
		}

		function get_assesment_marks($grade_level_id,$assesment_id){
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('assesment_id',$assesment_id);
		    $this->db->order_by('mark_obtained','DESC');
			$query = $this->db->get('assesment_marks');
			return $query->result_array();
		}

		function get_assesment_by_id($assesment_id){
		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments');
			return $query->result_array();
		}

		function get_title($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['title'];
				}
			}else {
				return '';
			}
			
		}

		function get_due_date($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return date('d F-Y',strtotime($row['due_date']));
				}
			}else {
				return '';
			}
			
		}

		function get_academic_calendar_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_calendar_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_assigned($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return date('d F-Y',strtotime($row['date_assigned']));
				}
			}else {
				return '';
			}
			
		}

		function get_subject_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['subject_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_grade_level_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['grade_level_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_added_by($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['added_by'];
				}
			}else {
				return '';
			}
			
		}

		function get_total_marks($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['total_marks'];
				}
			}else {
				return '';
			}
			
		}

		function get_assesment_type_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['assesment_type_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_id($assesment_id){
   		    $this->db->where('assesment_id',$assesment_id);
			$query = $this->db->get('assesments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_assesment_mark_id($assesment_id,$grade_level_id,$user_id){
   		    $this->db->where('assesment_id',$assesment_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('assesment_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['assesment_mark_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_obtained($assesment_id,$grade_level_id,$user_id){
   		    $this->db->where('assesment_id',$assesment_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('user_id',$user_id);			
   		    $query = $this->db->get('assesment_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_obtained'];
				}
			}else {
				return '';
			}
			
		}

	function get_grade_point($grade_group_id, $mark_obtained){
   		$this->db->where('grade_group_id',$grade_group_id);
   		$query = $this->db->get('grade_points')->result_array();
		if($query):
			foreach($query as $row)
			{
				if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				{
					
					return $row['grade_point'];
				}
			}
		else:
			return '';
		endif;
	}
		
	function get_grade_remark($mark_obtained){
		$query	=	$this->db->get('grade_points' );
		$grades	=	$query->result_array();
		foreach($grades as $row)
		{
			if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				return $row['comment'];
		}
	}
	

	function get_rank($user_id,$assesment_id,$grade_level_id){
		$query = $this->db->query('SELECT user_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(mark_obtained ORDER BY mark_obtained DESC ) FROM assesment_marks WHERE assesment_id = "'.$assesment_id.'" AND grade_level_id = "'.$grade_level_id.'")) AS ranko FROM assesment_marks WHERE user_id = "'.$user_id.'" AND assesment_id = "'.$assesment_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		    return $row['ranko'];
		}
	}

	function get_rankkkk($user_id,$assesment_id,$grade_level_id){
		/*$highest_marks = $this->db->get_where('assesment_marks',array('user_id' =>$user_id))->result_array();
		rsort($highest_marks);
		foreach($highest_marks as $row) {
		        echo $row['mark_obtained'];
		}*/

		/*$query = $this->db->query('SELECT COUNT(mark_obtained) AS rank, user_id FROM assesment_marks WHERE mark_obtained <= (SELECT mark_obtained FROM assesment_marks WHERE user_id = "'.$user_id.'") ORDER BY rank ASC' );
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        echo $row['rank'];
		}*/


		$query = $this->db->query('SELECT DISTINCT user_id, assesment_id,grade_level_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(DISTINCT mark_obtained ORDER BY mark_obtained DESC ) FROM assesment_marks)) AS ranko FROM assesment_marks WHERE user_id = "'.$user_id.'" AND assesment_id = "'.$assesment_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['ranko'];
		}


		/*
		with gaps
		$query = $this->db->query('SELECT user_id, mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(mark_obtained ORDER BY mark_obtained DESC ) FROM assesment_marks)) AS rank FROM assesment_marks WHERE user_id = "'.$user_id.'" AND assesment_id = "'.$assesment_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        echo $row['rank'];
		}*/


		/*$query = $this->db->query('SELECT 1 + COUNT(*) AS rank FROM assesment_marks WHERE mark_obtained > (SELECT mark_obtained FROM assesment_marks) WHERE user_id = "'.$user_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        echo $row['rank'];
		}*/

	}


	
}

