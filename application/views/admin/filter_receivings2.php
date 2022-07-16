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
												<a href="<?=base_url();?>book/filter_receivings1" class="btn default">
											Back
											</a>
											<a href="#" class="btn default" onclick="window.print()">
											Print
											</a>
									</div>
									
								</div>
							</div>
							<hr>
								
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Title</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total Cost</th>
								<th>Arrival Date</th>
								<th>Comment</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book->get_filtered_receivings($arrival_date1,$arrival_date2) as $row):?>
							<tr>
								<td><?=$this->M_book->get_title($row['book_id']);?></td>
								<td><?=number_format($row['quantity'],1);?></td>
								<td><?=number_format($row['price'],2);?></td>
								<td><?=number_format($row['total_cost'],2);?></td>
								<td><?=date('d F Y',strtotime($row['arrival_date']));?></td>
								<td><?=$row['comment'];?></td>
							
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
