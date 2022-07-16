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
										<a href="<?=base_url();?>book_rentout/read" class="btn default green-stripe">
											Lend Book
											</a>

											<a href="<?=base_url();?>book/filter1" class="btn default blue-stripe">
											Missing Books
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Borrower</th>
								<th>Book</th>
								<th>Dates</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
								$count = 1;
							foreach ($this->M_book_rentout->get_book_rentouts() as $row):
								$grade_level_id = $this->M_book->get_grade_level_id($row['book_id']);
								$role = $this->M_user->get_role($row['user_id']);

								?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?> (<?=$role;?>)</td>
								<td><b><?=$this->M_book->get_title($row['book_id']);?></b> - <?=$this->M_grade_level->get_grade_level($grade_level_id);?>
								</td>
								<td><?=date('d M Y',strtotime($row['borrow_date']));?> to <?=date('d M Y',strtotime($row['due_date']));?></td>
								
								<td>
								  	<?php if($row['status'] == 1){?>
								  		<span class="label label-info">returned ON <?=date('d M Y h:s',strtotime($row['date_returned']));?></span><br>
								  		 FINED 
								  		 <?=number_format($row['fine'],2);?> 
								  	<?php } elseif($row['status'] == 2 || $row['status'] == 0){?>
								  		<span class="label label-danger">not returned</span>
								  	
								  	<?php } elseif($row['status'] == 3){?>
								  		<span class="label label-warning">lost ON <?=date('d M Y h:s',strtotime($row['date_lost']));?></span><br>FINED 
								  		 <?=number_format($row['fine'],2);?> 
								  	<?php }else{

								  	}?>
								  </td>
								<td>
									<div class="btn-group">
									  <?php if($row['status'] == 1){?>
									  <?php } elseif($row['status'] == 2 || $row['status'] == 0){?>
										<a href="<?=base_url();?>book_rentout/return_book/<?=$row['book_rentout_id'];?>" class="btn btn-sm default blue-stripe">return</a>
										<a href="<?=base_url();?>book_rentout/delete/<?=$row['book_rentout_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
									 <?php } elseif($row['status'] == 3){?>
								  		<a href="<?=base_url();?>book_rentout/replace_book/<?=$row['book_rentout_id'];?>" class="btn btn-sm default green-stripe">Replace</a>
								  	<?php }else{

								  	}?>
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
