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
												<a href="<?=base_url();?>academic_year/read" class="btn default green-stripe">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Academic Year</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_academic_year->get_academic_years() as $row):?>
							<tr>
								<td><?=$row['academic_year'];?></td>
								<td><?=date('d F Y',strtotime($row['starts']));?></td>
								<td><?=date('d F Y',strtotime($row['ends']));?></td>
								<td>
									<?php if($row['deleted'] == 1){?>
										<span class="label label-danger">closed</span>
									<?php } else {?>
										<span class="label label-info">active</span>
									<?php }?>

								</td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>academic_year/read/<?=$row['academic_year_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										
										<?php if ($row['deleted'] == 1){?>
										<a href="<?=base_url();?>academic_year/open/<?=$row['academic_year_id'];?>" class="btn btn-sm default blue-stripe"> activate</a> 
									<?php } else {?>
										<a href="<?=base_url();?>academic_year/close/<?=$row['academic_year_id'];?>" class="btn btn-sm default red-stripe"> close</a>
										<a href="<?=base_url();?>academic_year/delete/<?=$row['academic_year_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

									<?php }
									?>			
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
