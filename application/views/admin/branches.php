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
												<a href="<?=base_url();?>branch/read" class="btn default green-stripe">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Branch</th>
								<th>Rate</th>
								<th>Address</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_branch->get_branches() as $row):?>
							<tr>
								<td><?=$row['name'];?></td>
								<td><?=$row['rate'];?></td>
								<td><?=$row['address'];?></td>
							
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>branch/read/<?=$row['branch_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										<a href="<?=base_url();?>branch/delete/<?=$row['branch_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
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
