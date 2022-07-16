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
							<i class="fa fa-building"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_hostel->get_hostels());?>
							</div>
							<div class="desc">
								 Total Hostels
							</div>
						</div>
						<a class="more" href="<?=base_url();?>hostel">
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
						<a class="more" href="#">
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

			<?php foreach($this->M_hostel->get_hostels() as $row){?>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
					<?=count($this->M_hostel->get_student_hostels2($row['hostel_id'],$academic_year_id));?>
							</div>
							<div class="desc">
								<?=$row['name'];?>
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<?php }?>

			
			</div>


			<div class="row">
				<?php foreach($this->M_hostel_type->get_hostel_types() as $row){?>
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-circle"></i>
						</div>
						<div class="details">
							<div class="number">
								<?=count($this->M_hostel->get_hostel_by_type($row['hostel_type_id']));?>
							</div>
							<div class="desc">
								<?=$row['hostel_type'];?> hostels
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<?php }?>
			</div>

		

		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('footer');?>
