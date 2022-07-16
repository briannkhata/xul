<?php $this->load->view('header');?>
<style type="text/css">
 div.grey{page-break-after:always;}
</style>
<div class="row product">
	<div class="col-md-12">
		<div class="portlet-title hidden">
			<p>
			<strong>
				<?=$page_title;?> 
				<?=$this->M_examination->get_examination($examination_id);?> |
				<?=$this->M_grade_level->get_grade_level($grade_level_id);?>
		   </strong>
		</p>
		</div>
	</div>

	<?php $mark = count($this->M_examination->get_examination_papers_marksCHECK($examination_id,$grade_level_id));?>
	<?php if($mark > 0){?> 

   <div class="col-md-12">
		<p>
			<a href="<?=base_url();?>examination/filter_report_cards" class="btn default red-stripe">
				Back to filter
			</a>
			<a href="#" class="btn default green-stripe" onclick="window.print()">
				Print
			</a>

			<a href="<?=base_url();?>examination/reset_report_cards/<?=$examination_id;?>/<?=$grade_level_id;?>" class="btn red red-stripe pull-right">	Reset </a>
					
		</p>
	</div>
	<div class="col-md-12">
	<?php foreach ($this->M_user->get_students() as $row):
 		$academic_year_id = $this->M_examination->get_academic_year_id($examination_id);
		$academic_year = $this->M_academic_year->get_academic_year($academic_year_id);
		$grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
		$point_based = $this->M_grade_group->get_point_based($grade_group_id);
	?>
	
	<div class="portlet box grey" style="border:1px solid #E5E5E5;">
		<div class="portlet-title">
		</div>
			<div class="portlet-body">
				<div class="row">
					<table style="margin-left: 3%;">
						<tr>
							<td style="width:10%;">
							 <img src="<?=base_url();?>assets/logo.png" class="img-circle img-thumbnail">
							</td>
							<td style="width:80%;">
								<div style="margin-left: 8%;">
								<h1><?=ucfirst($this->db->get('settings')->row()->school);?></h1>
									<address><?=$this->db->get('settings')->row()->address;?></address>
							    </div>
						    </td>
						    <td style="width:10%;">
						    	<address><?=$this->M_user->get_postal_address($row['user_id']);?></address>
							</td>
					    </tr>
					</table>
				</div>

				<table class="table">
					<tr>
					   <td>
					   	<div class="col-md-6">
					   		<b><?=$row['name'];?> - <?=$row['reg_no'];?></b>
					   		<br>
					   		<b><?=strtoupper($row['gender']);?></b>
					   	</div>
					   </td>

					   <td>
					   	<div class="col-md-3">
					   		<b><?=$this->M_grade_level->get_grade_level($grade_level_id);?></b>
					   	</div>
					   </td>
				</tr>
				<tr>
					<td>
				     	<div class="col-md-6">
					   		<b>
					   			<?=$academic_year;?> - 
								<?=$this->M_examination->get_examination($examination_id);?>
					   		</b>
					   	</div>
					   </td>

					   <td>
					   	<div class="col-md-6">
					   		<b>Students in Class : <?=count($this->M_user->get_students());?></b>
					   	</div>	
					   	</td>
					   </tr>				
				</table>
				<div class="arrow">
			<table class="table table-bordered" style="border-radius: 4px;">
					<thead class="well">
						<th>Subject</th>
						<th>Mark</th>
						<th>Grade</th>
						<th>Rank</th>
						<th>Comment</th>
					</thead>
					<tbody>
<?php 
foreach ($this->M_examination->get_examination_papers_marks($examination_id,$grade_level_id,$row['user_id']) as $ham){?>
					<tr>
						<td><?=$this->M_subject->get_subject($ham['subject_id']);?></td>
						<td><?=$ham['mark_obtained'];?></td>
						<td><?=$this->M_examination->get_grade_point($grade_group_id,$ham['mark_obtained']);?></td>
						<td><?=$this->M_examination->get_subject_rankREPORTCARD($row['user_id'],$examination_id,
						      $ham['subject_id'],$grade_level_id);?></td>
						<td><?=$this->M_examination->get_grade_remark($grade_group_id,$ham['mark_obtained']);?></td>
					</tr>
				<?php }?>
<?php foreach($this->M_examination->get_examination_papers_marks2($examination_id,$grade_level_id,$row['user_id']) as $yo) { ?>
				<tr>
						<td><?=$this->M_subject->get_subject($yo['subject_id']);?></td>
						<td><?=$yo['mark_obtained'];?></td>
						<td><?=$this->M_examination->get_grade_point($grade_group_id,$yo['mark_obtained']);?></td>
						<td><?=$this->M_examination->get_subject_rankREPORTCARD($row['user_id'],$examination_id,
						      $yo['subject_id'],$grade_level_id);?></td>
						<td><?=$this->M_examination->get_grade_remark($grade_group_id,$yo['mark_obtained']);?></td>
					</tr>
				<?php }?>
			</tbody>
				</table>


				<table class="table well">
					<tr>
						<?php if($point_based == 0){?>
							<td>Best Six 
								&nbsp; - &nbsp;&nbsp;&nbsp;
						<b><?=$this->M_examination->get_best_six_marks($examination_id,$grade_level_id,$row['user_id']);?></b>
					</td>
						<?php } else {?>
							<td> Best Six 
								&nbsp; - &nbsp;&nbsp;&nbsp;		
<b><?=$this->M_examination->get_best_six_points($examination_id,$grade_level_id,$row['user_id']);?></b> Points
									</td>
								<?php }?>
									<td>Position - 
							<b>		<?php if($point_based == 0){?>
		<?=$this->M_examination->get_overal_rank_marks($examination_id,$grade_level_id,$row['user_id']);?>
		  <?php } else{?>
		<?=$this->M_examination->get_overal_rank_points($examination_id,$grade_level_id,$row['user_id']);?>
	<?php }?>
</b>
</td>
<td style="font-weight:bold;">
<?php $fgrade = intval($this->M_examination->get_best_six_points($examination_id,$grade_level_id,$row['user_id']));;?>
	<?=$this->M_examination->get_final_grade_comment($grade_group_id,$fgrade);?>
</td>
</tr>
</table>
						
				<div class="row">
					<div class="col-md-12">
					<table class="table">
					<tr>
				<?php 
				$count = 1;
				foreach ($this->M_grade_point->get_grade_points_by_grade_group_id($grade_group_id) as $key) {
					$count ++;
					?>
									<td>
										<p>(<?=$key['mark_from'];?> - <?=$key['mark_upto'];?>) % 
											= <?=$key['grade_point'];?> <br>
											  <?=$key['comment'];?></p>
									</td>
								<?php if($count == 5 ):?>
									<br>
								<?php endif;?>
								<?php }?>
							</tr>
							</table>
						</div>
					</div>

							<p>

							<table class="table well" style="font-weight: bold;">
								<tr>
									<td>CLASS TEACHER REMARKS</td>
									<td>
	<?=$this->M_examination->get_final_grade_remark($grade_group_id,$this->M_examination->get_best_six_points($examination_id,$grade_level_id,$row['user_id']));?></td>
								</tr>
									<td>STUDENT'S BEHAVIOUR </td>
								    <td>
			<?php $offence = count($this->M_discipline->get_offences_by_user_count($row['user_id'],$academic_year_id));

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
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				 <?php endforeach;?>

				</div>
			<?php } else{?>
				 <div class="col-md-12">
				 	<h1 class="text-primary text-center">NOT AVAILABLE</h1>
				 	<br><br><br>
					<p class="text-center">
						<a href="<?=base_url();?>examination/filter_report_cards" class="btn default red-stripe">
							Back
						</a>
						<a href="<?=base_url();?>examination/generate_report_cards/<?=$examination_id;?>/<?=$grade_level_id;?>" class="btn default green-stripe">
							Generate Report Cards
						</a>
						
					</p>
				</div>
			<?php }?>
			</div>


	   <?php $this->load->view('footer');?>
			