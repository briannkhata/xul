<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
						   <div class="caption">
								<?=$page_title;?>
							</div>
						</div>
						
						<div class="portlet-body">
							<table class="table well">
							<thead>
								<tr>
									<th colspan="4" align="center">Books Lost</th>
								</tr>
							<tr>
								<th>Book Title</th>
								<th>Date Lost</th>
								<th>Grade Level</th>
								<th>Replaced</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_missing->get_book_missings_by_user_id($user_id) as $row):?>
							<tr>
								<td><?=$this->M_book->get_title($row['book_id']);?><br>
									ISBN : <?=$this->M_book->get_isbn($row['book_id']);?></td>
								<td><?=date('d F Y',strtotime($row['lost_date']));?></td>
								<td> 
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
								
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
							<br>
							
							<table class="table well">
							<thead>
								<tr>
									<th colspan="5">Books Borrowed</th>
								</tr>
							<tr>
								<th>Book Title</th>
								<th>Date Rented</th>
								<th>Return Date</th>
								<th>Grade Level</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_rentout->get_book_rentouts_by_user_id($user_id) as $row):?>
							<tr>
								<td><?=$this->M_book->get_title($row['book_id']);?></td>
								<td><?=date('d F Y h:s',strtotime($row['borrow_date']));?></td>
								<td><?=date('d F Y h:s',strtotime($row['due_date']));?></td>
								<td> 
								   <?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
								</td>
								<td>
								  	<?php if($row['status'] == 0){?>
								  		<span class="label label-danger">not returned</span>
								  	<?php } else{?>
								  		<span class="label label-success">returned</span><br>
								  		- <?=date('d F-Y h:s',strtotime($row['date_returned']));?> fine 
								  		 <?=number_format($row['fine'],2);?>
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

			
