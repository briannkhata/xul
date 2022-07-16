<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
						
						</div>
						<?php
						  $term_id = $this->M_assesment->get_term_id($assesment_id);
						  $subject_id = $this->M_assesment->get_subject_id($assesment_id);
						  $subject = $this->M_subject->get_subject($subject_id);
						  $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
						  $assesment_type_id = $this->M_assesment->get_assesment_type_id($assesment_id);
						  $title = $this->M_assesment->get_title($assesment_id);
						?>
						<div class="portlet-body">
							<table class="table well">
								<tr>
									<td colspan="2"><?=$title;?> | 
									<?=$this->M_assesment_type->get_assesment_type($assesment_type_id);?>
									      | <?=$subject;?></td>
								</tr>
								<tr>
									<td>Total Marks</td>
									<td><?=$this->M_assesment->get_total_marks($assesment_id);?> %</td>
								</tr>
								<tr>
									<td>Assigned By </td>
									<td><?=$this->M_user->get_user($this->M_assesment->get_added_by($assesment_id));?></td>
								</tr>
								<tr>
									<td>Term </td>
									<td><?=$this->M_term->get_term($term_id);?></td>
								</tr>
								

								<tr>
									<td>Date Assigned </td>
									<td><?=$this->M_assesment->get_date_assigned($assesment_id);?> |
										<?=$this->M_assesment->get_due_date($assesment_id);?></td>
								</tr>

								<tr>
									<td>Class </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
							</table>
						<form action="#" id="formMarksASS">
							<table class="table table-bordered">
							<thead>
							<tr>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Mark</th>
								<th>Rank</th>
								<th>Grade</th>
								<th>Remark</th>
							</tr>
							</thead>
							<tbody>

			<?php foreach ($this->M_assesment->get_assesment_marks($grade_level_id,$assesment_id) as $row):?>
							<tr>
								<td><?=strtoupper($this->M_user->get_user($row['user_id']));?></td>
								<td><?=$this->M_user->get_reg_no($row['user_id']);?></td> 
								<td><?=ucfirst($this->M_user->get_gender($row['user_id']));?></td>
								<td><?=$row['mark_obtained'];?></td>
								<td><?=$this->M_assesment->get_rank($row['user_id'],$assesment_id,$grade_level_id);?>
									
								</td>
								<td><?=$this->M_assesment->get_grade_point($grade_group_id,$row['mark_obtained']);?></td>
								<td><?=$this->M_assesment->get_grade_remark($row['mark_obtained']);?></td>
								
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center>
								<a class="btn default blue-stripe" onclick="window.print()">Print</a>
						   <a href="<?=base_url();?>assesment/filter_assesment" class="btn default">Back</a>
										
							</center>
							</form>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>

			