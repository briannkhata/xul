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
															<label class="control-label">Photo</label>
															<input type="file" name="photo" class="form-control">
															<br>
															<img src="<?=base_url();?>uploads/users/<=$photo;?>" class="img-thumbnail" id="image" style="">
														</div>
													</div>
												</div>

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
															<label class="control-label">Date of Birth</label>
															<input type="date" name="dob" class="form-control" value="<?php if (!empty($dob)){echo $dob;}?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nationality</label>
															<input type="text" name="nationality" class="form-control" value="<?php if (!empty($nationality)){echo $nationality;}?>" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Reg No</label>
															<input type="text" name="reg_no" class="form-control" value="<?php if(!empty($reg_no)) { echo $reg_no;} else echo rand(1,9999);?>" readonly>
														</div>
													</div>
												</div>

												
												<div class="row">
													<div class="col-md-6">
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

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">National ID</label>
															<input type="tel" name="national_id" class="form-control" value="<?php if (!empty($national_id)){echo $national_id;}?>" required>
														</div>
													</div>
												</div>

													<div class="row">
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Phone</label>
															<input type="tel" name="phone" class="form-control" value="<?php if (!empty($phone)){echo $phone;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Email</label>
															<input type="email" name="email" class="form-control" value="<?php if (!empty($email)){echo $email;}?>" required>
														</div>
													</div>
										
													</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Guardian/Parent Details</label>
															<textarea class="form-control" name="guardian_details">
																<?php if (!empty($guardian_details)){echo $guardian_details;}?>
															</textarea>
														</div>
													</div>
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Postal Address</label>
															<textarea class="form-control" name="postal_address">
																<?php if (!empty($postal_address)){echo $postal_address;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Physical Address</label>
															<textarea class="form-control" name="physical_address">
																<?php if (!empty($physical_address)){echo $physical_address;}?>
															</textarea>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Allergies</label>
															<textarea class="form-control" name="allergies">
																<?php if (!empty($allergies)){echo $allergies;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Disability</label>
															<textarea class="form-control" name="disability">
																<?php if (!empty($disability)){echo $disability;}?>
															</textarea>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Generic</label>
															<select class="form-control" name="generic">
																<option selected="" disabled="">Option</option>
											<option value="1">
																	Generic
																</option>

																<option value="0">
																	Transferred
																</option>
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Orphan</label>
															<select class="form-control" name="orphan">
																<option selected="" disabled="">Option</option>
											<option value="1">
																	Yes
																</option>

																<option value="0">
																	No
																</option>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Class</label>
															<select class="form-control" name="grade_level_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_grade_level->get_grade_levels() as $row){?>
											<option value="<?=$row['grade_level_id'];?>">
																	<?=$row['grade_level'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Section</label>
															<select class="form-control" name="section_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_section->get_sections() as $row){?>
											<option value="<?=$row['section_id'];?>">
																	<?=$row['section'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Term</label>
															<select class="form-control" name="term_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach ($this->M_term->get_active_terms() as $row){?>
																	<option value="<?=$row['term_id'];?>">
																	<?=$row['term'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Session</label>
															<select class="form-control" name="academic_year_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_academic_year->get_active_academic_years() as $row){?>
											<option value="<?=$row['academic_year_id'];?>">
																	<?=$row['academic_year'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Study Mode</label>
															<select class="form-control" name="study_mode_id">
																<option selected="" disabled="">Option</option>
																	<?php foreach ($this->M_study_mode->get_study_modes() as $row){?>
																	<option value="<?=$row['study_mode_id'];?>">
																	<?=$row['study_mode'];?>
																</option>
															<?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Previous School</label>
															<input type="text" name="previous_school" class="form-control" value="<?php if (!empty($previous_school)){echo $previous_school;}?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Scholarship </label>
															<select class="form-control" name="scholarship_type_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_scholarship_type->get_scholarship_types() as $row){?>
											<option value="<?=$row['scholarship_type_id'];?>">
																	<?=$row['scholarship_type'];?>
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
												<a href="<?=base_url();?>user/students" class="btn default green-stripe"> Back</a>
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