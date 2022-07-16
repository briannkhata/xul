<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
								Staff Attendances
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
									<td>Attendance Date</td>
									<td><?=date('d F Y', strtotime($attendance_date));?></td>
								</tr>

							
						<form action="" method="post" id="formAttendance">
							<input type="hidden" name="academic_year_id" value="<?=$academic_year_id;?>">
							<input type="hidden" name="term_id" value="<?=$term_id;?>">
							<input type="hidden" name="attendance_date" value="<?=$attendance_date;?>">

							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Code</th>
								<th>Comment</th>
								<th>Action</th>								
							</tr>
							</thead>
							<tbody>

							<?php 
							$count = 1;

							foreach ($this->M_user->get_staffs() as $row):
$attendance_id = $this->M_attendance->get_attendance_id($attendance_date,$row['user_id'],$term_id,$academic_year_id);
$comment = $this->M_attendance->get_comment($attendance_date,$row['user_id'],$term_id,$academic_year_id);
$attendance_code_id = $this->M_attendance->get_attendance_code_id($attendance_date,$row['user_id'],$term_id,$academic_year_id);
?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['gender'];?>
<input type="hidden" name="attendance_id[]" value="<?php if(isset($attendance_id)) echo $attendance_id;?>">
<input type="hidden" name="user_id[]" value="<?=$row['user_id'];?>">
								</td>
								<td>
								
									<select class="form-control" name="attendance_code_id[]">
															<?php foreach ($this->M_attendance_code->get_attendance_codes() as $row) {?>
						<option <?php if($attendance_code_id == $row['attendance_code_id']) echo 'selected';?> value="<?=$row['attendance_code_id'];?>">
																	<?=$row['attendance_code'];?>
																</option>
															<?php }?>

								</td>
								<td>
									<input type="text" name="comment[]" value="<?php if(isset($comment)) echo $comment;?>">
								</td>
							    <td>
							    	<a href="" class="btn default btn-xs red-stripe" onclick="delete_attendance(<?=$attendance_id;?>)"><i class="fa fa-times-circle"></i> </a>
							    </td>							
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well">
								
								<button name="button" type="button" onclick="save_attendances()" class="btn default green-stripe">Save</button>
								
						  <a href="<?=base_url();?>attendance/filter_staff_attendance" class="btn default red-stripe">Back</a>
										
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
					      url: '<?=base_url();?>attendance/save_staff_attendances',
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
