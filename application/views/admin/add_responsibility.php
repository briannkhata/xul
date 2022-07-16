					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>responsibility/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
														<select class="form-control" name="academic_year_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_academic_year->get_academic_years() as $row) {?>
																<option <?php if($academic_year_id == $row['academic_year_id']) echo 'selected';?> value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">User</label>
														<select class="form-control" name="user_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_user->get_staffs() as $row) {?>
																<option <?php if($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Responsibility</label>
															<input type="text" name="responsibility" class="form-control" value="<?php if (!empty($responsibility)){echo $responsibility;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Assigned</label>
															<input type="date" name="date_assigned" class="form-control" value="<?php if (!empty($date_assigned)){echo $date_assigned;}?>" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Description</label>
															<textarea class="form-control" name="description">
																<?php if (!empty($description)){echo $description;}?>
															</textarea>
														</div>
													</div>

													

												
													

						
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>responsibility" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
