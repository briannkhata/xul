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
										<a class="btn default" href="<?=base_url();?>overtime/add_overtimes1">
											Back
											</a>

										<button class="btn default" type="submit">
											Save Overtimes
										</button>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Name</th>
								<th>Overtime</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_user->get_users_by_branch($branch_id) as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['name'];?></td>
								<td>
									<?php foreach($this->M_overtimetype->get_overtimetypes() as $row){?>
										<?=$row['overtimetype'];?> 
										 <input type="hidden" name="overtimetype_id[]" value="<?=$row['overtimetype_id'];?>">
										 <input type="hidden" name="rate[]" value="<?=$row['rate'];?>">
										 <input type="text" name="hours[]" placeholder="hours">
										
									<?php }?>
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
