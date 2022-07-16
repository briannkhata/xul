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
							<div class="table-toolbar">
								<div class="row">
									<br>
									<div class="col-md-12">
										
									<a href="<?=base_url();?>hostel/assign_hostel" class="btn default">
											Assign hostel
											</a>

										<div class="btn-group">
									<a href="#"  onclick="bulk_assign_hostels()" class="btn default">
											Bulk Assignment
											</a>

										</div>
									</div>
									
								</div>
							</div>
							<hr>
							<input type="hidden" name="academic_year_id" id="academic_year_id" value="<?=$this->M_academic_year->get_active_academic_year();?>">
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Class</th>
								<th>Hostel</th>
								<th>Date Assigned</th>
								<th>Academic Year</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_hostel->get_student_hostels() as $row):
								$grade_level_id = $this->M_user->get_grade_level_id($row['user_id'])?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								<td><?=$this->M_hostel->get_name($row['hostel_id']);?></td>
								<td><?=date('d M Y',strtotime($row['date_assigned']));?></td>
								<td><?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>hostel/delete2/<?=$row['hostel_id'];?>/<?=$row['user_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>
			<script type="text/javascript">


			function bulk_assign_hostels(){
				$.post("<?=base_url();?>hostel/bulk_assign_hostels",
				{
					},
					function(data,status){
						alert('Hostel assignemnt successfull');
						location.reload();
					});
			}

			function reset_hostels(){
				$.post("<?=base_url();?>hostel/reset_hostels",
				    {
				      academic_year_id : $('#academic_year_id').val()
					},
					function(data,status){
						alert('Reseting hostels successfull');
						location.reload();
					});
			}

			
		</script>
