<?php $this->load->view('header');?>
	<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
							</div>

						</div>
						<?php
						  $academic_year_id = $this->M_examination->get_academic_year_id($examination_id);
						  $subject = $this->M_subject->get_subject($subject_id);
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
									<td>Subject</td>
									<td><?=$subject;?></td>
								</tr>
								<tr>
									<td>Total Marks</td>
									<td><?=$this->M_examination_paper->get_total_marks($examination_paper_id);?></td>
								</tr>

								<tr>
									<td>Grade Level </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
								<tr>
									<td>Total Attendance</td>
<td><b><?=count($this->M_examination->get_examination_papers_marks100($examination_id,$grade_level_id,$subject_id));?></b> students</td>
								</tr>
							</table>
						<form action="" method="post" id="formMarks">
							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th>Student</th>
								<th>Gender</th>
								<th>Mark</th>
								<th>Rank</th>
								<th>Grade</th>
								<th>Remark</th>
							</tr>
							</thead>
							<tbody>
					
<?php foreach ($this->M_examination->get_examination_papers_marks100($examination_id,$grade_level_id,$subject_id) as $row):?>
							<tr>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$this->M_user->get_gender($row['user_id']);?></td>
								<td><?=$row['mark_obtained'];?></td>
<td><?=$this->M_examination->get_subject_rankMARKSHEET2($row['user_id'],$examination_id,$subject_id,$grade_level_id);?></td>
								<td><?=$this->M_examination->get_grade_point($grade_group_id,$row['mark_obtained']);?></td>
								<td><?=$this->M_examination->get_grade_remark($grade_group_id,$row['mark_obtained']);?></td>
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well no-print">
								
						   <a name="button" class="btn default" onclick="window.print()">Print</a>
						   <a href="<?=base_url();?>examination/filter_examination2" class="btn default">Back</a>
										
							</center>
							</form>
							
					
			</div>
			<?php $this->load->view('footer');?>
			