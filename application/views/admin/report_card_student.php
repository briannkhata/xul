<?php $this->load->view('header');?>
		<div class="row">
			  <div class="col-md-12">
			<p>
				<a href="<?=base_url();?>examination/filter_report_card_student" class="btn default red-stripe">
						Back to filter
					</a>
					<a href="#" class="btn default green-stripe" onclick="window.print()" >
						Print
					</a>
			</p>
			</div>
				<div class="col-md-12">
					<?php		 
						$academic_year_id = $this->M_examination->get_academic_year_id($examination_id);
  						$academic_year = $this->M_academic_year->get_academic_year($academic_year_id);
						$grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
						$point_based = $this->M_grade_group->get_point_based($grade_group_id);

						?>
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<?=$this->db->get('settings')->row()->school;?> 
							</div>
						</div>
						<div class="portlet-body">
							<div class="row" align="center">
								<div class="col-md-12">
									<img src="<?=base_url();?>assets/logo.png" class="img-responsive"></img>
								</div>
									<div class="col-md-12">
										<h1><?=$this->db->get('settings')->row()->school;?></h1>
										<address><?=$this->db->get('settings')->row()->address;?></address>
									</div>
							</div>
							<hr>

    						<div class="row">
								

							<div class="col-md-7">
							<table class="table well">
							
								<tr>
									<td><b><?=$this->M_user->get_user($user_id);?>
									 - <?=$this->M_user->get_reg_no($user_id);?> 
									 (<?=$this->M_user->get_gender($user_id);?>) </b></td>
								</tr>
								
								
								<tr>
									<td><b>Academic Year</b></td>
									<td>
										<?=$academic_year;?> - <?=$this->M_examination->get_examination($examination_id);?>
									</td>
								</tr>
								<tr>
									<td><b>Grade Level</b></td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
							</table>
						</div>
					</div>


						
							<table class="table table-bordered">
							<thead class="well">
								<th>Subject</th>
								<th>Mark Obtained</th>
								<th>Grade</th>
								<th>Rank</th>
								<th>Comment</th>
				
							</thead>
								<tbody>
								<?php 

foreach ($this->M_examination->get_examination_papers_marks($examination_id,$grade_level_id,$user_id) as $ham) {



									?>
								<tr>
								<td>
									<?=$this->M_examination_paper->get_examination_paper($ham['examination_paper_id']);?></td>
								<td><?=$ham['mark_obtained'];?></td>
							<td><?=$this->M_examination->get_grade_point($grade_group_id,$ham['mark_obtained']);?></td>
								<td>
	<?=$this->M_examination->get_rank($user_id,$examination_id,$ham['examination_paper_id'],$grade_level_id);?></td>
								<td><?=$this->M_examination->get_grade_remark($grade_group_id,$ham['mark_obtained']);?></td>						
								</tr>
							<?php }?>
								</tbody>
															
							</table>
							<table class="table well">
								
								<tr>
									<?php if($point_based == 0){?>
									<td>Total Marks (Best Six) 
										&nbsp; - &nbsp;&nbsp;&nbsp; <b>
	<?=number_format($this->M_examination->get_best_six_marks($examination_id,$grade_level_id,$user_id),2);?></b>
</td>
<?php } else{?>

									<td>Total Points (Best Six) 
										&nbsp; - &nbsp;&nbsp;&nbsp; <b>
<?=number_format($this->M_examination->get_best_six_points($examination_id,$grade_level_id,$user_id),2);?></b>
									</td>
								<?php }?>
									<td>Overal Position - 
		<b><?php if($point_based == 0){?>
	<?=$this->M_examination->get_overal_rank_by_marks($user_id,$grade_level_id,$examination_id);?>
<?php } else{?>
	<?=$this->M_examination->get_overal_rank_by_points($user_id,$grade_level_id,$examination_id);?>
<?php }?>
</b>
</td>
<td>
	<?=$this->M_examination->get_final_grade_remark($grade_group_id,$this->M_examination->get_best_six_points($examination_id,$grade_level_id,$user_id));?>
</td>
									
								</tr>
							</table>
						<div class="row">
							<div class="col-md-6">
							
								<table class="table well" style="font-weight: bold;">
									<tr>
										<td>Key for Grade</td>
									</tr>
					<?php foreach ($this->M_grade_point->get_grade_points_by_grade_group_id($grade_group_id) as $key) {?>
									<tr>
										<td><?=$key['mark_from'];?> % - <?=$key['mark_upto'];?> % 
											= <?=$key['grade_point'];?> </td>
										<td><?=$key['comment'];?></td>
									</tr>
								<?php }?>
								</table>

						</div>
					</div>
							<p>

							<table class="table well" style="font-weight: bold;">
								<tr>
									<td>CLASS TEACHER REMARKS</td>
									<td>
	<?=$this->M_examination->get_final_grade_remark($grade_group_id,$this->M_examination->get_best_six_points($examination_id,$grade_level_id,$user_id));?></td>
								</tr>
									<td>STUDENT'S BEHAVIOUR </td>
								    <td>
			<?php $offence = count($this->M_discipline->get_offences_by_user_count($user_id,$academic_year_id));

							if($offence <= 0){
							?>
								<b>SHOULD CONTINUE GOOD BEHAVIOUR</b>

							<?php } elseif($offence > 0){ ?>
    							<b>SHOULD CHANGE BEHAVIOUR</b>
							<?php } else {
								echo '--';
							}?>
							</td>

								</tr>

								</tr>
									<td>HEADTEACHER REMARKS </td>
								    <td></td>

								</tr>
							</table>
						</p>
							
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				</div>
			</div>


	   <?php $this->load->view('footer');?>
			