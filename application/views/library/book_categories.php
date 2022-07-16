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
												<a href="<?=base_url();?>book_category/read" class="btn default green-stripe">
											Add New
											</a>

									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped">
							<thead>
							<tr>
								<th>Book Category</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($this->M_book_category->get_book_categories() as $row):?>
							<tr>
								<td><?=$row['book_category'];?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>book_category/read/<?=$row['book_category_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>book_category/delete/<?=$row['book_category_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
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