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
												<a href="<?=base_url();?>grade_level/read" class="btn default">
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
								<th>Grade Level</th>
								<th>Numeric</th>
								<th>Grade Group</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_grade_level->get_grade_levels() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['grade_level'];?></td>
								<td><?=$row['numeric'];?></td>
								<td><?=$this->M_grade_group->get_grade_group($row['grade_group_id']);?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>grade_level/read/<?=$row['grade_level_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>grade_level/delete/<?=$row['grade_level_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>

								
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
