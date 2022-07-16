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
									<a href="<?=base_url();?>charge/read" class="btn default blue-stripe">
											Add New
											</a>
											<div class="btn-group">
												

											<a href="<?=base_url();?>charge/invoices1" class="btn default">
											Generate Invoices
											</a>
											<a href="<?=base_url();?>charge/pay_invoices1" class="btn default">
											Pay Invoices
											</a>
										</div>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Charge type</th>
								<th>Amount</th>
								<th>Balance</th>
								<th>Term | Academic Year</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_charge->get_charges() as $row):
								$grade_level_id = $this->M_user->get_grade_level_id($row['user_id']);?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?><br>
								<?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								<td><?=$this->M_user->get_reg_no($row['user_id']);?></td>
								<td><?=$this->M_charge_type->get_charge_type($row['charge_type_id']);?></td>
								<td><?=number_format($row['amount'],2);?></td>
								<td><?=number_format($row['balance'],2);?></td>
								<td><?=$this->M_term->get_term($row['term_id']);?> | 
								    <?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								<td>
										<?php if($row['deleted'] == 1){?>
											<b style="color:blue;">PAID</b>
										<?php } elseif($row['deleted'] == 2) {?>
											<b style="color:green;">BALANCE</b>
										<?php }else{?>
											<b style="color:red;">NOTPAID</b>
										<?php }?>
								</td>
							
								<td>
									<?php if($row['deleted'] == 0){?>
									<div class="btn-group">
										<a href="<?=base_url();?>charge/read/<?=$row['charge_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>charge/delete/<?=$row['charge_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i>
										<br>

										<a href="<?=base_url();?>charge/pay/<?=$row['charge_id'];?>/<?=$row['term_id'];?>/<?=$row['academic_year_id'];?>/<?=$row['user_id'];?>/<?=$row['charge_type_id'];?>" class="btn btn-sm default">Pay</a>
									</div>
									<?php }
									elseif ($row['deleted'] == 2) {?>
										
										<a href="<?=base_url();?>charge/pay/<?=$row['charge_id'];?>/<?=$row['term_id'];?>/<?=$row['academic_year_id'];?>/<?=$row['user_id'];?>/<?=$row['charge_type_id'];?>" class="btn btn-sm default">Pay Balance</a>.
									<?php }?>

								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			
			<?php $this->load->view('footer');?>
