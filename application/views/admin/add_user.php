					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>user/save" method="post" class="horizontal-form" enctype="multipart/form-data">
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
															<label class="control-label">Phone 1</label>
															<input type="text" name="phone1" class="form-control" value="<?php if (!empty($phone1)){echo $phone1;}?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Phone 2</label>
															<input type="text" name="phone2" class="form-control" value="<?php if (!empty($phone2)){echo $phone2;}?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Phone 3</label>
															<input type="text" name="phone3" class="form-control" value="<?php if (!empty($phone3)){echo $phone3;}?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Email 1</label>
															<input type="text" name="email1" class="form-control" value="<?php if (!empty($email1)){echo $email1;}?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Email 2</label>
															<input type="text" name="email2" class="form-control" value="<?php if (!empty($email2)){echo $email2;}?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Email 3</label>
															<input type="text" name="email3" class="form-control" value="<?php if (!empty($email3)){echo $email3;}?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<select name="gender" class="form-control">
															<option selected="" disabled="">Option</option>
															<option <?php if ($gender=='Female') echo 'selected';?> value="Female">
															Female</option>
																<option <?php if ($gender=='Male') echo 'selected';?> value="Male">
																Male</option>
															</select>
														
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Marital Status</label>
															<select name="marital_status" class="form-control">
															<option selected="" disabled="">Option</option>
															<option <?php if ($marital_status=='Single') echo 'selected';?> value="Single">
															Single</option>
															<option <?php if ($marital_status=='Married') echo 'selected';?> value="Married">
																Married</option>
															
																<option <?php if ($marital_status=='Widowed') echo 'selected';?> value="Widowed">
																Widowed</option>

																<option <?php if ($marital_status=='Divorced') echo 'selected';?> value="Divorced">
																Divorced</option>
															</select>
														
														</div>
													</div>

													<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Branch</label>
																<select class="form-control" name="branch_id">
																	<option selected="" disabled="">Option</option>
																		<?php foreach ($this->M_branch->get_branches() as $row){?>
																		<option <?php if($branch_id == $row['branch_id']) echo 'selected';?> value="<?=$row['branch_id'];?>">
																		<?=$row['name'];?>
																	</option>
																<?php }?>
																</select>
															</div>
														</div>


													
												

												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nationality</label>
															<input type="text" name="nationality" class="form-control" value="<?php if (!empty($nationality)){echo $nationality;}?>" required>
														</div>
													</div>
												
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">National Id</label>
															<input type="text" name="national_id" class="form-control" value="<?php if (!empty($national_id)){echo $national_id;}?>" required>
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
															<label class="control-label">On Pension</label>
															<select name="on_pension" class="form-control">
															<option selected="" disabled="">Option</option>
															<option <?php if ($on_pension=='1') echo 'selected';?> value="1">
																Yes</option>
																<option <?php if ($on_pension=='0') echo 'selected';?> value="0">
																No</option>
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Birth</label>
															<input type="date" name="dob" class="form-control" value="<?php if (!empty($dob)){echo $dob;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Start Date</label>
															<input type="date" name="startdate" class="form-control" value="<?php if (!empty($startdate)){echo $startdate;}?>" required>
														</div>
													</div>										
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Next of Keen Details</label>
															<textarea class="form-control" name="nextofkin">
																<?php if (!empty($nextofkin)){echo $nextofkin;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Postal Address</label>
															<textarea class="form-control" name="contactaddress">
																<?php if (!empty($contactaddress)){echo $contactaddress;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Physical Address</label>
															<textarea class="form-control" name="physical_address">
																<?php if (!empty($physicaladdress)){echo $physicaladdress;}?>
															</textarea>
														</div>
													</div>
												</div>

												<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Department</label>
															<select class="form-control" name="department_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach ($this->M_department->get_departments() as $row){?>
																	<option <?php if($department_id == $row['department_id']) echo 'selected';?> value="<?=$row['department_id'];?>">
																	<?=$row['department'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Job Title</label>
															<select class="form-control" name="job_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach ($this->M_job->get_jobs() as $row){?>
																	<option <?php if($job_id == $row['job_id']) echo 'selected';?> value="<?=$row['job_id'];?>">
																	<?=$row['job'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Grade</label>
															<select class="form-control" name="grade_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach ($this->M_grade->get_grades() as $row){?>
																	<option <?php if($grade_id == $row['grade_id']) echo 'selected';?> value="<?=$row['grade_id'];?>">
																	<?=$row['grade'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Disability</label>
															<textarea class="form-control" name="nextofkin">
																<?php if (!empty($disability)){echo $disability;}?>
															</textarea>
														</div>
													</div>
												</div>

												<div class="row">
																		
												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Scheme Type</label>
															<select class="form-control" name="schemetype_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach($this->M_schemetype->get_schemetypes() as $row){?>
																	<option <?php if($schemetype_id == $row['schemetype_id']) echo 'selected';?> value="<?=$row['schemetype_id'];?>">
																	<?=$row['schemetype'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>					

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Membership Number</label>
															<input type="text" name="membership_number" class="form-control" value="<?php if (!empty($membership_number)){echo $membership_number;}?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Membershiptype</label>
															<select class="form-control" name="membershiptype_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach($this->M_membershiptype->get_membershiptypes() as $row){?>
																	<option <?php if($membershiptype_id == $row['membershiptype_id']) echo 'selected';?> value="<?=$row['membershiptype_id'];?>">
																	<?=$row['membershiptype'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>							
												</div>


											<div class="row">
												<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Bank</label>
															<select class="form-control" name="bank_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach($this->M_bank->get_banks() as $row){?>
																	<option <?php if($bank_id == $row['bank_id']) echo 'selected';?> value="<?=$row['bank_id'];?>">
																	<?=$row['bank'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>					

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Account Number</label>
															<input type="text" name="account_number" class="form-control" value="<?php if (!empty($account_number)){echo $account_number;}?>">
														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Account Type</label>
															<input type="text" name="account_type" class="form-control" value="<?php if (!empty($account_type)){echo $account_type;}?>">
														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Branch</label>
															<input type="text" name="branch" class="form-control" value="<?php if (!empty($branch)){echo $branch;}?>">
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