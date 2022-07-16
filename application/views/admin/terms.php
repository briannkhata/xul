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
												<a href="<?=base_url();?>term/read" class="btn default green-stripe">
											Add New
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Term</th>
								<th>Starts</th>
								<th>Ends</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_term->get_terms() as $row):?>
							<tr>
								<td><?=$row['term'];?> <br>
									<span class="label label-success">
										<?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></span>
									</td>
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
										<a href="<?=base_url();?>term/read/<?=$row['term_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>term/delete/<?=$row['term_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

										<?php if ($row['deleted'] == 1){?>
										<a href="<?=base_url();?>term/open/<?=$row['term_id'];?>" class="btn btn-sm default blue-stripe"> activate</a> 
									<?php } else {?>
										<a href="<?=base_url();?>term/close/<?=$row['term_id'];?>" class="btn btn-sm default red-stripe"> close</a>
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
