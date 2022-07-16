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
								<!--div class="row">
									<div class="col-md-12">
											<center>
												<a href="<?=base_url();?>sms/read" class="btn default green-stripe">
											Create Sms
											</a>

										</center>
									</div>
									
								</div-->
							</div>
							<br>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Receiver</th>
								<th>Sms Body</th>
								<th>Sender</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_sms->get_sms() as $row):?>
							<tr>
								<td><b><?=$this->M_user->get_user($row['receiver']);?> 
								(<?=$this->M_user->get_role($row['receiver']);?>)</b>
									<br><?=$row['sending_phone'];?>
								</td>
								<td><?=$row['sms_body'];?><br>
								    <?=date('d F Y h:m',strtotime($row['date_sent']));?></td>
								<td><?=$row['sending_phone'];?></td>
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
