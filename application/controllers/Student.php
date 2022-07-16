<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class student extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->studentdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'All students';
		$this->load->view($this->session->studentdata('role').'/students',$data);			
    }

	

    function admins(){
		$this->check_session();
		$data['page_title']  = 'System Admins';
		$this->load->view($this->session->studentdata('role').'/admins',$data);			
    }

	function settings(){
		$this->check_session();
		$data['page_title']  = 'Settings';
		$this->load->view($this->session->studentdata('role').'/settings',$data);			
    }

    function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['email']= $this->input->post('email');
        $data['gender']   = $this->input->post('gender');
        $data['phone']    = $this->input->post('phone');
		$data['role']   = 'student';
		$data['address'] = $this->input->post('address');
		$data['password']  = md5($data['phone']);
		$data['nextofkeen']  = $this->input->post('nextofkeen');
		$data['group_id']  = $this->M_group->get_group_id_random();
		$data['bank_details']  = $this->input->post('bank_details');
		$data['date_joined']  = date('Y-m-d');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_student->get_student_by_id($update_id);
		foreach ($query as $row) {
		    $data['name']    = $row['name'];
		    $data['email']= $row['email'];
		    $data['gender']   = $row['gender'];
		    $data['phone']    = $row['phone'];
			$data['address'] = $row['address'];
			$data['password']  = $row['phone'];
			$data['role']  = $row['role'];
			$data['nextofkeen']  = $row['nextofkeen'];
			$data['group_id']  = $row['group_id'];
			$data['bank_details']  = $row['bank_details'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('student_id',$update_id);
			$this->db->update('students',$data);
		 }else{
			$this->db->insert('students',$data);
		}

		$this->close_single_group($data['group_id']);
		$this->session->set_flashdata('message','student saved successfully');
			if($update_id !=''):
    			redirect('student');
			else:
				redirect('student/read');
			endif;
	}

	function generate_first_waters(){
		 $joining_fee = $this->db->get('settings')->row()->joining_fee;
		 $days_limit  = $this->db->get('settings')->row()->days_limit;
 		 $pay_date  = $this->input->post('pay_date');
 		 //$pay_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$days_limit.' days'));
		 $end_of_circle  = $this->db->get('settings')->row()->end_of_circle;
		 $rejoin_date = date('Y-m-d', strtotime($pay_date. ' + '.$days_limit.' days'));
         $offsetu = $this->M_student->get_the_very_last_waterer();// get the very last waterer
	 	 $limit = $this->db->get('settings')->row()->max_downlines;
		 $student_id  = $this->input->post('student_id');
		 $offset = $this->M_student->get_the_last_receiver();
		 $comb = $this->M_student->get_comb();
		 $this->db->truncate('circles');


		 if($comb >=36){
			 foreach ($this->M_student->get_students_for_receivers(4,$offset) as $row) {
				$data['student_id'] = $row['student_id'];
				$data['amount'] = $joining_fee * ($limit - 1);
				$data['group_id'] = $this->M_student->get_group_id($row['student_id']);
				$data['pay_date'] = $pay_date;
				$data['next_date'] = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
				$this->db->insert('circles',$data);//insert into circle
			 }


    	 $this->add_gifters($pay_date);//generate waterers
    	 $this->add_rejoiners($joining_fee,$rejoin_date);//generate waterers
  		 $this->insert_into_past_waters();//insert into past waters

		}elseif($comb <=36 && $comb >=27){
			 foreach ($this->M_student->get_students_for_receivers(3,$offset) as $row) {
				$data['student_id'] = $row['student_id'];
				$data['amount'] = $joining_fee * ($limit - 1);
				$data['group_id'] = $this->M_student->get_group_id($row['student_id']);
				$data['pay_date'] = $pay_date;
				$data['next_date'] = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
				$this->db->insert('circles',$data);//insert into circle
			 }


    	 $this->add_gifters($pay_date);//generate waterers
    	 $this->add_rejoiners($joining_fee,$rejoin_date);//generate waterers
  		 $this->insert_into_past_waters();//insert into past waters

		}elseif($comb <=27 && $comb >=18){
			 foreach ($this->M_student->get_students_for_receivers(2,$offset) as $row) {
				$data['student_id'] = $row['student_id'];
				$data['amount'] = $joining_fee * ($limit - 1);
				$data['group_id'] = $this->M_student->get_group_id($row['student_id']);
				$data['pay_date'] = $pay_date;
				$data['next_date'] = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
				$this->db->insert('circles',$data);//insert into circle
			 }


    	 $this->add_gifters($pay_date);//generate waterers
    	 $this->add_rejoiners($joining_fee,$rejoin_date);//generate waterers
  		 $this->insert_into_past_waters();//insert into past waters

		}elseif($comb <=18 && $comb >=9){
			 foreach ($this->M_student->get_students_for_receivers(2,$offset) as $row) {
				$data['student_id'] = $row['student_id'];
				$data['amount'] = $joining_fee * ($limit - 1);
				$data['group_id'] = $this->M_student->get_group_id($row['student_id']);
				$data['pay_date'] = $pay_date;
				$data['next_date'] = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
				$this->db->insert('circles',$data);//insert into circle
			 }


    	 $this->add_gifters($pay_date);//generate waterers
    	 $this->add_rejoiners($joining_fee,$rejoin_date);//generate waterers
  		 $this->insert_into_past_waters();//insert into past waters

		}else{
		}


		 $this->session->set_flashdata('message','Receivers generated successfully');
		 redirect('student/next');
	}

	/*function add_gifters2($pay_date){
         $last_gifter = $this->M_student->get_last_gifter();
		foreach ($this->M_circle->get_circles() as $row){
			foreach ($this->M_student->get_comb()  as $value) {
				$data['student_id'] = $value['student_id'];
				$data['date'] = $pay_date;
				$data['water_id'] = $row['student_id'];
				$this->db->insert('waters',$data);

			  	$w['watered'] = 1;
			  	$w['watered_date'] = $pay_date;
			  	$this->db->where('student_id',$data['student_id']);
			  	$this->db->update('students',$w);	
			}
		}
	}*/

    function add_gifters($pay_date){
      	$last_gifter = $this->M_student->get_last_gifter();
		foreach ($this->M_circle->get_circles() as $row){
			foreach ($this->M_student->get_merged($row['student_id'])  as $value) {
				$data['student_id'] =  $value['student_id'];
				$data['date'] = $pay_date;
				$data['water_id'] = $row['student_id'];
				$this->db->insert('waters',$data);

			  	$w['watered'] = 1;
			  	$w['watered_date'] = $pay_date;
			  	$this->db->where('student_id',$data['student_id']);
			  	$this->db->update('students',$w);
			}
		}
		return;
	}

	function add_rejoiners($joining_fee,$rejoin_date){
		foreach ($this->M_circle->get_circles() as $row){
			$data['student_id'] = $row['student_id'];
			$data['rejoin_date'] = $rejoin_date;
			$data['amount']  = $joining_fee;
			$this->db->insert('rejoins',$data);
		}
	}


	function generate_first_waters1(){
		 $joining_fee = $this->db->get('settings')->row()->joining_fee;
		 $days_limit  = $this->db->get('settings')->row()->days_limit;
		 $end_of_circle  = $this->db->get('settings')->row()->end_of_circle;
		 $rejoin_date = date('Y-m-d', strtotime($pay_date. ' + '.$days_limit.' days'));
         $offsetu = $this->M_student->get_the_very_last_waterer();// get the very last waterer
	 	 $limit = $this->db->get('settings')->row()->max_downlines;
		 $student_id  = $this->input->post('student_id');
		 $pay_date  = $this->input->post('pay_date');

		 foreach ($student_id as $key => $value) {
			$data['student_id'] = $value;
			$data['amount'] = $joining_fee * ($limit - 1);
			$data['group_id'] = $this->M_student->get_group_id($value);
			$data['pay_date'] = $pay_date;
			$data['next_date'] = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
			$this->db->insert('circles',$data);//insert into circle
  			$this->rejoin($joining_fee,$rejoin_date);
		 }
    	 $this->add_gifters($pay_date);//generate waterers

		//$this->session->set_flashdata('message','First receivers generated successfully');
		redirect('student/next');
	}

	##### the function to run through crone job###########
	function generate_other_waters(){
		//$this->reset_students();
		$pay_date = $this->input->post('pay_date');

		$end_of_circle  = $this->db->get('settings')->row()->end_of_circle;
		$days_limit  = $this->db->get('settings')->row()->days_limit;//deserving receivers
	    $next_date = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
	    $rejoin_date = date('Y-m-d', strtotime($pay_date. ' + '.$days_limit.' days'));
	 	$joining_fee = $this->db->get('settings')->row()->joining_fee;
	 	$limit = $this->db->get('settings')->row()->max_downlines;
	    $count = $this->M_group->get_full_groups(); //total full groups
	    $offsetu = $this->M_student->get_the_very_last_waterer();// get the very last waterer
	    $un_students = $this->M_student->get_unreseted_students2();
	    $comb = $this->M_student->get_comb();

  		$this->insert_into_past_waters();//insert into past waters
  		$this->rejoin($joining_fee,$rejoin_date);
		//if($un_students >= $limit){
		foreach ($this->M_student->get_students_with_group() as $row) {
			$group_id = $row['group_id'];
			$offset =  $this->M_circle->get_last_water($group_id);

			$start_water = $this->M_student->get_start_water($group_id);
			$next_water =  $this->M_student->get_next_water($offset,$group_id);
			$water = $this->M_student->check_if_water_exists($group_id);//check if water exists of that category
			$students_per_group =  $this->M_student->get_students_count_by_group($group_id);//student count

			  if($water == 0){// check if water already exixts in circles table then run the statements
				if($next_water == 0){
				   $offset = $start_water; //reset the starting point
					//if ($total_circles !=0) {
						$this->db->truncate('circles');
					//}
				}

			$next_water =  $this->M_student->get_next_water($offset,$group_id);
			$prev_water =  $this->M_student->get_prev_water($offset,$group_id);

			if ($students_per_group >= $limit){

				$data['amount'] = $joining_fee * ($limit - 1);// how do we get this amount
				$data['student_id'] = $next_water;
				$data['group_id'] = $group_id;
				$data['pay_date'] = $pay_date;
				$data['next_date'] = $next_date;
				$this->db->insert('circles',$data);
				//$this->db->where('pay_date <=',date('Y-m-d'));
				$this->db->where('student_id',$prev_water);
				$this->db->delete('circles');
					   //}
					//}
				 }
			   }
			}
	    	$this->insert_into_waters($pay_date,$offsetu);//generate waterers

		  //else:endif;
		  $this->session->set_flashdata('message','Receivers generated successfully');
		  redirect('student/next');
	}

	function generate_waters(){
		$this->reset_students();

		$pay_dates = $this->M_circle->get_pay_dates();
		$today = date('Y-m-d');
		//if($pay_dates <= $today):
			$end_of_circle  = $this->db->get('settings')->row()->end_of_circle;
			$days_limit  = $this->db->get('settings')->row()->days_limit;//deserving receivers
			$pay_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$days_limit.' days'));
			$next_date = date('Y-m-d', strtotime($pay_date. ' + '.$end_of_circle.' days'));
			$rejoin_date = date('Y-m-d', strtotime($pay_date. ' + '.$days_limit.' days'));
	 	    $joining_fee = $this->db->get('settings')->row()->joining_fee;
	 	    $limit = $this->db->get('settings')->row()->max_downlines;
	        $total_circles = count($this->M_circle->get_circles());
	        $count = $this->M_group->get_full_groups(); //total full groups
	        $offsetu = $this->M_student->get_the_very_last_waterer();// get the very last waterer
			$un_students = $this->M_student->get_unreseted_students2();

	        /*if ($total_circles == 0) {// if there no waters
	              	foreach ($this->M_student->get_students_group() as $key) {
						$data['amount'] = $joining_fee * ($limit - 1);// how do we get this amount
						$data['student_id'] = $key['student_id'];
						$data['group_id'] = $key['group_id'];
						$data['pay_date'] = $pay_date;
			  			$data['next_date'] = $next_date;
						$this->db->insert('circles',$data);//insert into circle
					}
		        }else{*/
  			  $this->insert_into_past_waters();//insert into past waters
  			  $this->rejoin($joining_fee,$rejoin_date);
		   	  //if($un_students >= $limit){
				foreach ($this->M_student->get_students_with_group() as $row) {
					  $group_id = $row['group_id'];
					  $offset =  $this->M_circle->get_last_water($group_id);

			   		  $start_water = $this->M_student->get_start_water($group_id);
					  $next_water =  $this->M_student->get_next_water($offset,$group_id);
					  $water = $this->M_student->check_if_water_exists($group_id);//check if water exists of that category
					  $students_per_group =  $this->M_student->get_students_count_by_group($group_id);//student count

					  if($water == 0){// check if water already exixts in circles table then run the statements
						  if($next_water == 0){
							$offset = $start_water; //reset the starting point
								//if ($total_circles !=0) {
								    $this->db->truncate('circles');
								  //}
							}

					      $next_water =  $this->M_student->get_next_water($offset,$group_id);
					      $prev_water =  $this->M_student->get_prev_water($offset,$group_id);

					   if ($students_per_group >= $limit) {//
							  $data['amount'] = $joining_fee * ($limit - 1);// how do we get this amount
							  $data['student_id'] = $next_water;
							  $data['group_id'] = $group_id;
							  $data['pay_date'] = $pay_date;
				  			  $data['next_date'] = $next_date;
							  $this->db->insert('circles',$data);
							  //$this->rejoin($prev_water,$joining_fee,$next_water,$rejoin_date);//rejoin the netwrk
							  //$this->insert_into_past_waters($prev_water);//insert into past waters
							  //$this->db->where('pay_date <=',date('Y-m-d'));
							  $this->db->where('student_id',$prev_water);
							  $this->db->delete('circles');
							
					   //}
					//}
					 
					}

				  }
				}
	    		$this->insert_into_waters($pay_date,$offsetu);//generate waterers

	//else:endif;
		  $this->session->set_flashdata('message','Receivers generated successfully');
		  redirect('student/next');
	}

	function insert_into_past_waters(){
		foreach ($this->M_circle->get_circles() as $row){
			$data['pay_date'] = $row['pay_date'];
			$data['group_id'] = $row['group_id'];
			$data['amount'] = $row['amount'];
			$data['student_id'] = $row['student_id'];
			$this->db->insert('past_waters',$data);
		}
	}

	function insert_into_past_waters1($student_id){
		foreach ($this->M_circle->get_circles_by_student_id($student_id) as $row){
			$data['pay_date'] = $row['pay_date'];
			$data['group_id'] = $row['group_id'];
			$data['amount'] = $row['amount'];
			$data['student_id'] = $student_id;
			$this->db->insert('past_waters',$data);
		}
	}

	

	function insert_into_waters($pay_date){
		foreach ($this->M_circle->get_circles() as $row){
			foreach ($this->M_student->get_comb()  as $value) {
				$data['student_id'] = $value['student_id'];
				$data['date'] = $pay_date;
				$data['water_id'] = $row['student_id'];
				$this->db->insert('waters',$data);

			  	$w['watered'] = 1;
			  	$w['watered_date'] = $pay_date;
			  	$this->db->where('student_id',$data['student_id']);
			  	$this->db->update('students',$w);	
			}
		}
	}

	function insert_into_waters2($pay_date,$offsetu){
			$students = $this->M_student->get_unreseted_students2();
			$recycle = date('Y-m-d', strtotime($pay_date. ' - 7 days'));
			//$pay_date1 = date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days'));
			//$pay_date2 = date('Y-m-d', strtotime(date('Y-m-d'). ' - 21 days'));

			$waters = $this->M_student->get_past_waters_by_date($recycle);
			$balance = $students - count($waters);

		foreach ($this->M_circle->get_circles() as $row){
			if ($offsetu == 0){
		        foreach ($this->M_student->get_students_group000($row['student_id'])  as $value) {
				    $data['student_id'] = $value['student_id'];
				  	$data['date'] = $pay_date;
				  	$data['water_id'] = $row['student_id'];
				  	$this->db->insert('waters',$data);

				  	$w['watered'] = 1;
				  	$w['watered_date'] = $pay_date;
				  	$this->db->where('student_id',$data['student_id']);
				  	$this->db->update('students',$w);
				}

			}else{

				if($students >= 9) {
			
					foreach ($this->M_student->get_students_group00($row['student_id'],$offsetu,$pay_date)  as $value) {
					    $data['student_id'] = $value['student_id'];
					  	$data['date'] = $pay_date;
					  	$data['water_id'] = $row['student_id'];
					  	$this->db->insert('waters',$data);

					  	$w['watered'] = 1;
					  	$w['watered_date'] = $pay_date;
					  	$this->db->where('student_id',$data['student_id']);
					  	$this->db->update('students',$w);
					}
				}else{

					foreach ($this->M_student->get_old_waters()  as $value) {
					    $data['student_id'] = $value['student_id'];
					  	$data['date'] = $pay_date;
					  	$data['water_id'] = $row['student_id'];
					  	$this->db->insert('waters',$data);

					  	$w['watered'] = 1;
					  	$w['watered_date'] = $pay_date;
					  	$this->db->where('student_id',$data['student_id']);
					  	$this->db->update('students',$w);
					}

			  }

			}
			
		}		

	}

	function rejoin($joining_fee,$rejoin_date){
		foreach ($this->M_circle->get_circles() as $row){
			$data['student_id'] = $row['student_id'];
			$data['rejoin_date'] = $rejoin_date;
			$data['amount']  = $joining_fee;
			$this->db->insert('rejoins',$data);
		}
	}



	function rejoin1($student_id,$joining_fee,$next_water,$rejoin_date){
		$data['student_id'] = $student_id;
		$data['water'] = $next_water;
		$data['rejoin_date'] = $rejoin_date;
		$data['amount']  = $joining_fee;
		$this->db->insert('rejoins',$data);
	}

	function close_single_group($group_id){
		$students = $this->M_student->get_students_count_by_group($group_id);
		//$limit = $this->M_group->get_limit($group_id);
		$limit = $this->db->get('settings')->row()->max_downlines;
		$data['closed'] = 1;

		if($students == $limit){
			$this->db->where('group_id',$group_id);
			$this->db->update('groups',$data);
		}
	}

	function reset_students(){
		if($this->M_student->get_unreseted_students() < 9){
			$w['watered'] = 0;
			$this->db->where('student_id !=',null);
			$this->db->update('students',$w);
	 	 }
	}

	function read(){
		$students = count($this->M_student->get_students());
		$student_limit = $this->db->get('settings')->row()->student_limit;

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
	   
	   if($students <= $student_limit){
		 $data['page_title']  = 'Create student';
		 $this->load->view($this->session->studentdata('role').'/add_student',$data);
		 }else{
		 	$this->session->set_flashdata('message','studentship is full...you can not add other students');
			redirect('student');
		 }			
	}

	function save_settings(){
        $data['goal']= $this->input->post('goal');
        $data['address']  = $this->input->post('address');
        $data['phone']    = $this->input->post('phone');
        $data['email']  = $this->input->post('email');
		$data['student_limit'] = $this->input->post('student_limit');
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
		redirect('student/settings');
    }

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('student_id',$param);
        $this->db->update('students',$data);
    	$this->session->set_flashdata('message','student Deleted successfully');
		redirect('student');
	}

	function delete_waters(){
		$this->db->truncate('circles');
		$this->db->truncate('waters');
		$this->db->truncate('past_waters');
		$this->db->truncate('rejoins');
		$w['watered'] = 0;
		$this->db->where('student_id !=',null);
		$this->db->update('students',$w);
		$this->session->set_flashdata('message','Waters Deleted successfully');
		redirect('student/next');
	}

	function activate($param=''){
		$data['deleted'] = 0;
		$data['date_joined']  = date('Y-m-d');
		$this->db->where('student_id',$param);
        $this->db->update('students',$data);
    	$this->session->set_flashdata('message','student activated successfully');
		redirect('student');
	}
 
}