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
										
										<a href="<?=base_url();?>book/filter_student_books" class="btn default">
											Back
											</a>

											<a href="#" class="btn default" onclick="window.print()">
											Print
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table well">
							<thead>
								<tr>
									<th colspan="4" align="center">Lost</th>
								</tr>
							<tr>
								<th>ISBN</th>
								<th>Title</th>
								<th>Date Lost</th>
								<th>CLass</th>
								<th>Fine</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book->get_missing_books_by_user($user_id) as $row):?>
							<tr>
								<td><?=$this->M_book->get_isbn($row['book_id']);?></td>
								<td><?=$this->M_book->get_title($row['book_id']);?></td>
								<td><?=date('d M Y',strtotime($row['date_lost']));?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?></td>
								<td><?=number_format($this->M_book->get_price($row['book_id']),2);?></td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
							<br>
							
							<table class="table well">
							<thead>
								<tr>
									<th colspan="5">Rented</th>
								</tr>
							<tr>
								<th>Book Title</th>
								<th>Date Rented</th>
								<th>Return Date</th>
								<th>Grade Level</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_rentout->get_book_rentouts_by_user_id($user_id) as $row):?>
							<tr>
								<td><?=$this->M_book->get_title($row['book_id']);?></td>
								<td><?=date('d M Y h:s',strtotime($row['borrow_date']));?></td>
								<td><?=date('d M Y h:s',strtotime($row['due_date']));?></td>
								<td> 
								   <?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>
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

			
