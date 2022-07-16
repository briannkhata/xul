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
									<td>Attendance Date</td>
									<td><?=date('d F Y', strtotime($attendance_date));?></td>
								</tr>
								<tr>
									<td>Academic Year </td>
									<td><?=$this->M_academic_year->get_academic_year($academic_year_id);?></td>
								</tr>
								<tr>
									<td>Term </td>
									<td><?=$this->M_term->get_term($term_id);?></td>
								</tr>
								<tr>
									<td>Grade Level</td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
								<tr>
									<td>Section</td>
									<td><?=$this->M_section->get_section($section_id);?></td>
								</tr>
							
						<form action="" method="post" id="formAttendance">
							<input type="hidden" name="academic_year_id" value="<?=$academic_year_id;?>">
							<input type="hidden" name="term_id" value="<?=$term_id;?>">
							<input type="hidden" name="attendance_date" value="<?=$attendance_date;?>">
							<input type="hidden" name="grade_level_id" value="<?=$grade_level_id;?>">
							<input type="hidden" name="section_id" value="<?=$section_id;?>">

							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width: 3%;">#</th>
								<th>Name</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Code</th>
								<th>Comment</th>
							</tr>
							</thead>
							<tbody>

							<?php 
							$count = 1;

							foreach ($this->M_user->get_students_by_class($grade_level_id) as $row):
$attendance_id = $this->M_attendance->get_attendance_id($attendance_date,$row['user_id'],$term_id,$academic_year_id);
$comment = $this->M_attendance->get_comment($attendance_date,$row['user_id'],$term_id,$academic_year_id);
$attendance_code_id = $this->M_attendance->get_attendance_code_id($attendance_date,$row['user_id'],$term_id,$academic_year_id);
?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=$row['gender'];?></td>
								<td><?=$this->M_attendance_code->get_attendance_code($attendance_code_id);?></td>
								<td><?=$comment;?></td>						
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well">
								
								<button type="button" onclick="window.print()" class="btn default green-stripe">Print</button>
								
						  <a href="<?=base_url();?>attendance/filter_staff_attendance1" class="btn default red-stripe">Back</a>
										
							</center>
							</form>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>

			<script type="text/javascript">
				function save_attendances(){
					var formData = $('#formAttendance').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>attendance/save_student_attendances',
					    data: formData,
					    dataType: "json",
					    success: function(data, textStatus, jqXHR){
					        alert('Attendances Saved Successfully');
					        location.reload();
					    },
					    error: function(xhr,status,error){
					        alert('Error!! Saving Data');
					    }
					}); 
			    }

			function delete_attendance(attendance_id){
				$.post("<?=base_url();?>attendance/delete",
					{
					attendance_id: attendance_id
				},
				function(data,status){
					location.reload();
				});
			}
			</script>
