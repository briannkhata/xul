<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'All users';
		$this->load->view($this->session->userdata('role').'/users',$data);			
    }

    function filter_students1(){
		$this->check_session();
		$data['page_title']  = 'Filter Students |';
		$this->load->view($this->session->userdata('role').'/filter_students1',$data);			
    }

    function filter_students2(){
		$this->check_session();
		$data['page_title']  = 'Filter Students | ';
		$data['academic_year_id'] = $this->input->post('academic_year_id');
		$data['study_mode_id'] = $this->input->post('study_mode_id');
		$data['term_id'] = $this->input->post('term_id');
		$data['scholarship_type_id'] = $this->input->post('scholarship_type_id');
		$data['grade_level_id'] = $this->input->post('grade_level_id');
		$this->load->view($this->session->userdata('role').'/filter_students2',$data);			
    }

	function dashboard(){
		$this->check_session();
		$data['page_title']  = 'Dashboard';
		$this->load->view($this->session->userdata('role').'/dashboard',$data);			
    }

    function admins(){
		$this->check_session();
		$data['page_title']  = 'System Admins';
		$this->load->view($this->session->userdata('role').'/admins',$data);			
    }

    function staffs(){
		$this->check_session();
		$data['page_title']  = 'Staffs  |';
		$this->load->view($this->session->userdata('role').'/staffs',$data);			
    }

    function students(){
		$this->check_session();
		$data['page_title']  = 'Students';
		$this->load->view($this->session->userdata('role').'/students',$data);			
    }

	function settings(){
		$this->check_session();
		$data['page_title']  = 'Settings';
		$this->load->view($this->session->userdata('role').'/settings',$data);			
    }

    function graduates(){
		$this->check_session();
		$data['page_title']  = 'Filter Graduates';
		$this->load->view($this->session->userdata('role').'/graduates',$data);			
    }

    function graduates2(){
		$this->check_session();
		$data['academic_year_id'] = $this->input->post('academic_year_id');
		$data['page_title']  = 'Graduates | '.$this->M_academic_year->get_academic_year($data['academic_year_id']);
		$this->load->view($this->session->userdata('role').'/graduates2',$data);			
    }

   function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['gender']   = $this->input->post('gender');
        $data['phone']    = $this->input->post('phone');
        $data['email']= $this->input->post('email');
        $data['dob']    = $this->input->post('dob');
        $data['photo']    = $this->input->post('photo');
		$data['role'] = 'student';
		$data['password'] = md5($this->input->post('phone'));
  		$data['username']  = $this->input->post('email');
		$data['nationality']  = $this->input->post('nationality');
		$data['postal_address']  = $this->input->post('postal_address');
		$data['physical_address']  = $this->input->post('physical_address');
		$data['reg_no']  = $this->input->post('reg_no');
		$data['allergies']  = $this->input->post('allergies');
  		$data['academic_year_id']  = $this->input->post('academic_year_id');
  		$data['grade_level_id']  = $this->input->post('grade_level_id');
  		$data['section_id']  = $this->input->post('section_id');
  		$data['term_id']  = $this->input->post('term_id');
		$data['date_registered']  = date('Y-m-d');
		$data['date_added']  = date('Y-m-d h:m:s');
  		$data['previous_school']  = $this->input->post('previous_school');
  		$data['disability']  = $this->input->post('disability');
  		$data['generic']  = $this->input->post('generic');
  		$data['orphan']  = $this->input->post('orphan');
		$data['scholarship_type_id'] = $this->input->post('scholarship_type_id');
		return $data;
    }

    function get_data_from_post2(){
        $data['name']    = $this->input->post('name');
        $data['email']= $this->input->post('email');
        $data['gender']   = $this->input->post('gender');
        $data['phone']    = $this->input->post('phone');
		  $data['role']   = 'staff';
		  $data['physical_address'] = $this->input->post('physical_address');
  		  $data['postal_address'] = $this->input->post('postal_address');
  		  $data['password'] = md5($this->input->post('password'));
		  $data['username']  = $this->input->post('username');
		  $data['department_id']  = $this->input->post('department_id');
  		  $data['staff_type_id']  = $this->input->post('staff_type_id');
		  $data['date_added']  = date('Y-m-d h:m:i');
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
		$update_id = $this->input->post('update_id', TRUE);

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

			$this->db->where('user_id',$update_id);
		   $this->db->update('academic_students',$data2);

		 }else{
			$this->db->insert('users',$data);
			$data2['user_id'] = $this->db->insert_id();
 		   $this->db->insert('academic_students',$data2);
		}

	 $this->session->set_flashdata('message','Student saved successfully');
			if($update_id !=''):
    			redirect('user/students');
			else:
				redirect('user/read');
			endif;
	}

	function save2(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('users',$data);
		 }else{
			$this->db->insert('users',$data);
		}

		$this->session->set_flashdata('message','Staff data saved successfully');
			if($update_id !=''):
    			redirect('user/staffs');
			else:
				redirect('user/read2');
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
	   
		 $data['page_title']  = 'Create Student |';
		 $this->load->view($this->session->userdata('role').'/add_student',$data);
	}

	function read2(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post2();
		}
	   
		 $data['page_title']  = 'Create User |';
		 $this->load->view($this->session->userdata('role').'/add_user',$data);
	}

	function register(){
	   $this->check_session();
	   $data['page_title']  = 'Register Student';
	   $this->load->view($this->session->userdata('role').'/register',$data);
	}

	function register2(){
	   $this->check_session();
	   $data['page_title']  = 'Register Students';
	   $data['grade_level_id'] = $this->input->post('grade_level_id');
	   $data['academic_year_id'] = $this->input->post('academic_year_id');
	   $data['term_id'] = $this->input->post('term_id');
	   $this->load->view($this->session->userdata('role').'/register2',$data);
	}

	function promote(){
	   $this->check_session();
	   $data['page_title']  = 'Promote Students';
	   $this->load->view($this->session->userdata('role').'/promote',$data);
	}

	function promote2(){
	   $this->check_session();
	   $data['page_title']  = 'Promote Students';
	   $data['grade_level_id'] = $this->input->post('grade_level_id');
	   $data['academic_year_id'] = $this->input->post('academic_year_id');
  	   $data['to'] = $this->input->post('to');
	   $this->load->view($this->session->userdata('role').'/promote2',$data);
	}

	function promote3(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $academic_year_id = $this->input->post('academic_year_id');
  	      $to = $this->input->post('to');
	      $data = array(
	     		'user_id' =>$value, 
	     		'grade_level_id' =>$to, 
	     		'academic_year_id' =>$academic_year_id, 
	     		'section_id' =>$this->M_user->get_section_id($value), 
	     		'date_registered' =>date('Y-m-d-H-i-s')
   	   );

	    	$this->db->insert('academic_students',$data);
	    	$this->db->where('user_id',$value);
	    	$this->db->update('users',$data);
	    }

	    return;
	}

	function register3(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $grade_level_id = $this->input->post('grade_level_id');
	      $academic_year_id = $this->input->post('academic_year_id');
  	      $term_id = $this->input->post('term_id');
	      $data = array(
	     		'user_id' =>$value, 
	     		'grade_level_id' =>$grade_level_id, 
	     		'academic_year_id' =>$academic_year_id, 
	     		'section_id' =>$this->M_user->get_section_id($value), 
	     		'date_registered' =>date('Y-m-d-H-i-s'), 
   	    	'term_id' =>$term_id
   	   );

	    	$this->db->insert('academic_students',$data);
	    	$this->db->where('user_id',$value);
	    	$this->db->update('users',$data);
	    }

	    return;
	}

	function graduate(){
	   $this->check_session();
	   $data['page_title']  = 'Graduate Students';
	   $this->load->view($this->session->userdata('role').'/graduate',$data);
	}

	function graduate2(){
	   $this->check_session();
	   $data['page_title']  = 'Graduate Students';
	   $data['grade_level_id'] = $this->input->post('grade_level_id');
	   $data['academic_year_id'] = $this->input->post('academic_year_id');
   	   $data['date_graduated'] = $this->input->post('date_graduated');
   	   $data['graduated'] = 1;
	   $this->load->view($this->session->userdata('role').'/graduate2',$data);
	}

	function graduate3(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
	      $data = array(
	     		'user_id' =>$value, 
	     		'academic_year_id' =>$this->input->post('academic_year_id'), 
	     		'deleted' =>0, 
	     		'graduated' =>1, 
	     		'date_graduated' =>$this->input->post('date_graduated') 
   	        );

   	      $this->db->where('user_id',$value);
	      $this->db->update('users',$data);
	    }
	    return;
	}

	function save_settings(){
        $data['goal']= $this->input->post('goal');
        $data['address']  = $this->input->post('address');
        $data['phone']    = $this->input->post('phone');
        $data['email']  = $this->input->post('email');
		$data['user_limit'] = $this->input->post('user_limit');
		$data['days_limit']    = $this->input->post('days_limit');
		$data['min_downlines']  = $this->input->post('min_downlines');
		$data['max_downlines']  = $this->input->post('max_downlines');
		$data['joining_fee']  = $this->input->post('joining_fee');
		$data['currency']  = $this->input->post('currency');
		$data['end_of_circle']  = $this->input->post('end_of_circle');
		$data['total_number_of_waters']  = $this->input->post('total_number_of_waters');
		$id  = $this->input->post('id');
		$this->db->where('id',$id);
		$this->db->update('settings',$data);
		$this->session->set_flashdata('message','Settings Updated successfully');
		redirect('user/settings');
    }

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('user_id',$param);
        $this->db->update('users',$data);
    	$this->session->set_flashdata('message','user Deleted successfully');
		redirect('user');
	}

	function view_student($param=''){
	   $this->check_session();
	   $data['page_title']  = 'Student Profile';
	   $data['user_id']  = $param;
	   $this->load->view($this->session->userdata('role').'/view_student',$data);
	}

	function searchUser(){
	  $output = '';
	  $search = $this->input->post('search');
	  $grade_level_id = $this->input->post('grade_level_id');
	  $assesment_id = $this->input->post('assesment_id');
	  $query = $this->M_user->get_students_by_class22($search,$grade_level_id);
	  $count = 1;
	  if(count($query) > 0){

	   foreach($query as $row){

	   	$assesment_mark_id = $this->M_assesment->get_assesment_mark_id($assesment_id,$grade_level_id,$row['user_id']);
        $mark_obtained = $this->M_assesment->get_mark_obtained($assesment_id,$grade_level_id,$row['user_id']);

	   $output .= '
	      <tr>
	       <td>'.$count++.'</td>
	       <td>'.$row['name'].'</td>
	       <td>'.$row['reg_no'].'</td>
	       <td>'.ucfirst($row['gender']).'</td>
	       <td>
	     <input type="text" name="mark_obtained[]" value="'.$mark_obtained.'">       
	     <input type="hidden" name="assesment_mark_id[]" value="'.$assesment_mark_id.'">
	     <input type="hidden" name="user_id[]" value="'.$row['user_id'].'">
	     </td>
	      <td>
			<a href="" class="btn default btn-xs red-stripe" onclick="delete_mark('.$assesment_mark_id.')">
			<i class="fa fa-times-circle"></i></a>
		 	</td>
	      </tr>';
	   }
	  }
	  else
	  {
	   $output .= '<tr><td colspan="6"><center>No Data Found</center></td></tr>';
	  }
	    echo $output;
	 }	


	 function searchUser2(){
	  $output = '';
	  $search = $this->input->post('search');
	  $grade_level_id = $this->input->post('grade_level_id');
	  $examination_id = $this->input->post('examination_id');
	  $examination_paper_id = $this->input->post('examination_paper_id');
	  $query = $this->M_user->get_students_by_class22($search,$grade_level_id);
  
	  $count = 1;
	  if(count($query) > 0){

	   foreach($query as $row){
$examination_mark_id = $this->M_examination->get_examination_mark_id($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);
$mark_obtained = $this->M_examination->get_mark_obtained($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);
$points = $this->M_examination->get_points($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);

	   $output .= '
	      <tr>
	       <td>'.$count++.'</td>
	       <td>'.$row['name'].'</td>
	       <td>'.$row['reg_no'].'</td>
	       <td>'.ucfirst($row['gender']).'</td>
	       <td>
			 <input type="hidden" name="examination_mark_id[]" value="'.$examination_mark_id.'">
			 <input type="hidden" name="user_id[]" value="'.$row['user_id'].'">
			 <input type="hidden" name="points[]" value="'.$points.'">
	     	 <input type="text" name="mark_obtained[]" value="'.$mark_obtained.'">      
	     </td>
	      <td>
			<a href="" class="btn default btn-xs red-stripe" onclick="delete_mark('.$examination_mark_id.')">
			<i class="fa fa-times-circle"></i></a>
		 	</td>
	      </tr>';
	   }
	  }
	  else
	  {
	   $output .= '<tr><td colspan="6"><center>No Data Found</center></td></tr>';
	  }
	    echo $output;
	 }		



 
}