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
									
									<a href="<?=base_url();?>parento/read" class="btn default">
											Add New
											</a>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Sibling</th>
								<th>Contacts</th>
								<th>Address</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_user->get_parents() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=strtoupper($row['name']);?><br>
									<?=$row['relation'];?></td>
								<td><?=$this->M_user->get_user($row['child_id']);?>
									<br>
									<?=$this->M_grade_level->get_grade_level($this->M_user->get_grade_level_id($row['child_id']));?>
								</td>
								<td><?=$row['phone'];?> <br> <?=$row['email'];?></td>
								<td><?=$row['physical_address'];?><br>
								    <?=$row['postal_address'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>parento/read/<?=$row['user_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>parento/delete/<?=$row['user_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>
								
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
