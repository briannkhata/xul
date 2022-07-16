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
										<a href="<?=base_url();?>scholarship/read" class="btn default ">
											Add New
											</a>
										<a href="<?=base_url();?>scholarship/filter" class="btn default">
											Filter 
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Class</th>
								<th>Scholarship</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_user->get_scholarships() as $row){?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['name'];?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=$row['gender'];?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?> -
								<?=$this->M_section->get_section($row['section_id']);?> 
								</td>
							<td><?=$this->M_scholarship_type->get_scholarship_type($row['scholarship_type_id']);?></td>
								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>scholarship/read/<?=$row['user_id'];?>" class="btn btn-sm default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>scholarship/delete/<?=$row['user_id'];?>" class="btn btn-sm default"><i class="fa fa-times-circle"></i></a>					

								
									</div>
								</td>
							</tr>
							<?php }?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>
