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
												<a href="<?=base_url();?>lab_item/filter_lab_items" class="btn default">
											Back
											</a>

												<a href="#" onclick="window.print();" class="btn default">
											Print
											</a>



									</div>
									
								</div>
							</div>
							<hr>
							<table class="table">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Code</th>
								<th>Item</th>
								<th>Category</th>
								<th>Location</th>
								<th>Qty</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($lab_items as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['item_code'];?></td>
								<td><?=$row['lab_item'];?></td>
								<td><?=$this->M_lab_type->get_lab_type($row['lab_type_id']);?></td>
								<td><?=$this->M_lab_shelf->get_lab_shelf($row['lab_shelf_id']);?><br>
									<?=$this->M_lab_shelf->get_code($row['lab_shelf_id']);?>
								</td>
								<td><?=$row['qty'];?></td>
								
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
