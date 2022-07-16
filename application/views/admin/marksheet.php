<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
						
						</div>
						<?php
						  $academic_year_id = $this->M_examination->get_academic_year_id($examination_id);
						  //$subject_id = $this->M_examination_paper->get_subject_id($examination_paper_id);
						  //$subject = $this->M_subject->get_subject($subject_id);
						  $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);

						?>
						<div class="portlet-body">
							<table class="table well">
								<tr>
									<td>Academic Year </td>
									<td><?=$this->M_academic_year->get_academic_year($academic_year_id);?></td>
								</tr>
								<tr>
									<td>Examination </td>
									<td><?=$this->M_examination->get_examination($examination_id);?></td>
								</tr>

								

								<tr>
									<td>Class </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
							</table>
						<form action="" method="post" id="formMarks">
							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th>Name</th>
								<?php 
	foreach ($this->M_examination->get_examination_papers_marks10000($examination_id,$grade_level_id) as $value) {?>
								<th><?=$this->M_subject->get_subject($value['subject_id']);?></th>

								<?php }?>
								
							</tr>
							</thead>
							<tbody>

							<?php foreach ($this->M_user->get_students_by_class($grade_level_id) as $row){?>
							<tr>
								<td><?=$row['name'];?>  - <?=$row['gender'];?></td>

								</td>
<?php foreach($this->M_examination->get_examination_papers_marks100000($examination_id,$grade_level_id,$row['user_id']) as $ham) { ?>
									<td width="10"><?=$ham['mark_obtained'];?></td>
								<?php }?>
								
							
								

								
							</tr>
							<?php } ?>
							</tbody>
							
							</table>
							<center class="well">
								
								<button name="button" class="btn default blue-stripe" onclick="window.print()">Print</button>
						   <a href="<?=base_url();?>examination/filter_marksheet" class="btn default red-stripe">Back</a>
										
							</center>
							</form>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>

