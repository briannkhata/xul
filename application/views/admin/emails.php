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
										<a href="<?=base_url();?>email/read" class="btn default">
											Compose
											</a>

											<a href="<?=base_url();?>email/bulk" class="btn default">
											Send Bulk
											</a>

									</div>
									
								</div>
							</div>
							<br>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Receiver</th>
								<th>Subject</th>
								<th>Message</th>
								<th>Sender</th>
								<th>Date Sent</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->db->get('emails')->result_array() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['receiver_email'];?> | <?=$row['role'];?></td>
								<td><?=$row['subject'];?></td>
								<td><?=$row['message'];?></td>
								<td><?=$row['sender_email'];?></td>
								<td><?=date('d M Y h:m',strtotime($row['date_sent']));?></td>
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
