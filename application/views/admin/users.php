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
								
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Name</th>
								<th>National Id</th>
								<th>Phone</th>
								<th>Email</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							foreach ($this->M_user->get_users() as $row):?>
							<tr>
								<td><?=strtoupper($row['name']);?> - <?=$row['gender'];?></td>
								<td><?=$row['national_id'];?></td>
								<td><?=$row['phone1'];?></td>
								<td><?=$row['email1'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>user/read/<?=$row['user_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										<a href="<?=base_url();?>user/delete/<?=$row['user_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
										<a href="<?=base_url();?>user/View/<?=$row['user_id'];?>" class="btn btn-sm default blue-stripe">View</a>

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
