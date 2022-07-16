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
												<a href="<?=base_url();?>scholarship_type/read" class="btn default">
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
								<th>Scholarship type</th>
								<th>Description</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php

							 $count = 1;
							 foreach ($this->M_scholarship_type->get_scholarship_types() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['scholarship_type'];?></td>
								<td><?=$row['description'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>scholarship_type/read/<?=$row['scholarship_type_id'];?>" class="btn btn-sm default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>scholarship_type/delete/<?=$row['scholarship_type_id'];?>" class="btn btn-sm default"><i class="fa fa-times-circle"></i></a>

								
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
