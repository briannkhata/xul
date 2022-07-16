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
												<a href="<?=base_url();?>hostel/read" class="btn default green-stripe">
											Add New
											</a>


											<a href="#"  onclick="reset_hostels()" class="btn default">
											Reset Hostel
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Name</th>
								<th>Capacity</th>
								<th>Students</th>
								<th>Location</th>
								<th>Hostel type</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
								$academic_year_id = $this->M_academic_year->get_active_academic_year();
								foreach ($this->M_hostel->get_hostels() as $row):?>
							<tr>
								<td><?=$row['name'];?></td>
								<td><?=$row['capacity'];?></td>
						<td><?=count($this->M_hostel->get_student_hostels2($row['hostel_id'],$academic_year_id));?></td>
								<td><?=$row['location'];?></td>
								<td><?=$this->M_hostel_type->get_hostel_type($row['hostel_type_id']);?></td>

								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>hostel/read/<?=$row['hostel_id'];?>" class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>hostel/delete/<?=$row['hostel_id'];?>" class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>

								
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
