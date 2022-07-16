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
											<a href="<?=base_url();?>assesment/read" class="btn default">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Title</th>
								<th>Dates</th>
								<th>Class</th>
								<th>Term</th>
								<th>Added by</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_assesment->get_assesments() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['title'];?><br>
								   <small>
								   	<?=$this->M_assesment_type->get_assesment_type($row['assesment_type_id']);?>
									- <?=$this->M_subject->get_subject($row['subject_id']);?></small>
								</td>
								<td><?=date('d M-Y',strtotime($row['date_assigned']));?> | <?=date('d M-Y',strtotime($row['due_date']));?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
								     (<?=$row['total_marks'];?> %)</td>
								<td><?=$this->M_term->get_term($row['term_id']);?><br>
									<small>
										<?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></small></td>
								<td><?=$this->M_user->get_user($row['added_by']);?></td>

								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>assesment/read/<?=$row['assesment_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>assesment/delete/<?=$row['assesment_id'];?>/<?=$row['grade_level_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>				

										<a href="<?=base_url();?>assesment/assesment_marksheet2/<?=$row['assesment_id'];?>/<?=$row['grade_level_id'];?>" class="btn default">
											Marks</a>							

								
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
