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
									
									<a href="#" class="btn default" onclick="window.print()">
											Print</a>

									<a href="<?=base_url();?>user/graduates" class="btn default">
											Back</a>

									
									
								</div>
							</div>
							<br><br>
							<table class="table table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Reg Number</th>
								<th>Gender</th>
								<th>Contacts</th>
								<th>Address</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_user->get_graduates($academic_year_id) as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=strtoupper($row['name']);?></td>
								<td><b><?=$row['reg_no'];?></b></td>
								<td><?=$row['gender'];?></td>
								<td><?=$row['email'];?> | <?=$row['phone'];?></td>
								<td><?=$row['postal_address'];?></td>
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
