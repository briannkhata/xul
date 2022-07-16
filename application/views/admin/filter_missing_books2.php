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
										
											<a href="<?=base_url();?>book/filter1" class="btn default">
											Back </a>

											<a href="#" class="btn default" onclick="window.print()">
											Print </a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table well">
							<thead>
							<tr>
								<th>#</th>
								<th>ISBN</th>
								<th>Book Title</th>
								<th>Date Lost</th>
								<th>Borrower</th>
								<th>Class</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($missing as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$this->M_book->get_isbn($row['book_id']);?></td>
								<td><?=$this->M_book->get_title($row['book_id']);?></td>
								<td><?=date('d M Y',strtotime($row['date_lost']));?></td>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?></td>
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
