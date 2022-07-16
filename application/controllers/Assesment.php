<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class assesment extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Assesments';
		$this->load->view($this->session->userdata('role').'/assesments',$data);			
    }

    function get_data_from_post(){
        $data['assesment_type_id']    = $this->input->post('assesment_type_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['subject_id']    = $this->input->post('subject_id');
        $data['grade_level_id']    = $this->input->post('grade_level_id');
        $data['term_id']    = $this->input->post('term_id');
        $data['total_marks']    = $this->input->post('total_marks');
        $data['date_assigned']    = $this->input->post('date_assigned');
        $data['due_date']    = $this->input->post('due_date');
        $data['title']    = $this->input->post('title');
        $data['added_by']    = $this->session->userdata('user_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_assesment->get_assesment_by_id($update_id);
		foreach ($query as $row) {
		    $data['assesment_type_id']    = $row['assesment_type_id'];
	        $data['subject_id']    = $row['subject_id'];
	        $data['grade_level_id']    = $row['grade_level_id'];
	        $data['term_id']    = $row['term_id'];
	        $data['total_marks']    = $row['total_marks'];
	        $data['date_assigned']    = $row['date_assigned'];
	        $data['due_date']    = $row['due_date'];
	        $data['added_by']    = $row['added_by'];
	        $data['title']    = $row['title'];
	        $data['academic_year_id']    = $row['academic_year_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('assesment_id',$update_id);
			$this->db->update('assesments',$data);
		 }else{
			$this->db->insert('assesments',$data);
		}

		$this->session->set_flashdata('message','Assesment saved successfully');
			if($update_id !=''):
    			redirect('assesment');
			else:
				redirect('assesment/read');
			endif;
	}


	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}

		$data['page_title']  = 'Create assesment';
		$this->load->view($this->session->userdata('role').'/add_assesment',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('assesment_id',$param);
        $this->db->update('assesments',$data);
    	$this->session->set_flashdata('message','Assesment deleted successfully');
		redirect('assesment');
	}

	function delete_mark(){
		$this->db->where('assesment_mark_id',$this->input->post('assesment_mark_id'));
        $this->db->delete('assesment_marks',$data);
		return;
	}

	function filter_assesment(){
		$this->check_session();
		$data['page_title']  = 'Choose Assesment ';
		$this->load->view($this->session->userdata('role').'/filter_assesment',$data);			
    }

    function assesment_marksheet(){
		$this->check_session();
		$data['page_title']  = 'Assesment Marksheet |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['assesment_id']  = $this->input->post('assesment_id');
		$data['assesment_id']  = $this->input->post('assesment_id');
		$this->load->view($this->session->userdata('role').'/assesment_marksheet',$data);			
    }

    function assesment_marksheet2($param='',$param1=''){
		$this->check_session();
		$data['page_title']  = 'Assesment Marksheet |';
		$data['grade_level_id']  = $param1;
		$data['assesment_id']  = $param;
		$this->load->view($this->session->userdata('role').'/assesment_marksheet',$data);			
    }

    function assesment_marksheet3(){
		$this->check_session();
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['assesment_id']  = $this->input->post('assesment_id');
		$this->load->view($this->session->userdata('role').'/assesment_marksheet3',$data);			
    }


    function save_marks(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $grade_level_id = $this->input->post('grade_level_id');
	     $assesment_mark_id = $this->input->post('assesment_mark_id');
   	     $assesment_id = $this->input->post('assesment_id');
	     $mark_obtained = $this->input->post('mark_obtained');
	     $data = array(
	     	'user_id' =>$value, 
	     	'grade_level_id' =>$grade_level_id, 
	     	'assesment_mark_id' =>$assesment_mark_id[$key], 
   	     	'assesment_id' =>$assesment_id, 
	     	'mark_obtained' =>$mark_obtained[$key] 
	     );

	     if(!(empty($data['mark_obtained']))){
	    	 $this->db->replace('assesment_marks',$data);
	     }
	    }

	     return;



	}


}