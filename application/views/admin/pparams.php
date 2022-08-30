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
									
									<a href="<?=base_url();?>pparam/read" class="btn default green-stripe">
											Add New
</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Title</th>
								<th>Staff</th>
								<th>Company</th>
								<th>Active</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_pparam->get_params() as $row):?>
							<tr>
								<td><?=strtoupper($row['title']);?></td>
								<td><?=number_format($row['staff'],2);?> %</td>
								<td><?=number_format($row['company'],2);?> %</td>
								<td>
									<?php if($row['active'] == 1):?>
										Active
									<?php else:?>
										Not Active
									<?php endif;?>
								</td>				
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>pparam/read/<?=$row['pparam_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										<a href="<?=base_url();?>pparam/delete/<?=$row['pparam_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
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
