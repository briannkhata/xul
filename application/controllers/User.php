<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Staff List';
		$this->load->view($this->session->userdata('role').'/users',$data);			
    }

	function dashboard(){
		$this->check_session();
		$data['page_title']  = 'Dashboard';
		$this->load->view($this->session->userdata('role').'/dashboard',$data);			
    }

    

	function settings(){
		$this->check_session();
		$data['page_title']  = 'Settings';
		$this->load->view($this->session->userdata('role').'/settings',$data);			
    }

   function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['gender']   = $this->input->post('gender');
        $data['phone']    = $this->input->post('phone');
        $data['email']= $this->input->post('email');
        $data['dob']    = $this->input->post('dob');
        $data['startdate']    = $this->input->post('startdate');
        $data['role']    = $this->input->post('role');
		$data['password'] = md5($this->input->post('phone'));
  		$data['username']  = $this->input->post('email');
		$data['nationality']  = $this->input->post('nationality');
		$data['postal_address']  = $this->input->post('postal_address');
		$data['physical_address']  = $this->input->post('physical_address');
		$data['date_added']  = date('Y-m-d h:m:s');
  		$data['disability']  = $this->input->post('disability');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
		   $data['name']    = $row['name'];
           $data['gender']   = $row['gender'];
           $data['phone']    = $row['phone'];
           $data['email']= $row['email'];
           $data['photo']    = $row['photo'];
		   $data['role'] = $row['role'];
		   $data['nationality']  = $row['nationality'];
		   $data['postal_address']  = $row['postal_address'];
		   $data['physical_address']  = $row['physical_address'];
  		   $data['dob']  = $row['dob'];
		   $data['reg_no']  = $row['reg_no'];
		   $data['allergies']  = $row['allergies'];
  		   $data['guardian_details']  = $row['guardian_details'];
   		   $data['previous_school']  = $row['previous_school'];
   		   $data['study_mode_id']  = $row['study_mode_id'];
   		   $data['generic']  = $row['generic'];
   		   $data['disability']  = $row['disability'];
   		   $data['orphan']  = $row['orphan'];
   		   $data['scholarship_type_id']  = $row['scholarship_type_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id',TRUE);

		 if (!empty($_FILES['photo']['name'])):
		  move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/users/'.$_FILES['photo']['name']);
	      $data['photo']   = $_FILES['photo']['name'];
	    endif;

	     $data2['grade_level_id']  = $data['grade_level_id'];
		 $data2['academic_year_id']  = $data['academic_year_id'];
  		 $data2['section_id']  = $data['section_id'];
  		 $data2['term_id']  = $data['term_id'];
  		 $data2['date_registered']  = $data['date_registered'];

		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('users',$data);
		 }else{
			$this->db->insert('users',$data);
		}

	   $this->session->set_flashdata('message','User saved successfully');
			if($update_id !=''):
    			redirect('user/students');
			else:
				redirect('user/read');
			endif;
	}

	function save_settings(){
        $data['company']= $this->input->post('company');
        $data['phone1']    = $this->input->post('phone1');
		$data['phone2']    = $this->input->post('phone2');
		$data['phone3']    = $this->input->post('phone3');
        $data['email1']  = $this->input->post('email1');
		$data['email2']  = $this->input->post('email2');
		$data['email3']  = $this->input->post('email3');
		$data['physical_address']  = $this->input->post('physical_address');
		$data['contact_address']  = $this->input->post('contact_address');
		$id  = $this->input->post('id');
		$this->db->where('id',$id);
		$this->db->update('settings',$data);
		$this->session->set_flashdata('message','Settings Saved successfully');
		redirect('User/settings');
    }

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('user_id',$param);
        $this->db->update('users',$data);
    	$this->session->set_flashdata('message','User Deleted successfully');
		redirect('user');
	} 
}