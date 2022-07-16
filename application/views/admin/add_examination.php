					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>examination/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Examination Session</label>
															<input type="text" name="examination" class="form-control" value="<?php if (!empty($examination)){echo $examination;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
													<select class="form-control" name="academic_year_id" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_academic_year->get_active_academic_years() as $row) {?>
																<option <?php if($academic_year_id == $row['academic_year_id']) echo 'selected';?> value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Start Date</label>
															<input type="date" name="starts" class="form-control" value="<?php if (!empty($starts)){echo $starts;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">End Date</label>
															<input type="date" name="ends" class="form-control" value="<?php if (!empty($ends)){echo $ends;}?>" required>
														</div>
													</div>
																
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Save</button>
												<a href="<?=base_url();?>examination" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
