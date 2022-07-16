		<?php $this->load->view('header');?>
			<div class="row">
			
				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_book->get_books());?>
							</div>
							<div class="desc">
								 Total Books
							</div>
						</div>
						<a class="more" href="<?=base_url();?>book">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_book_rentout->get_book_rentouts());?>
							</div>
							<div class="desc">
								Rented
							</div>
						</div>
						<a class="more" href="<?=base_url();?>book_rentout">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_book->get_missing_books());?>
							</div>
							<div class="desc">
								 Lost
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			
			
			</div>


			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-circle"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_book_category->get_book_categories());?>
							</div>
							<div class="desc">
								Categories
							</div>
						</div>
						<a class="more" href="<?=base_url();?>book_category">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<!-- class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php//=count($this->M_circle->get_past_waters());?>
							</div>
							<div class="desc">
								 Past Waters
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/past">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div-->
			</div>


			<div class="row">
				<?php foreach($this->M_grade_level->get_grade_levels() as $row){?>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-book"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_book->get_books_by_class($row['grade_level_id']));?>
							</div>
							<div class="desc">
								<?=$row['grade_level'];?> Books
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<?php }?>
				<!-- class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php//=count($this->M_circle->get_past_waters());?>
							</div>
							<div class="desc">
								 Past Waters
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/past">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div-->
			</div>


		

		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('footer');?>
