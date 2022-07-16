<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class examination extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Examination Sessions';
		$this->load->view($this->session->userdata('role').'/examinations',$data);			
    }

   
    function get_data_from_post(){
        $data['examination']    = $this->input->post('examination');
        $data['starts']= $this->input->post('starts');
        $data['ends']   = $this->input->post('ends');
        $data['academic_year_id']    = $this->input->post('academic_year_id');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_examination->get_examination_by_id($update_id);
		foreach ($query as $row) {
		    $data['examination']  = $row['examination'];
  		    $data['starts']= $row['starts'];
		    $data['ends'] = $row['ends'];
		    $data['academic_year_id'] = $row['academic_year_id'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('examination_id',$update_id);
			$this->db->update('examinations',$data);
		 }else{
			$this->db->insert('examinations',$data);
		}

		$this->session->set_flashdata('message','Examinations Session saved successfully');
			if($update_id !=''):
    			redirect('examination');
			else:
				redirect('examination/read');
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

		$data['page_title']  = 'Create';
		$this->load->view($this->session->userdata('role').'/add_examination',$data);			
	}

  function updateMarks(){
     
     foreach ($this->db->get('examination_marks')->result_array() as $row){
		 $subject_id = $this->M_examination_paper->get_subject_id($row['examination_paper_id']);

	     $data = array(
   	     	'subject_id' =>$subject_id, 
	     );
	     $this->db->where('examination_paper_id',$row['examination_paper_id']);
	     $this->db->update('examination_marks',$data);
	     
	    }

	    return;
	}


	function save_marks(){
     
     foreach ($this->input->post('user_id') as $key => $value) {
         $grade_level_id = $this->input->post('grade_level_id');
	     $examination_paper_id = $this->input->post('examination_paper_id');
	     $examination_mark_id = $this->input->post('examination_mark_id');
   	     $examination_id = $this->input->post('examination_id');
	     $mark_obtained = $this->input->post('mark_obtained');
   	     $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
   		 $subject_id = $this->M_examination_paper->get_subject_id($examination_paper_id);
   		// $total_marks = $this->M_examination_paper->get_total_marks($examination_paper_id);
	     $data = array(
	     	'user_id' =>$value, 
	     	'examination_paper_id' =>$examination_paper_id, 
	     	'grade_level_id' =>$grade_level_id, 
	     	'added_by' =>$this->session->userdata('user_id'), 
	     	'examination_mark_id' =>$examination_mark_id[$key], 
   	     	'examination_id' =>$examination_id, 
   	     	'subject_id' =>$subject_id, 
   	     	//'total_marks' =>$total_marks,
	     	'mark_obtained' =>$mark_obtained[$key], 
	     	'points' =>$this->M_examination->get_grade_point($grade_group_id,$mark_obtained[$key]) 
	     );

	     if(!(empty($data['mark_obtained']))){
	    	$this->db->replace('examination_marks',$data);
	     }

	    }

	    return;
	}

	function generate_report_cards($param='',$param1=''){
		$examination_id = $param;
		$grade_level_id = $param1;
     	$grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
     	$this->finale($examination_id,$grade_level_id);
     	$this->finale2($examination_id,$grade_level_id);
     	$this->finale3($examination_id,$grade_level_id);
/*
	 foreach ($this->M_examination->get_examination_papers_marksINA($examination_id,$grade_level_id) as $row){
		$subject_id = $this->M_examination_paper->get_subject_id($row['examination_paper_id']);

$total_obtained = $this->M_examination->get_paper_markSUBJECT_ALL($row['user_id'],$examination_id,$grade_level_id,$subject_id);
$total_overal = $this->M_examination->get_total_overalMARKS($subject_id);

/*echo '<br> -------------------------------------------------';
echo '<br>'.$total_overal.'  | '.$subject_id.' = '.$row['user_id'].'<br>';
echo '<br>'.intval(($total_obtained/$total_overal)*100);

echo '<br> -------------------------------------------------<br>';*/

//$count = $this->M_examination->get_paper_markSUBJECT_COUNT_ALL($row['user_id'],$examination_id,$grade_level_id,$subject_id);
		//if(!(empty($subject_id))){
			//$AG['average_mark'] = floor($count > 0 ? $sum/$count : $sum);
			/*$AG['average_mark'] = intval(($total_obtained/$total_overal)*100);
			$AG['average_point'] = $this->M_examination->get_grade_point($grade_group_id,$AG['average_mark']);
			$this->db->where('user_id',$row['user_id']);
			$this->db->where('user_id !=',null);
			$this->db->where('subject_id',$row['subject_id']);
			$this->db->where('examination_id',$examination_id);
			$this->db->where('grade_level_id',$grade_level_id);
    		$this->db->update('examination_marks',$AG);
    		//$this->db->insert('final_grades',$AG);

    		$this->db->where('user_id',null);
    		$this->db->delete('examination_marks');

    			/*	echo ' <br> -------------------------------------------------';

    		    		echo '<br> Totals :'.$sum.' - '.$count;
    		    		echo '<br> Average :'.$AVERAGE_GRADE['average_mark'];
    		    		echo '<br> AverageDB :'.$row['average_mark'];
    		    		//echo '<br> Marks  : '.$row['mark_obtained'].' - '.$this->M_examination_paper->get_examination_paper($row['examination_paper_id']);
    		    		echo '<br> USERID :'.$row['user_id'];

   		    		echo '<br> ------------------------------------------------- <br>';*/

		//}
	  //}

	 // redirect('Examination/report_cards2/'.$examination_id.'/'.$grade_level_id);
	}

	function swatch1(){
		$this->check_session();
		$data['page_title']  = 'Swatch Double Papers ';
		$this->load->view($this->session->userdata('role').'/swatch1',$data);			
    }

	function swatch2(){
		$examination_id = $this->input->post('examination_id');
		$grade_level_id = $this->input->post('grade_level_id');
		$subject_id = $this->input->post('subject_id');
        $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
foreach ($this->M_examination->get_examination_papers_marksFINALGRADES($examination_id,$grade_level_id,$subject_id) as $row){
		    
		    //if available,clear
   		 	$this->db->where('grade_level_id',$grade_level_id);
   		 	$this->db->where('examination_id',$examination_id);//very important
   		 	$this->db->where('subject_id',$subject_id);
   		 	$this->db->where('user_id',$row['user_id']);
   		 	$this->db->delete('final_grades');

		    $total_obtained = $this->M_examination->get_paper_markSUBJECT_ALL($row['user_id'],$examination_id,$grade_level_id,$subject_id);
			$total_overal = $this->M_examination->get_total_overalMARKS($subject_id);
			$finale['mark_obtained'] = intval(($total_obtained/$total_overal)*100);
			$finale['points'] = $this->M_examination->get_grade_point($grade_group_id,$finale['mark_obtained']);
			$finale['user_id'] = $row['user_id'];
			$finale['subject_id'] = $subject_id;
			$finale['examination_id'] = $examination_id;
			$finale['grade_level_id'] = $grade_level_id;
			$this->db->insert('final_grades',$finale);	
			/*echo '----------';
			echo '<br>';
			echo '<br>'.$finale['mark_obtained'].' - '.$total_obtained.' - '.$total_overal.' ->'.$row['user_id'].'<br>';

foreach($this->M_examination_paper->get_examination_paper_by_subject_id($examination_id,$subject_id,$row['user_id']) as $ko){
		echo "=========";
		echo '<br>';
		echo '<br>'.$ko['mark_obtained'].' -- '.$subject_id;
		echo '<br>';
		echo "=========";*/
		
	//}

			//var_dump($finale);	
		  }
    	$this->session->set_flashdata('message','Marks swatched successfully');
		redirect('Examination/swatch1');
	}

	function finale($examination_id,$grade_level_id){
      $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);

	 foreach ($this->M_examination->get_examination_papers_marksFINALGRADES($examination_id,$grade_level_id) as $row){
	    $total_obtained = $this->M_examination->get_paper_markSUBJECT_ALL($row['user_id'],$examination_id,$grade_level_id,$row['subject_id']);
		$total_overal = $this->M_examination->get_total_overalMARKS($row['subject_id']);
		$finale['mark_obtained'] = intval(($total_obtained/$total_overal)*100);
		$finale['points'] = $this->M_examination->get_grade_point($grade_group_id,$finale['mark_obtained']);
		$finale['user_id'] = $row['user_id'];
		$finale['subject_id'] = $row['subject_id'];
		$finale['examination_id'] = $examination_id;
		$finale['grade_level_id'] = $grade_level_id;
		$this->db->insert('final_grades',$finale);	
		//var_dump($finale);
		
	  }

	}

	function finale2($examination_id,$grade_level_id){
      $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);

      foreach($this->M_user->get_students_by_class($grade_level_id) as $rowo){

		 foreach ($this->M_examination->get_examination_papers_marksFINALGRADES2($examination_id,$grade_level_id,$rowo['user_id']) as $row){
		    $total_obtained = $this->M_examination->get_paper_markSUBJECT_ALL($row['user_id'],$examination_id,$grade_level_id,$row['subject_id']);
			$total_overal = $this->M_examination->get_total_overalMARKS($row['subject_id']);
			$finale['mark_obtained'] = intval(($total_obtained/$total_overal)*100);
			$finale['points'] = $this->M_examination->get_grade_point($grade_group_id,$finale['mark_obtained']);
			$finale['user_id'] = $row['user_id'];
			$finale['subject_id'] = $row['subject_id'];
			$finale['examination_id'] = $examination_id;
			$finale['grade_level_id'] = $grade_level_id;
			$this->db->insert('final_grades2',$finale);	
			//var_dump($finale);
			
		  }
		}

	}

	function finale3($examination_id,$grade_level_id){
      $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);

      foreach($this->M_user->get_students_by_class($grade_level_id) as $rowo){

		 foreach ($this->M_examination->get_examination_papers_marksFINALGRADES3($examination_id,$grade_level_id,$rowo['user_id']) as $row){
		    $total_obtained = $this->M_examination->get_paper_markSUBJECT_ALL($row['user_id'],$examination_id,$grade_level_id,$row['subject_id']);
			$total_overal = $this->M_examination->get_total_overalMARKS($row['subject_id']);
			$finale['mark_obtained'] = intval(($total_obtained/$total_overal)*100);
			$finale['points'] = $this->M_examination->get_grade_point($grade_group_id,$finale['mark_obtained']);
			$finale['user_id'] = $row['user_id'];
			$finale['subject_id'] = $row['subject_id'];
			$finale['examination_id'] = $examination_id;
			$finale['grade_level_id'] = $grade_level_id;
			$this->db->insert('final_grades2',$finale);	
			//var_dump($finale);
			
		  }
		}

	}


	function reset_report_cards($param='',$param1=''){
		$examination_id = $param;
		$grade_level_id = $param1;

	 foreach ($this->M_examination->get_examination_papers_marksINA($examination_id,$grade_level_id) as $row){

			$AVERAGE_GRADE['average_mark'] = 0;
			$this->db->where('user_id',$row['user_id']);
			$this->db->where('user_id !=',null);
			$this->db->where('examination_paper_id',$row['examination_paper_id']);
			$this->db->where('examination_id',$examination_id);
			$this->db->where('grade_level_id',$grade_level_id);
    		$this->db->update('examination_marks',$AVERAGE_GRADE);

    		$this->db->where('user_id',null);
    		$this->db->delete('examination_marks');

    		$this->db->where('examination_id',$examination_id);
			$this->db->where('grade_level_id',$grade_level_id);
    		$this->db->delete('final_grades');
	  }

	  redirect('Examination/report_cards2/'.$examination_id.'/'.$grade_level_id);
	}


	function report_cards2($param='',$param1=''){
		$this->check_session();
		$data['page_title']  = 'Report Cards |';
		$data['examination_id']  = $param;
		$data['grade_level_id']  = $param1;
		$this->load->view($this->session->userdata('role').'/report_cards',$data);			
    }

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('examination_id',$param);
        $this->db->update('examinations',$data);
    	$this->session->set_flashdata('message','Examination Session deleted successfully');
		redirect('examination');
	}

	function delete_mark(){
		$this->db->where('examination_mark_id',$this->input->post('examination_mark_id'));
        $this->db->delete('examination_marks');
		return;
	}

	function close(){
		$data['active'] = 0;
		$this->db->where('examination_id',$param);
        $this->db->update('examinations',$data);
    	$this->session->set_flashdata('message','Examination Session closed successfully');
		redirect('examination');
	}

	function filter_report_cards(){
		$this->check_session();
		$data['page_title']  = 'Filter Report Cards ';
		$this->load->view($this->session->userdata('role').'/filter_report_cards',$data);			
    }

    function filter_marksheet(){
		$this->check_session();
		$data['page_title']  = 'Filter Marksheet ';
		$this->load->view($this->session->userdata('role').'/filter_marksheet',$data);			
    }

    function report_cards(){
		$this->check_session();
		$data['page_title']  = 'Report Cards |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['examination_id']  = $this->input->post('examination_id');
		$data['user_id']  = $this->input->post('user_id');
		$this->load->view($this->session->userdata('role').'/report_cards',$data);			
    }

    function reportKADI(){
				$this->check_session();
				$this->load->helper('tcpdf/pdf_helper');
				tcpdf();
				$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				$obj_pdf->SetCreator(PDF_CREATOR);

				$title = "Payslip  |";
				$obj_pdf->SetTitle($title);
				$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
				$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
				$obj_pdf->SetDefaultMonospacedFont('courier');
				$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
				$obj_pdf->SetFont('courier', '', 11);
				$obj_pdf->setFontSubsetting(false);
				$obj_pdf->AddPage();
				ob_start();
				/*$name = $this->M_user->get_name($param2);
			    $data["title"]  = "Payslip  | ".$name;
				$data["system"]  = "";
				$data["salary_id"] = $param;
				$data["user_id"] = $param2;
				$data["month"] = $param3;
				$data["year"] = $param4;
				$data['slip'] = $this->db->select('*')
				 ->from('users')
				 ->join('salaries','users.user_id = salaries.user_id')
				 ->where('salary_id',$param)
				 ->where('salaries.user_id',$param2)
				 ->where('salaries.month',$param3)
				 ->where('salaries.year',$param4)
				 ->group_by('salaries.salary_id')
				 ->get()->result_array();*/

			   	$this->load->view($this->session->userdata('role').'/payslip1',$data);
	    		$content = ob_get_contents();
				ob_end_clean();
				$obj_pdf->writeHTML($content, true, false, true, false, '');
				$obj_pdf->Output('payslip_'.$name.'_'.$data['month'].'_'.$data['year'].'.pdf', 'D');
			}


	function filter_examination(){
		$this->check_session();
		$data['page_title']  = 'Choose Examination ';
		$this->load->view($this->session->userdata('role').'/filter_examination',$data);			
    }

    function filter_examination2(){
		$this->check_session();
		$data['page_title']  = 'Filter Exam Marks ';
		$this->load->view($this->session->userdata('role').'/filter_examination2',$data);			
    }

    function filter_examination4(){
		$this->check_session();
		$data['page_title']  = 'Filter Exam Marks (Papers) ';
		$this->load->view($this->session->userdata('role').'/filter_examination4',$data);			
    }

    function filter_examination5(){
		$this->check_session();
		$data['page_title']  = 'Marksheet |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['examination_id']  = $this->input->post('examination_id');
		$data['examination_paper_id']  = $this->input->post('examination_paper_id');
		$this->load->view($this->session->userdata('role').'/filter_examination5',$data);			
    }


    function filter_examination3(){
		$this->check_session();
		$data['page_title']  = 'Marksheet |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['examination_id']  = $this->input->post('examination_id');
		$data['subject_id']  = $this->input->post('subject_id');
		$data['examination_paper_id'] = $this->M_examination_paper->get_examination_paper_id($data['subject_id']);
		$this->load->view($this->session->userdata('role').'/filter_examination3',$data);			
    }

    function examination_marksheet(){
		$this->check_session();
		$data['page_title']  = 'Examination Marksheet |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['examination_id']  = $this->input->post('examination_id');
		$data['examination_paper_id']  = $this->input->post('examination_paper_id');
		$this->load->view($this->session->userdata('role').'/examination_marksheet',$data);			
    }

     function marksheet(){
		$this->check_session();
		$data['page_title']  = 'Marksheet |';
		$data['grade_level_id']  = $this->input->post('grade_level_id');
		$data['examination_id']  = $this->input->post('examination_id');
		$this->load->view($this->session->userdata('role').'/marksheet',$data);			
    }
	
}