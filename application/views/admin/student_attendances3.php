<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
								<?=$page_title;?>
							</div>
						</div>
				
						<div class="portlet-body">
							<table class="table well">
								
								<tr>
									<td>Academic Year </td>
									<td><?=$this->M_academic_year->get_academic_year($academic_year_id);?></td>
								</tr>
								<tr>
									<td>Term </td>
									<td><?=$this->M_term->get_term($term_id);?></td>
								</tr>
								<tr>
									<td>Class</td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
								
						<form action="" method="post" id="formAttendance">
						
							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width: 3%;">#</th>
								<th style="width:20%;">Name</th>
								<th style="width:7%;">Reg No</th>
								<th style="width:7%;">Gender</th>
		<?php foreach($this->M_attendance->get_attendances_by_term($term_id,$grade_level_id,$academic_year_id) as $row){?>
								<th><?=date('d M Y',strtotime($row['attendance_date']));?></th>
							<?php }?>
							</tr>
							</thead>
							<tbody>

							<?php 
							$count = 1;

							foreach ($this->M_user->get_students_by_class($grade_level_id) as $row):
?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=$row['gender'];?></td>
<?php foreach($this->M_attendance->get_attendances_by_term2($row['user_id'],$term_id,$grade_level_id,$academic_year_id) as $row){?>
								<th><?=$this->M_attendance_code->get_attendance_code($row['attendance_code_id']);?></th>
							<?php }?>
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well">
								
								<button type="button" onclick="window.print()" class="btn default green-stripe">Print</button>
								
						  <a href="<?=base_url();?>attendance/filter_student_attendance3" class="btn default red-stripe">Back</a>
										
							</center>
							</form>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>

			
