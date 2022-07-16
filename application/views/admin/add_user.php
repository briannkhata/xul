					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>user/save2" method="post" class="horizontal-form" enctype="multipart/form-data">
											<div class="form-body">
												<br>
												

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Username</label>
															<input type="text" name="username" class="form-control" value="<?php if (!empty($username)){echo $username;}?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Password</label>
															<input type="text" name="nationality" class="form-control" value="<?php if (!empty($nationality)){echo $nationality;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Staff type</label>
															<select class="form-control" name="staff_type_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_staff_type->get_staff_types() as $row){?>
											<option value="<?=$row['staff_type_id'];?>">
																	<?=$row['staff_type'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<select name="gender" class="form-control">
															<option selected="" disabled="">Option</option>
												<option <?php if ($gender=='female') echo 'selected';?> value="female">
												Female</option>


												<option <?php if ($gender=='male') echo 'selected';?> value="male">
												Male</option>
															</select>
														
														</div>
													</div>
												
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Phone</label>
															<input type="tel" name="phone" class="form-control" value="<?php if (!empty($phone)){echo $phone;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Email</label>
															<input type="email" name="email" class="form-control" value="<?php if (!empty($email)){echo $email;}?>" required>
														</div>
													</div>
										
													</div>
												<div class="row">
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Postal Address</label>
															<textarea class="form-control" name="postal_address">
																<?php if (!empty($postal_address)){echo $postal_address;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Physical Address</label>
															<textarea class="form-control" name="physical_address">
																<?php if (!empty($physical_address)){echo $physical_address;}?>
															</textarea>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Department</label>
															<select class="form-control" name="department_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_department->get_departments() as $row){?>
											<option value="<?=$row['department_id'];?>">
																	<?=$row['department'];?>
																</option>
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
												<a href="<?=base_url();?>user/staffs" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
						<script type="text/javascript">
							function readURL(input) {
						      if (input.files && input.files[0]) {
						       var reader = new FileReader();
						        
						       reader.onload = function(e) {
						       $('#image').attr('src', e.target.result);
						         }
							        reader.readAsDataURL(input.files[0]); // convert to base64 string
						      }
						    }

						</script>