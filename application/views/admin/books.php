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
												<a href="<?=base_url();?>book/read" class="btn default green-stripe">
											Add New
											</a>

											<a href="<?=base_url();?>book_rentout/read" class="btn default green-stripe">
											Lend Book
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Title</th>
								<th>Grade Level</th>
								<th>Publisher</th>
								<th>Added by</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book->get_books() as $row):?>
							<tr>
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
									Date : <?=date('d F Y',strtotime($row['date_published']));?><br>
								   Place : <?=$row['place_published'];?><br>
								  	     Publisher : <?=$row['publisher'];?>
								  </td>
								<td>
								Location : <?=$this->M_book_shelf->get_book_shelf($row['book_shelf_id']);?> | 
								<?=$this->M_book_shelf->get_code($row['book_shelf_id']);?>
								<br>

								Missing : <span class="badge">
									<?=count($this->M_book->get_missing_books_by_id($row['book_id']));?>
								</span>

							</td>

								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>book/read/<?=$row['book_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>book/delete/<?=$row['book_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a><br><br>

										<a href="<?=base_url();?>book/receive/<?=$row['book_id'];?>" class="btn btn-sm default blue-stripe">receive</a>
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
