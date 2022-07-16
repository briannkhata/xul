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
												<a href="<?=base_url();?>responsibility/read" class="btn default green-stripe">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Name</th>
								<th>Responsibility</th>
								<th>Academic Year</th>
								<th>Date Assigned</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_responsibility->get_responsibilities() as $row):?>
							<tr>

								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><b><?=$row['responsibility'];?></b><br>
								    <?=$row['description'];?></td>
								<td><?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								<td><?=$row['date_assigned'];?></td>

								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>responsibility/read/<?=$row['responsibility_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>responsibility/delete/<?=$row['responsibility_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
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
