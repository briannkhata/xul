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
									<a href="<?=base_url();?>expense/read" class="btn default green-stripe">
											Add New
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Expense type</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Added by</th>
								<th>Comment</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_expense->get_expenses() as $row):?>
							<tr>
								<td><?=$this->M_expense_type->get_expense_type($row['expense_type_id']);?></td>
								<td><?=number_format($row['amount'],2);?></td>
								<td><?=date('d F Y',strtotime($row['expense_date']));?></td>
								<td><?=$this->M_user->get_user($row['added_by']);?></td>
								<td><?=$row['comment'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>expense/read/<?=$row['expense_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>expense/delete/<?=$row['expense_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
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
