					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>charge/pay_invoices2" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
															<select class="form-control" name="academic_year_id" required="">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_academic_year->get_active_academic_years() as $row) {?>

																	<option value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?>
																	</option>
																<?php }?>
															</select>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Term</label>
															<select class="form-control" name="term_id" required="">
																<option disabled="" selected="">Select Option</option>
															<?php foreach ($this->M_term->get_active_terms() as $row) {?>

																	<option value="<?=$row['term_id'];?>">
																		<?=$row['term'];?>
																	</option>
																<?php }?>
															</select>
															
														</div>
													</div>

																											<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Filter by Mode of Study</label>
															<select class="form-control" name="study_mode_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_study_mode->get_study_modes() as $row) {?>

																	<option value="<?=$row['study_mode_id'];?>">
																		<?=$row['study_mode'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Filter by Class</label>
															<select class="form-control" name="grade_level_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>

																	<option value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Filter by Scholarship</label>
															<select class="form-control" name="scholarship_type_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_scholarship_type->get_scholarship_types() as $row) {?>

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
												<button type="submit" class="btn default"> View Records</button>
												<a href="<?=base_url();?>charge" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
