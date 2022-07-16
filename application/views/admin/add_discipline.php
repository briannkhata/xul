					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>discipline/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">User</label>
													<select class="form-control" name="user_id" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_user->get_users() as $row) {?>
																<option <?php if($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
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
															<label class="control-label">Grade level</label>
														<select class="form-control" name="grade_level_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																	<option <?php if($grade_level_id == $row['grade_level_id']) echo 'selected';?> value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													


													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Offence</label>
															<textarea class="form-control" name="offence">
																<?php if (!empty($offence)){echo $offence;}?>
															</textarea>
															
														</div>
													</div>

													
													

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Offence Date</label>
															<input type="date" name="offence_date" class="form-control" value="<?php if (!empty($offence_date)){echo $offence_date;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Presiding Date</label>
															<input type="date" name="presiding_date" class="form-control" value="<?php if (!empty($presiding_date)){echo $presiding_date;}?>" required>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Resolution</label>
															<textarea class="form-control" name="resolution">
																<?php if (!empty($resolution)){echo $resolution;}?>
															</textarea>
															
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Presiding team</label>
															<textarea class="form-control" name="presiding_team">
																<?php if (!empty($presiding_team)){echo $presiding_team;}?>
															</textarea>
															
														</div>
													</div>
							<input type="hidden" name="added_by" value="<?=$this->session->userdata('user_id');?>">
																	
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>discipline" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
