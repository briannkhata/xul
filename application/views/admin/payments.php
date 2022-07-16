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
											<div class="btn-group">
												<a href="<?=base_url();?>payment/filter1" class="btn default">
											Filter
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
								<th>Amount</th>
								<th>Date Paid</th>
								<th>Term / Academic Year</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php 
								$count = 1;
							foreach ($this->M_payment->get_payments() as $row):	
								$grade_level_id = $this->M_user->get_grade_level_id($row['user_id']);?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?><br>
								<?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								<td><?=$this->M_user->get_reg_no($row['user_id']);?></td>
								<td><?=number_format($row['amount_paid'],2);?>   ( <?=$this->M_charge_type->get_charge_type($row['charge_type_id']);?> )
								 </td>
								<td><?=date('d M Y h:m:i',strtotime($row['date_paid']));?></td>
								<td><?=$this->M_term->get_term($row['term_id']);?> of 
								    <?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?></td>
								<td>
									<div class="btn-group">
				
										<a href="<?=base_url();?>payment/delete/<?=$row['payment_id'];?>/<?=$row['charge_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i>
										<a href="<?=base_url();?>payment/receipt/<?=$row['payment_id'];?>" class="btn btn-sm default">Receipt</a>


									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			
			<?php $this->load->view('footer');?>
