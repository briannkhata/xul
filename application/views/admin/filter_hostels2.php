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
										<a href="<?=base_url();?>hostel/filter_hostels" class="btn default">
											Back
											</a>
									
											<a href="#" onclick="window.print()" class="btn default">
											Print
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Class</th>
								<th>Reg No.</th>
								<th>Date Assigned</th>
								<th>Academic Year</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_hostel->get_student_hostels2($hostel_id,$academic_year_id) as $row):
								$grade_level_id = $this->M_user->get_grade_level_id($row['user_id'])?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								<td><?=$this->M_user->get_reg_no($row['user_id']);?></td>
								<td><?=date('d M Y',strtotime($row['date_assigned']));?></td>
								<td><?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								
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
