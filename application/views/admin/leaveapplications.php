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
								<th>Staff</th>
								<th>Days <br>
								Applied | Approved</th>
								<th>Application Dates <br>
								  Applied | Approved</th>
								<th>Leave Dates<br>
								 Starts On | Ends On</th>
								<th>Leave Type</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_leaveapplication->get_leaveapplications() as $row):?>
							<tr>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$row['days_applied'];?> | <?=$row['days_approved'];?><br>
									<?=$this->M_user->get_user($row['approved_by']);?></td>
								<td><?=date('d M Y',strtotime($row['date_applied']));?> | <?=date('d M Y',strtotime($row['date_approved']));?></td>
								<td><?=date('d M Y',strtotime($row['start_date']));?> |  <?=date('d M Y',strtotime($row['end_date']));?></td>
								<td><?=$this->M_leavetype->get_leavetype($row['leavetype_id']);?></td>
								<td>
								<div class="btn-group">
										<a href="<?=base_url();?>leaveapplication/read/<?=$row['leaveapplication_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										<a href="<?=base_url();?>leaveapplication/approveLeave/<?=$row['leaveapplication_id'];?>" class="btn btn-sm default blue-stripe">Approve</a>
										<a href="<?=base_url();?>leaveapplication/delete/<?=$row['leaveapplication_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
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
