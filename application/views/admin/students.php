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
									
									<a href="<?=base_url();?>user/read" class="btn default green-stripe">
											Add New <i class="fa fa-plus-circle"></i>
											</a>

									<div class="btn-group">

									<a href="<?=base_url();?>user/register" class="btn default">
											Register</a>

									<a href="<?=base_url();?>user/promote" class="btn default">
											Promote</a>
										<a href="<?=base_url();?>user/graduate" class="btn default">
											Graduate</a>
											<a href="<?=base_url();?>user/filter_students1" class="btn default">
											Filter</a>
										</div>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Class</th>
								<th>Contacts</th>
								<th>Address</th>
								<th>Allergies</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_user->get_students() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=strtoupper($row['name']);?> (<b><?=$row['reg_no'];?></b>)
								 - <?=$row['gender'];?>
								<br>DOB : <?=date('d M - Y',strtotime($row['dob']));?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
									<br>
									- <?=$this->M_section->get_section($row['section_id']);?>
								</td>
								<td><?=$row['phone'];?><br>
									<?=$row['email'];?></td>
								<td><?=$row['physical_address'];?><br>
								    <?=$row['postal_address'];?></td>
								<td><?=$row['allergies'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>user/read/<?=$row['user_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>user/delete/<?=$row['user_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a><br>

										<a href="<?=base_url();?>user/view_student/<?=$row['user_id'];?>" class="btn btn-sm default blue-stripe"> View Details</a>
								
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
