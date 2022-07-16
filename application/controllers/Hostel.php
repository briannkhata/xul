<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class hostel extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Hostels';
		$this->load->view($this->session->userdata('role').'/hostels',$data);			
    }

    function student_hostels(){
		$this->check_session();
		$data['page_title']  = 'Occupants';
		$this->load->view($this->session->userdata('role').'/student_hostels',$data);			
    }

    function filter_hostels(){
		$this->check_session();
		$data['page_title']  = 'Filter Hostels';
		$this->load->view($this->session->userdata('role').'/filter_hostels',$data);			
    }

    function filter_hostels2(){
		$this->check_session();
		$data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['hostel_id']    = $this->input->post('hostel_id');
   		$data['page_title']  = 'Occupants | '.$this->M_hostel->get_name($data['hostel_id']).' | '.$this->M_academic_year->get_academic_year($data['academic_year_id']);
		$this->load->view($this->session->userdata('role').'/filter_hostels2',$data);			
    }

    function assign_hostel(){
		$this->check_session();
		$data['page_title']  = 'Assign Hostel';
		$this->load->view($this->session->userdata('role').'/assign_hostel',$data);			
    }

    function assign_hostel2(){
        $data['user_id']    = $this->input->post('user_id');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
        $data['hostel_id']    = $this->input->post('hostel_id');
        $data['date_assigned']    = date('Y-m-d-H-i-s');
        $data['assigned_by']    = $this->session->userdata('user_id');
		$this->db->insert('student_hostels',$data);

		$capacity = $this->M_hostel->get_capacity($data['hostel_id']);
		$new['capacity'] = $capacity - 1;
		$this->db->where('hostel_id',$hostel_id);
		$this->db->update('hostels',$new); 
		$this->session->set_flashdata('message','Hostel assignment successfully');
		redirect('hostel/assign_hostel');
    }


    function bulk_assign_hostels(){
   		$academic_year_id = $this->M_academic_year->get_active_academic_year();
		$data = [];
        $db = $this->M_hostel->get_student_hostels3($academic_year_id);
            if(count($db) > 0)
              {
                foreach($db as $row)
                { $data[] = $row['user_id'];}
              }
        $this->db->select('*');
        if(!empty($data))
        $this->db->where_not_in('user_id',$data);
        $this->db->where('deleted',0);
        $this->db->where('role','student');
        $students = $this->db->get('users')->result_array();
       	   
        foreach($students as $row){
        	$hostel_id   = $this->M_hostel->get_available_hostel();
	    	$capacity = $this->M_hostel->get_capacity($hostel_id);
	    	if($capacity > 0){

	        	$data['user_id']    = $row['user_id'];
	            $data['academic_year_id']    = $academic_year_id;
	            $data['date_assigned']    = date('Y-m-d-H-i-s');
	            $data['assigned_by']    = $this->session->userdata('user_id');
				$data['hostel_id']    = $hostel_id;
		    	$this->db->insert('student_hostels',$data);
				$new['capacity'] = $capacity - 1;
				$this->db->where('hostel_id',$hostel_id);
				$this->db->update('hostels',$new); 
			}


       	 }
        return;
    }

    function reset_hostels(){
        $academic_year_id   = $this->input->post('academic_year_id');
        $data['capacity']  = 0;
        $this->db->where('academic_year_id',$academic_year_id);
        $this->db->update('hostels',$data);
		return;
    }

   
    function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['hostel_type_id']    = $this->input->post('hostel_type_id');
        $data['capacity']    = $this->input->post('capacity');
        $data['location']    = $this->input->post('location');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_hostel->get_hostel_by_id($update_id);
		foreach ($query as $row) {
		    $data['capacity']  = $row['capacity'];
		    $data['hostel_type_id']  = $row['hostel_type_id'];
		    $data['location']  = $row['location'];
		    $data['name']  = $row['name'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('hostel_id',$update_id);
			$this->db->update('hostels',$data);
		 }else{
			$this->db->insert('hostels',$data);
		}

		$this->session->set_flashdata('message','hostel saved successfully');
			if($update_id !=''):
    			redirect('hostel');
			else:
				redirect('hostel/read');
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

		$data['page_title']  = 'Create hostel';
		$this->load->view($this->session->userdata('role').'/add_hostel',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('hostel_id',$param);
        $this->db->update('hostels',$data);
    	$this->session->set_flashdata('message','Hostel deleted successfully');
		redirect('hostel');
	}

	function delete2($param='',$param1=''){
		//$data['deleted'] = 1;
		$this->db->where('hostel_id',$param);
		$this->db->where('user_id',$param1);
        $this->db->delete('student_hostels');
    	$this->session->set_flashdata('message','DELETE successfull');
		redirect('hostel/student_hostels');
	}

	
}