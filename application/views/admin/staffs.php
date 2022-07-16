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
									
									<a href="<?=base_url();?>user/read2" class="btn default green-stripe">
											Add New <i class="fa fa-plus-circle"></i>
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Name</th>
								<th>Staff type</th>
								<th>Contacts</th>
								<th>Address</th>
								<th>Department</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							foreach ($this->M_user->get_staffs() as $row):?>
							<tr>
								<td><?=strtoupper($row['name']);?> - <?=$row['gender'];?></td>
								<td><?=$this->M_staff_type->get_staff_type($row['staff_type_id']);?></td>
								<td><?=$row['email'];?> <br> <?=$row['phone'];?></td>
								<td><?=$row['physical_address'];?><br>
								    <?=$row['postal_address'];?></td>
								<td><?=$this->M_department->get_department($row['department_id']);?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>user/read/<?=$row['user_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>user/delete/<?=$row['user_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a><br>

								
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
