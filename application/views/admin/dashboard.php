		<?php $this->load->view('header');?>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
	<?php

	$academic_year_id = $this->M_academic_year->get_active_academic_year();
	$term_id = $this->M_term->get_active_term();
	$female = $this->M_user->get_female_students($academic_year_id);
	$male = $this->M_user->get_male_students($academic_year_id);
	?>



			<div class="row">
			
				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($female + $male);?>
							</div>
							<div class="desc">
								 Total Students
							</div>
						</div>
						<a class="more" href="<?=base_url();?>user/students">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($female);?>
							</div>
							<div class="desc">
								Female Students
							</div>
						</div>
						<a class="more" href="<?=base_url();?>user/female">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($male);?>
							</div>
							<div class="desc">
								Male Students
							</div>
						</div>
						<a class="more" href="<?=base_url();?>user/male">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

			<?php foreach($this->M_grade_level->get_grade_levels() as $row){?>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_user->get_students_by_class($row['grade_level_id']));?>
							</div>
							<div class="desc">
								<?=$row['grade_level'];?> students
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<?php }?>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_user->get_staffs());?>
							</div>
							<div class="desc">
								 Staffs
							</div>
						</div>
						<a class="more" href="<?=base_url();?>user/staffs">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			
			
			</div>


			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-circle"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php //=count($this->M_circle->get_next_waters());?>
							</div>
							<div class="desc">
								Orphans
							</div>
						</div>
						<a class="more" href="<?=base_url();?>member/next">
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

		

		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('footer');?>
