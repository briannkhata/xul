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
										<a class="btn default" href="<?=base_url();?>book/filter_books">
												Back </a>

												<button class="btn default" onclick="window.print()">
												Print </button>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table well">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Grade Level</th>
								<th>Publisher</th>
								<th>Missing</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($books as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td> <?=$row['title'];?><br>
									ISBN : <?=$row['isbn'];?><br>
									Edition : <?=$row['edition'];?><br>
									Instock : <span class="badge"><?=number_format($row['instock'],1);?></span>

								</td>
								<td>
								Category : <?=$this->M_book_category->get_book_category($row['book_category_id']);?> <br>
								 Subject : <?=$this->M_subject->get_subject($row['subject_id']);?><br>
								   Class : <?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?><br>
								   Rented : <span class="badge">
								   	<?=count($this->M_book_rentout->get_book_returns_by_book_id($row['book_id']));?></span>

								</td>
								
								<td> 
									Date  : <?=date('d F Y',strtotime($row['date_published']));?><br>
								   Place  : <?=$row['place_published'];?><br>
								  	     Publisher : <?=$row['publisher'];?>
								  </td>
								<td>
								<span class="badge">
									<?=count($this->M_book->get_missing_books_by_id($row['book_id']));?>
								</span>

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
