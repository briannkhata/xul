					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>hostel_prefect/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Student</label>
														<select class="form-control" name="user_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_user->get_students() as $row) {?>
																	<option value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> - <?=$row['reg_no'];?> - 
																		<?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?>	

																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date Assigned</label>
														<input type="date" name="date_assigned" class="form-control" value="<?php if (!empty($date_assigned)){echo $date_assigned;}?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Hostel</label>
														<select class="form-control" name="hostel_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_hostel->get_hostels() as $row) {?>
																	<option value="<?=$row['hostel_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>


													

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
													<select class="form-control" name="academic_year_id" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_academic_year->get_active_academic_years() as $row) {?>
																<option value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
																
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>hostel_prefect" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
