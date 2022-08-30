		<?php $this->load->view('header');?>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
	<?php

	/*$academic_year_id = $this->M_academic_year->get_active_academic_year();
	$term_id = $this->M_term->get_active_term();
	$female = $this->M_user->get_female_students($academic_year_id);
	$male = $this->M_user->get_male_students($academic_year_id);*/
	?>



			<div class="row">
			
				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_user->get_users_by_gender('Female'));?>
							</div>
							<div class="desc">
								 Female Staff
							</div>
						</div>
						<a class="more" href="<?=base_url();?>User/female">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
							<?=count($this->M_user->get_users_by_gender('Male'));?>
							</div>
							<div class="desc">
								Male Staff
							</div>
						</div>
						<a class="more" href="<?=base_url();?>User/male">
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
								<?=count($this->M_department->get_departments());?>
							</div>
							<div class="desc">
								Departments
							</div>
						</div>
						<a class="more" href="<?=base_url();?>Department">
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
							<?=count($this->M_branch->get_branches());?>
							</div>
							<div class="desc">
								 Branches
							</div>
						</div>
						<a class="more" href="<?=base_url();?>Branch">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			
			
			</div>


			<div class="row">
				
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								00
							</div>
							<div class="desc">
								 Employee Present
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/past">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>


				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								00
							</div>
							<div class="desc">
								 Employee Absent
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/past">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								00
							</div>
							<div class="desc">
								 Late Comers
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/past">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>

		

		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('footer');?>
