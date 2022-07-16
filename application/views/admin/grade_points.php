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
												<a href="<?=base_url();?>grade_point/read" class="btn default">
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
								<th>Grade</th>
								<th>Name</th>
								<th>Mark from</th>
								<th>Mark Upto</th>
								<th>Grade Group</th>
								<th>Comment</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_grade_point->get_grade_points() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['grade_point'];?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['mark_from'];?></td>
								<td><?=$row['mark_upto'];?></td>
								<td><?=$this->M_grade_group->get_grade_group($row['grade_group_id']);?></td>
								<td><?=$row['comment'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>grade_point/read/<?=$row['grade_point_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>grade_point/delete/<?=$row['grade_point_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>

								
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
