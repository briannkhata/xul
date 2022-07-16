<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<?=$page_title;?>
							</div>
						
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<center>
											<a href="<?=base_url();?>member/read" class="btn default green-stripe">
											Add New <i class="fa fa-plus"></i>
											</a>
										</center>
								</div>
							</div>
							<hr>
							<table class="table table-striped">
							<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_member->get_admins() as $row):?>
							<tr>
								<td><i class="fa fa-user"></i> <b><?=strtoupper($row['name']);?></b></td>
								<td><?=$row['email'];?></td>
								<td><?=$row['phone'];?></td>
								<td><?=$row['address'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>member/read/<?=$row['member_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>member/delete/<?=$row['member_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

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
