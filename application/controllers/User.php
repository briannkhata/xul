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
        $data['name'] = $this->input->post('name');
        $data['gender'] = $this->input->post('gender');
        $data['phone1'] = $this->input->post('phone1');
		$data['phone2'] = $this->input->post('phone2');
        $data['phone3'] = $this->input->post('phone3');
        $data['email1']= $this->input->post('email1');
		$data['email2']= $this->input->post('email2');
        $data['email3']= $this->input->post('email3');
        $data['dob']  = $this->input->post('dob');
        $data['startdate']  = $this->input->post('startdate');
        $data['role']  = 'staff';
		$data['password'] = '';
		$data['nationality']  = $this->input->post('nationality');
		$data['contactaddress']  = $this->input->post('contactaddress');
		$data['physicaladdress']  = $this->input->post('physicaladdress');
		$data['date_added']  = date('Y-m-d h:m:s');
  		$data['job_id']  = $this->input->post('job_id');
		$data['branch_id']  = $this->input->post('branch_id');
  		$data['grade_id']  = $this->input->post('grade_id');
  		$data['department_id']  = $this->input->post('department_id');
  		$data['national_id']  = $this->input->post('national_id');
	    $data['username']  = $data['national_id'] ;
  		$data['on_pension']  = $this->input->post('on_pension');
  		$data['bank_id']  = $this->input->post('bank_id');
  		$data['account_number']  = $this->input->post('account_number');
  		$data['account_type']  = $this->input->post('account_type');
  		$data['branch']  = $this->input->post('branch');
  		$data['scheme_id']  = $this->input->post('scheme_id');
  		$data['membership_number']  = $this->input->post('membership_number');
  		$data['membershiptype_id']  = $this->input->post('membershiptype_id');
  		$data['staff_no']  = $this->input->post('staff_no');
		$data['nextofkin']  = $this->input->post('nextofkin');
  		$data['staff_type_id']  = $this->input->post('staff_type_id');
		$data['marital_status']  = $this->input->post('marital_status');
	  	$data['staff_no']  = rand(10000,99999);
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
			$data['name'] = $row['name'];
			$data['gender'] = $row['gender'];
			$data['phone1'] = $row['phone1'];
			$data['phone2'] = $row['phone2'];
			$data['phone3'] = $row['phone3'];
			$data['email1']= $row['email1'];
			$data['email2']= $row['email2'];
			$data['email3']= $row['email3'];
			$data['dob']  = $row['dob'];
			$data['startdate']  = $row['startdate'];
			$data['role']  = 'staff';
			$data['username']  = $row['national_id'];
			$data['nationality']  = $row['nationality'];
			$data['contactaddress']  = $row['contactaddress'];
			$data['physicaladdress']  = $row['physicaladdress'];
			$data['job_id']  = $row['job_id'];
			$data['branch_id']  = $row['branch_id'];
			$data['grade_id']  = $row['grade_id'];
			$data['department_id']  = $row['department_id'];
			$data['national_id']  = $row['national_id'];
			$data['on_pension']  = $row['on_pension'];
			$data['bank_id'] = $row['bank_id'];
			$data['account_number'] = $row['account_number'];
			$data['account_type'] = $row['account_type'];
			$data['branch']  = $row['branch'];
			$data['scheme_id']  = $row['scheme_id'];
			$data['membership_number']  = $row['membership_number'];
			$data['membershiptype_id']  = $row['membershiptype_id'];
			$data['staff_no']  = $row['staff_no'];
			$data['nextofkin']  = $row['nextofkin'];
			$data['staff_type_id']  = $row['staff_type_id'];
			$data['marital_status']  = $row['marital_status'];
		}
		return $data;
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

		$data['page_title']  = 'Add Staff';
		$this->load->view($this->session->userdata('role').'/add_user',$data);			
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id',TRUE);

		 if (!empty($_FILES['photo']['name'])):
		  move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/users/'.$_FILES['photo']['name']);
	      $data['photo']   = $_FILES['photo']['name'];
	    endif;

		$data['leavedays']  = $this->M_grade->get_leavedays($data['grade_id']);

		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('users',$data);
		 }else{
			$this->db->insert('users',$data);
		}

	   $this->session->set_flashdata('message','Staff saved successfully');
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