<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_examination extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

	    
	function ngolo($examination_id,$grade_level_id,$subject_id,$user_id){
		$this->db->where('subject_id',$subject_id);
		//$this->db->where('subject_id !=',null);
		$this->db->where('user_id',$user_id);
		$this->db->where('grade_level_id',$grade_level_id);
		$this->db->where('examination_id',$examination_id);
		$query = $this->db->get('examination_marks')->result_array();
		foreach($query as $row){
			echo '<br>'.$row['mark_obtained'].' - '.$row['examination_paper_id'].'<br>';
		}
	}

	function get_avarage_marksRANDOM($examination_id,$grade_level_id){
		$this->db->where('examination_id',$examination_id);
   		$this->db->where('grade_level_id',$grade_level_id);
   		$this->db->order_by('rand()');			
   		$query = $this->db->get('examination_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['average_mark'];
				}
			}else {
		  return 0;
		}
	}

	function get_total_overalMARKS($subject_id){
		$this->db->select_sum('total_marks');
		$this->db->from('examination_papers');
		$this->db->where('subject_id',$subject_id);
		$this->db->group_by('subject_id');
		return $query = $this->db->get()->row()->total_marks;
	}

	function get_paper_markSUBJECT_ALL($user_id,$examination_id,$grade_level_id,$subject_id){
		$this->db->select_sum('mark_obtained');
		$this->db->from('examination_marks');
		$this->db->where('subject_id',$subject_id);
		$this->db->where('user_id',$user_id);
		$this->db->where('examination_id',$examination_id);
		$this->db->where('grade_level_id',$grade_level_id);
		//$this->db->group_by('subject_id');
		return $query = $this->db->get()->row()->mark_obtained;
	}

	function get_paper_markSUBJECT_COUNT_ALL($user_id,$examination_id,$grade_level_id,$subject_id){
		$this->db->from('examination_marks');
		$this->db->where('subject_id',$subject_id);
		$this->db->where('user_id',$user_id);
		$this->db->where('examination_id',$examination_id);
		$this->db->where('grade_level_id',$grade_level_id);
		//$this->db->group_by('subject_id');
		return $query = $this->db->get()->num_rows();
	}


	function get_paper_markSUBJECT($examination_paper_id,$user_id,$examination_id){
		$this->db->where('examination_paper_id',$examination_paper_id);
		$query = $this->db->get('examination_marks')->result_array();
		foreach($query as $row){
			return $row['mark_obtained'];
		}
	}

      	function get_examinations(){
		    $this->db->where('deleted',0);
		    $this->db->order_by('examination_id');
			$query = $this->db->get('examinations');
			return $query->result_array();
		}

		function get_examination_by_id($examination_id){
		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations');
			return $query->result_array();
		}

		function get_examination($examination_id){
   		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['examination'];
				}
			}else {
				return '';
			}
			
		}

		function get_examination_start_date($examination_id){
   		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['starts'];
				}
			}else {
				return '';
			}
			
		}

		function get_academic_year_id($examination_id){
   		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['academic_year_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_term_id($examination_id){
   		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['term_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_examination_end_date($examination_id){
   		    $this->db->where('examination_id',$examination_id);
			$query = $this->db->get('examinations')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['ends'];
				}
			}else {
				return '';
			}
			
		}


		###### exam marks#####

		function get_examination_best_six($examination_id,$grade_level_id,$user_id){
			$this->db->limit(6);
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->order_by('mark_obtained','DESC');
			$query = $this->db->get('examination_marks');
			return $query->result_array();
		}

		function get_examination_papers_marksINA($examination_id,$grade_level_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    //$this->db->group_by('subject_id');
			$query = $this->db->get('examination_marks');
			return $query->result_array();
		}

		function get_examination_papers_marksFINALGRADES($examination_id,$grade_level_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    //$this->db->where('user_id',$user_id);
   		    $this->db->order_by('mark_obtained','DESC');
   		    //$this->db->order_by('user_id');
   		    $this->db->group_by('user_id');
   		    $this->db->group_by('subject_id');
			return $query = $this->db->get('examination_marks')->result_array();
		}

		function get_examination_papers_marksSWATCH($examination_id,$grade_level_id,$subject_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('subject_id',$subject_id);
   		    $this->db->where('mark_obtained >',0);
   		    $this->db->order_by('mark_obtained','DESC');
		    //$this->db->order_by('user_id');
   		    $this->db->group_by('user_id');
   		    $this->db->group_by('subject_id');
			return $query = $this->db->get('examination_marks')->result_array();
		}

		function get_examination_papers_marksFINALGRADES2($examination_id,$grade_level_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('key_subject',0);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->order_by('mark_obtained','DESC');
   		    $this->db->order_by('user_id');
   		    $this->db->group_by('user_id');
   		    $this->db->group_by('subjects.subject_id');
   			$this->db->limit(5);
   		    $this->db->join('subjects','subjects.subject_id = final_grades.subject_id');
			return $query = $this->db->get('final_grades')->result_array();
		}

		function get_examination_papers_marksFINALGRADES3($examination_id,$grade_level_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('key_subject',1);
   		    $this->db->where('user_id',$user_id);
   		    $this->db->order_by('mark_obtained','DESC');
   		    $this->db->order_by('user_id');
   		    $this->db->group_by('user_id');
   		    $this->db->group_by('subjects.subject_id');
   			$this->db->limit(1);
   		    $this->db->join('subjects','subjects.subject_id = final_grades.subject_id');
			return $query = $this->db->get('final_grades')->result_array();
		}

		function get_examination_papers_marks($examination_id,$grade_level_id,$user_id){
   		  $this->db->where('examination_id',$examination_id);
   		  $this->db->where('grade_level_id',$grade_level_id);
   		  $this->db->where('user_id',$user_id);
   		  $this->db->order_by('mark_obtained','DESC');
   		  $this->db->group_by('subject_id');
			  $query = $this->db->get('final_grades2');
			  return $query->result_array();
		}

		function get_examination_papers_marks100($examination_id,$grade_level_id,$subject_id){
   		  $this->db->where('examination_id',$examination_id);
   		  $this->db->where('grade_level_id',$grade_level_id);
   		  $this->db->where('subject_id',$subject_id);
   		  $this->db->order_by('mark_obtained','desc');
   		  $this->db->group_by('user_id');
				$query = $this->db->get('final_grades');
				return $query->result_array();
		}

		function get_examination_papers_marks1000($examination_id,$grade_level_id,$examination_paper_id){
   		  $this->db->where('examination_id',$examination_id);
   		  $this->db->where('examination_marks.grade_level_id',$grade_level_id);
   		  $this->db->where('examination_marks.examination_paper_id',$examination_paper_id);
   		  $this->db->order_by('mark_obtained','desc');
				$query = $this->db->get('examination_marks');
				return $query->result_array();
		}

		function get_examination_papers_marks10000($examination_id,$grade_level_id){
   		  $this->db->where('examination_id',$examination_id);
   		  $this->db->where('examination_marks.grade_level_id',$grade_level_id);
   		  $this->db->order_by('examination_marks.subject_id');
   		  $this->db->group_by('subject_id');
				$query = $this->db->get('examination_marks');
				return $query->result_array();
		}

		function get_examination_papers_marks100000($examination_id,$grade_level_id,$user_id){
   		  $this->db->where('examination_id',$examination_id);
   		  $this->db->where('examination_marks.grade_level_id',$grade_level_id);
   		  $this->db->where('examination_marks.user_id',$user_id);
   		  $this->db->order_by('examination_marks.subject_id');
   		  $this->db->group_by('subject_id');
				$query = $this->db->get('examination_marks');
				return $query->result_array();
		}

		function get_examination_papers_marks2($examination_id,$grade_level_id,$user_id){
			  $data = [];
     		$db = $this->db->select('subject_id')->from('final_grades2')
           	 ->where('grade_level_id',$grade_level_id)
           	 ->where('examination_id',$examination_id)
           	 ->where('user_id',$user_id)
           	 ->get()->result_array();
             if(count($db) > 0)
                {
                  foreach($db as $row)
                  { $data[] = $row['subject_id']; }
                }

            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('subject_id',$data);
            $this->db->where('grade_level_id',$grade_level_id);
         	$this->db->where('examination_id',$examination_id);
       	    $this->db->where('user_id',$user_id);
            return $query = $this->db->get('final_grades')->result_array();
		}

		function get_examination_papers_marksCHECK($examination_id,$grade_level_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->order_by('mark_obtained','DESC');
   		    //$this->db->group_by('subject_id');
			$query = $this->db->get('final_grades2');
			return $query->result_array();
			
		}

		function get_examination_mark_id($examination_id,$grade_level_id,$examination_paper_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('examination_paper_id',$examination_paper_id);
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('examination_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['examination_mark_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_mark_obtained($examination_id,$grade_level_id,$examination_paper_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('examination_paper_id',$examination_paper_id);
   		    $this->db->where('user_id',$user_id);			
   		    $query = $this->db->get('examination_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['mark_obtained'];
				}
			}else {
				return '';
			}
			
		}

		function get_average_mark($examination_id,$grade_level_id,$examination_paper_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('examination_paper_id',$examination_paper_id);
   		    $this->db->where('user_id',$user_id);			
   		    $query = $this->db->get('examination_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['average_mark'];
				}
			}else {
				return 0;
			}
			
		}

		function get_points($examination_id,$grade_level_id,$examination_paper_id,$user_id){
   		    $this->db->where('examination_id',$examination_id);
   		    $this->db->where('grade_level_id',$grade_level_id);
   		    $this->db->where('examination_paper_id',$examination_paper_id);
   		    $this->db->where('user_id',$user_id);			
   		    $query = $this->db->get('examination_marks')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['points'];
				}
			}else {
				return 0;
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

	function get_final_grade_remark($grade_group_id, $mark_obtained){
   		$this->db->where('grade_group_id',$grade_group_id);
   		$query = $this->db->get('grade_remarks')->result_array();
		if($query):
			foreach($query as $row)
			{
				if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				{
					return $row['grade_remark'];
				}
			}
		else:
			return '';
		endif;
	}

	function get_final_grade_comment($grade_group_id, $final_grade){
   		$this->db->where('grade_group_id',$grade_group_id);
   		$query = $this->db->get('grade_remarks')->result_array();
		if($query):
			foreach($query as $row)
			{
				if($final_grade >= $row['mark_from'] && $final_grade <= $row['mark_upto'])
				{
					return $row['grade_comment'];
				}
			}
		else:
			return '';
		endif;
	}

	function get_subject_grade($grade_level_id,$examination_id,$user_id,$examination_paper_id){
  		$this->db->where('grade_level_id',$grade_level_id);
  		$this->db->where('examination_id',$examination_id);
  		$this->db->where('user_id',$user_id);
  		$this->db->where('examination_paper_id',$examination_paper_id);
		$query	=	$this->db->get('examination_marks' );
		$grades	=	$query->result_array();
		if($query):
		foreach($grades as $row)
		{
			return $row['points'];
		}
		else:
			return 9;
		endif;
	}
		
	function get_grade_remark($grade_group_id,$mark_obtained){
  		$this->db->where('grade_group_id',$grade_group_id);
		$query	=	$this->db->get('grade_points' );
		$grades	=	$query->result_array();
		foreach($grades as $row)
		{
			if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				return $row['comment'];
		}
	}

	function get_best_six_marks($examination_id,$grade_level_id,$user_id){
		$query = $this->db->query('SELECT user_id, grade_level_id,examination_id,SUM(mark_obtained) AS total_marks,COUNT(*) AS TotalSubject FROM (SELECT user_id, grade_level_id, examination_id,mark_obtained,ROW_NUMBER()OVER(PARTITION BY user_id,grade_level_id,examination_id ORDER BY mark_obtained DESC) AS best_subjects FROM final_grades) t1 WHERE  
			  user_id = "'.$user_id.'" 
			  AND examination_id = "'.$examination_id.'" 
			  AND grade_level_id = "'.$grade_level_id.'" AND best_subjects <= 6
			  GROUP BY user_id, grade_level_id,examination_id HAVING COUNT(*) = 6');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['total_marks'];
		}
	
	}

	function get_overal_rank_marks($examination_id,$grade_level_id,$user_id){
		$query = $this->db->query('SELECT * FROM
					(
					SELECT *,DENSE_RANK() OVER (ORDER BY total_marks DESC) AS ranko FROM (
					SELECT user_id, grade_level_id,examination_id,SUM(mark_obtained) AS total_marks,COUNT(*) AS subject_count FROM (
					SELECT user_id, grade_level_id, examination_id,mark_obtained,ROW_NUMBER()OVER(PARTITION BY user_id,grade_level_id,examination_id ORDER BY mark_obtained DESC) AS BestSubjectRank FROM final_grades
					) t1
					WHERE BestSubjectRank <= 6
					GROUP BY user_id, grade_level_id,examination_id
					HAVING COUNT(*) = 6
					) t2) t3
					WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND grade_level_id = 
					"'.$grade_level_id.'"
					ORDER BY total_marks DESC');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['ranko'];
		}
	
	}

	function get_overal_rank_points($examination_id,$grade_level_id,$user_id){
		$query = $this->db->query('SELECT * FROM
					(
					SELECT *,DENSE_RANK() OVER (ORDER BY total_points ASC) AS ranko FROM (
					SELECT user_id, grade_level_id,examination_id,SUM(points) AS total_points,COUNT(*) AS subject_count FROM (
					SELECT user_id, grade_level_id, examination_id,points,ROW_NUMBER()OVER(PARTITION BY user_id,grade_level_id,examination_id ORDER BY points ASC) AS BestSubjectRank FROM final_grades
					) t1
					WHERE BestSubjectRank <= 6
					GROUP BY user_id, grade_level_id,examination_id
					HAVING COUNT(*) = 6
					) t2) t3
					WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND grade_level_id = 
					"'.$grade_level_id.'"
					ORDER BY total_points ASC');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['ranko'];
		}
	
	}

	function get_best_six_points($examination_id,$grade_level_id,$user_id){
		$query = $this->db->query('SELECT user_id,grade_level_id,examination_id,SUM(points) AS total_points,COUNT(*) AS TotalSubject FROM (SELECT user_id,grade_level_id, examination_id,points,ROW_NUMBER()OVER(PARTITION BY user_id,grade_level_id,examination_id ORDER BY points ASC) AS best_subjects FROM final_grades) t1 WHERE  
			  user_id = "'.$user_id.'" 
			  AND examination_id = "'.$examination_id.'" 
			  AND grade_level_id = "'.$grade_level_id.'" AND best_subjects <= 6
			  GROUP BY user_id,examination_id,grade_level_id HAVING COUNT(*) = 6');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['total_points'];
		}
	
		}


	function get_subject_rankMARKSHEET($user_id,$examination_id,$examination_paper_id,$grade_level_id){
		$query = $this->db->query('SELECT user_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(mark_obtained ORDER BY mark_obtained DESC ) FROM examination_marks WHERE grade_level_id = "'.$grade_level_id.'" AND examination_id = "'.$examination_id.'" AND examination_paper_id = "'.$examination_paper_id.'")) AS ranko FROM examination_marks WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND examination_paper_id = "'.$examination_paper_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		    return $row['ranko'];
		}
	}

	function get_subject_rankMARKSHEET2($user_id,$examination_id,$subject_id,$grade_level_id){
		$query = $this->db->query('SELECT user_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(mark_obtained ORDER BY mark_obtained DESC ) FROM final_grades WHERE grade_level_id = "'.$grade_level_id.'" AND examination_id = "'.$examination_id.'" AND subject_id = "'.$subject_id.'")) AS ranko FROM final_grades WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND subject_id = "'.$subject_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		    return $row['ranko'];
		}
	}
		
	function get_subject_rankREPORTCARD($user_id,$examination_id,$subject_id,$grade_level_id){

		$query = $this->db->query('SELECT user_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT( mark_obtained ORDER BY mark_obtained DESC ) FROM final_grades WHERE grade_level_id = "'.$grade_level_id.'" AND examination_id = "'.$examination_id.'" AND subject_id = "'.$subject_id.'")) AS ranko FROM final_grades WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND subject_id = "'.$subject_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        return $row['ranko'];
			}


		/*
		with gaps
		$query = $this->db->query('SELECT user_id,mark_obtained, FIND_IN_SET(mark_obtained,(SELECT GROUP_CONCAT(mark_obtained ORDER BY mark_obtained DESC ) FROM examination_marks WHERE grade_level_id = "'.$grade_level_id.'" AND examination_id = "'.$examination_id.'" AND examination_paper_id = "'.$examination_paper_id.'")) AS rank FROM examination_marks WHERE user_id = "'.$user_id.'" AND examination_id = "'.$examination_id.'" AND examination_paper_id = "'.$examination_paper_id.'" AND grade_level_id = "'.$grade_level_id.'"');
		$grades	=	$query->result_array();
		foreach($grades as $row) {
		        echo $row['rank'];
		
		}*/



	}

	function get_sum_by_category($subject_id,$grade_level_id,$user_id,$examination_id){
		$query = $this->db->query('SELECT subject_id,
			grade_level_id,
			examination_id,user_id,SUM(mark_obtained) AS mark, 
			FROM examination_marks 
			INNER JOIN examination_papers ON
			examination_marks.examination_paper_id = examination_papers.examination_paper_id
			WHERE 
			grade_level_id ="'.$grade_level_id.'" AND 
			examination_id ="'.$examination_id.'" AND 
			subject_id ="'.$subject_id.'" AND 
			user_id="'.$user_id.'"');
     	$grades	=	$query->result_array();
		foreach($grades as $row) {
		    return $row['mark'];
		}
		
	}


	/*function get_overal_rank_by_marks($user_id,$grade_level_id,$examination_id){
	
		$query = $this->db->query('SELECT user_id,rank,total_score 
			         FROM (SELECT *,IF(@marks=(@marks:=total_score), @auto, @auto:=@auto + 1) AS rank
			         FROM(SELECT * FROM 
			          (SELECT user_id,SUM(mark_obtained) AS total_score,examination_id,grade_level_id 
			         FROM examination_marks, (SELECT @auto:=0, @marks:=0) AS init WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" GROUP BY user_id) sub ORDER BY total_score DESC) t) AS result WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'"');
		$grades	= $query->result_array();
		foreach($grades as $row) {
		    echo $row['rank'];
		}
		
	}

	function get_six_markz($user_id,$grade_level_id,$examination_id){
	
		/*$query = $this->db->query('SELECT user_id,rank,total_score 
			         FROM (SELECT *,IF(@marks=(@marks:=total_score), @auto, @auto:=@auto + 1) AS rank
			         FROM(SELECT * FROM 
			          (SELECT user_id,SUM(mark_obtained) AS total_score,examination_id,grade_level_id 
			         FROM examination_marks, (SELECT @auto:=0, @marks:=0) AS init WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" GROUP BY user_id) sub ORDER BY total_score DESC) t) AS result WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'"');*/

		/*$query = $this->db->query('SELECT user_id,SUM(mark_obtained) AS total_score
			         FROM  (SELECT * FROM examination_marks WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'" ORDER BY mark_obtained DESC limit 6) t');

			         $query = $this->db->query('SELECT user_id, grade_level_id,ro, examination_id, total
			         	FROM( SELECT user_id, grade_level_id, examination_id,ro, SUM(mark_obtained) AS total
FROM(SELECT user_id, grade_level_id, examination_id, SUM(mark_obtained) as mark_obtained, RANK() 
OVER ( PARTITION BY user_id,grade_level_id ORDER BY mark_obtained DESC) AS ro 
 FROM examination_marks  
)temp WHERE ro<=6 AND grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'" GROUP BY user_id, grade_level_id, examination_id 
) ta');
		$grades	= $query->result_array();
		foreach($grades as $row) {
		    echo $row['total'].' '.$row['ro'];
		}
		
	}

	function get_overal_rank_by_points($user_id,$grade_level_id,$examination_id){
	
		$query = $this->db->query('SELECT user_id,rank,total_points 
			         FROM (SELECT *,IF(@marks=(@marks:=total_points), @auto, @auto:=@auto + 1) AS rank
			         FROM(SELECT * FROM 
			          (SELECT user_id,SUM(points) AS total_points,examination_id,grade_level_id 
			         FROM examination_marks, (SELECT @auto:=0, @marks:=0) AS init WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" GROUP BY user_id) sub ORDER BY total_points ASC) t) AS result WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'"');
		$grades	= $query->result_array();
		foreach($grades as $row) {
		    echo $row['rank'];
		}
		
	}*/

	/*function get_overal_pointso($user_id,$grade_level_id,$examination_id){
	
		$query = $this->db->query('SELECT user_id,rank,total_points 
			         FROM (SELECT *,IF(@marks=(@marks:=total_points), @auto, @auto:=@auto + 1) AS rank
			         FROM(SELECT * FROM 
			          (SELECT user_id,SUM(points) AS total_points,examination_id,grade_level_id 
			         FROM examination_marks, (SELECT @auto:=0, @marks:=0) AS init WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" GROUP BY user_id) sub ORDER BY total_points ASC) t) AS result WHERE grade_level_id ="'.$grade_level_id.'" AND examination_id ="'.$examination_id.'" AND user_id="'.$user_id.'"');
		$grades	= $query->result_array();
		foreach($grades as $row) {
		    echo $row['rank'];
		}
		
	}*/
}

