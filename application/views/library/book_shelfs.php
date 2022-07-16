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
												<a href="<?=base_url();?>book_shelf/read" class="btn default green-stripe">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Book shelf</th>
								<th>Code</th>
								<th>Books</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_shelf->get_book_shelfs() as $row):?>
							<tr>
								<td><?=$row['book_shelf'];?></td>
								<td><?=$row['code'];?></td>
								<td><?=count($this->M_book_shelf->get_books_by_shelf_id($row['book_shelf_id']));?>
									</td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>book_shelf/read/<?=$row['book_shelf_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>book_shelf/delete/<?=$row['book_shelf_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
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
