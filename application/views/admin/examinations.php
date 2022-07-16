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
												<a href="<?=base_url();?>examination/read" class="btn default">
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
								<th>Examination Session</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Academic Session</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_examination->get_examinations() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['examination'];?></td>
								<td><?=date('d F Y',strtotime($row['starts']));?></td>
								<td><?=date('d F Y',strtotime($row['ends']));?></td>
								<td><?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>examination/read/<?=$row['examination_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>examination/delete/<?=$row['examination_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a><br>


								
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
