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
												<a href="<?=base_url();?>lab_item/filter_receivings1" class="btn default">
											Filter By Date
											</a>
									</div>
									
								</div>
							</div>
							<hr>
								
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Code</th>
								<th>Item</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Total Cost</th>
								<th>Arrival Date</th>
								<th>Comment</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_lab_item->get_receivings() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_lab_item->get_item_code($row['lab_item_id']);?></td>
								<td><?=$this->M_lab_item->get_lab_item($row['lab_item_id']);?></td>
								<td><?=number_format($row['quantity'],1);?></td>
								<td><?=number_format($row['price'],2);?></td>
								<td><?=number_format($row['total_cost'],2);?></td>
								<td><?=date('d F Y',strtotime($row['arrival_date']));?></td>
								<td><?=$row['comment'];?></td>
								<td>
									<a href="<?=base_url();?>lab_item/delete_receiving/<?=$row['lab_item_receiving_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>
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
