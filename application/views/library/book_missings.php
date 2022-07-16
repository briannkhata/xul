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
										<a href="<?=base_url();?>book_missing/read" class="btn default green-stripe">
											Add New
											</a>
											<a href="<?=base_url();?>book_missing/filter1" class="btn default">
											Filter
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Book Title</th>
								<th>Date Lost</th>
								<th>Borrower</th>
								<th>Replaced</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_missing->get_book_missings() as $row):?>
							<tr>
								<td><?=$this->M_book->get_title($row['book_id']);?><br>
									ISBN : <?=$this->M_book->get_isbn($row['book_id']);?></td>
								<td><?=date('d F Y',strtotime($row['lost_date']));?></td>
								<td> 
									<?=$this->M_user->get_user($row['user_id']);?><br>
								   Grade Level : <?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
								</td>
								<td>
								  	<?php if($row['replaced'] == 0){?>
								  		<span class="label label-danger">not replaced</span>
								  	<?php } else{?>
								  		<span class="label label-success">replaced</span><br>
								  		  <?=date('d F-Y h:s',strtotime($row['date_replaced']));?>
								  	<?php }?>
								  </td>
								<td>
									<div class="btn-group">
									  <?php if($row['replaced'] == 0){?>
										<a href="<?=base_url();?>book_missing/replace/<?=$row['book_missing_id'];?>" class="btn btn-sm default blue-stripe">replace</a>
										<a href="<?=base_url();?>book_missing/delete/<?=$row['book_missing_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

									<?php } else {}?>
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
