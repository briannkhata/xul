<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class attendance extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function filter_staff_attendance(){
		$this->check_session();
		$data['page_title']  = 'Take staff Attendances |';
		$this->load->view($this->session->userdata('role').'/filter_staff_attendance',$data);			
    }

    function filter_staff_attendance1(){
		$this->check_session();
		$data['page_title']  = 'Filter Staff Attendances';
		$this->load->view($this->session->userdata('role').'/filter_staff_attendance1',$data);			
    }

    function filter_student_attendance(){
		$this->check_session();
		$data['page_title']  = 'Take student Attendances |';
		$this->load->view($this->session->userdata('role').'/filter_student_attendance',$data);			
    }

    function filter_student_attendance3(){
		$this->check_session();
		$data['page_title']  = 'Filter student Attendances (Termly) |';
		$this->load->view($this->session->userdata('role').'/filter_student_attendance3',$data);			
    }

    function student_attendances3(){
		$this->check_session();
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['term_id']    = $this->input->post('term_id');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
   		$data['page_title']  = 'Student Attendances ';
		$this->load->view($this->session->userdata('role').'/student_attendances3',$data);			
    }

    function filter_student_attendance1(){
		$this->check_session();
		$data['page_title']  = 'Filter student Attendances';
		$this->load->view($this->session->userdata('role').'/filter_student_attendance1',$data);			
    }

    function filter_student_attendance2(){
		$this->check_session();
        $data['attendance_date']    = $this->input->post('attendance_date');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['term_id']    = $this->input->post('term_id');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
        $data['section_id']    = $this->input->post('section_id');
   		$data['page_title']  = 'Student Attendances | '.date('d M Y',strtotime($data['attendance_date'])).' | '.$this->M_grade_level->get_grade_level($data['grade_level_id']);
		$this->load->view($this->session->userdata('role').'/filter_student_attendance2',$data);			
    }

    function staff_attendance(){
		$this->check_session();
		$data['page_title']  = 'Take staff Attendances |';
        $data['attendance_date']    = $this->input->post('attendance_date');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['term_id']    = $this->input->post('term_id');
		$this->load->view($this->session->userdata('role').'/staff_attendances',$data);			
    }

    function filter_staff_attendance2(){
		$this->check_session();
        $data['attendance_date']    = $this->input->post('attendance_date');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['term_id']    = $this->input->post('term_id');
   		$data['page_title']  = 'Staff Attendances | '.date('d M Y',strtotime($data['attendance_date']));
		$this->load->view($this->session->userdata('role').'/filter_staff_attendance2',$data);			
    }

    function student_attendance(){
		$this->check_session();
		$data['page_title']  = 'Student Attendances';
        $data['attendance_date']    = $this->input->post('attendance_date');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['term_id']    = $this->input->post('term_id');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
        $data['section_id']    = $this->input->post('section_id');
		$this->load->view($this->session->userdata('role').'/student_attendances',$data);			
    }

    function delete(){
		$this->db->where('attendance_id',$this->input->post('attendance_id'));
        $this->db->delete('attendances');
		return;
	}

	function save_staff_attendances(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $academic_year_id = $this->input->post('academic_year_id');
	     $term_id = $this->input->post('term_id');
   	     $attendance_id = $this->input->post('attendance_id');
	     $attendance_code_id = $this->input->post('attendance_code_id');
   	     $attendance_date = $this->input->post('attendance_date');
   	     $comment = $this->input->post('comment');
	     $data = array(
	     	'user_id' =>$value, 
	     	'academic_year_id' =>$academic_year_id,
	     	'attendance_date' =>$attendance_date,
	     	'term_id' =>$term_id, 
	     	'added_by' =>$this->session->userdata('user_id'), 
	     	'attendance_code_id' =>$attendance_code_id[$key], 
   	     	'attendance_id' =>$attendance_id[$key], 
	     	'comment' =>$comment[$key] 
	     );

	     if(!(empty($data['attendance_code_id']))){
	    	 $this->db->replace('attendances',$data);
	     }
	    }
	     return;
	}


	function save_student_attendances(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $academic_year_id = $this->input->post('academic_year_id');
         $grade_level_id = $this->input->post('grade_level_id');
         $section_id = $this->input->post('section_id');
	     $term_id = $this->input->post('term_id');
   	     $attendance_id = $this->input->post('attendance_id');
	     $attendance_code_id = $this->input->post('attendance_code_id');
   	     $attendance_date = $this->input->post('attendance_date');
   	     $comment = $this->input->post('comment');
	     $data = array(
	     	'user_id' =>$value, 
	     	'academic_year_id' =>$academic_year_id,
	        'grade_level_id' =>$grade_level_id,
	     	'section_id' =>$section_id,
	     	'attendance_date' =>$attendance_date,
	     	'term_id' =>$term_id, 
	     	'added_by' =>$this->session->userdata('user_id'), 
	     	'attendance_code_id' =>$attendance_code_id[$key], 
   	     	'attendance_id' =>$attendance_id[$key], 
	     	'comment' =>$comment[$key] 
	     );

	     if(!(empty($data['attendance_code_id']))){
	    	 $this->db->replace('attendances',$data);
	     }
	    }

	     return;



	}



}