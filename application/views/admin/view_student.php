<?php $this->load->view('header');?>

		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
								<?=$this->M_user->get_user($user_id);?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<ul class="list-group">
								<?php foreach ($this->M_user->get_user_by_id($user_id) as $row) {?>

								  <li style="width:40%; height: auto; padding-bottom: 1%;">
								    <img src="<?=base_url();?>uploads/users/<?=$row['photo'];?>" class="img-thumbnail" style="height: 150px;">
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$row['reg_no'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$this->M_study_mode->get_study_mode($row['study_mode_id']);?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$row['gender'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$this->M_section->get_section($row['section_id']);?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$row['email'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$row['previous_school'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								      <?=$row['phone'];?>
								  </li>

								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    <?=$row['postal_address'];?> | <?=$row['physical_address'];?>
								  </li>

								   <li class="list-group-item d-flex justify-content-between align-items-center">
								    Guardian Details : <?=$row['guardian_details'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Date Added   <?=date('d F-Y',strtotime($row['date_added']));?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<?=$row['national_id'];?>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<?=$row['nationality'];?>
								  </li>

								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Allergies : <?=$row['allergies'];?>
								  </li>
								<?php }?>
								</ul>

								<ul class="list-group">
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<b>Assesments</b>
									</li>
								</ul>

								<ul class="list-group">
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<b>Examnations</b>
									</li>
								</ul>

								<ul class="list-group">
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<b>Discipline</b>
									</li>
								</ul>

							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
		<?php $this->load->view('footer');?>
