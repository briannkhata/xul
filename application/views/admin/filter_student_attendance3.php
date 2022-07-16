                    <?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <?=$page_title;?> 
                                        </div>
                                    
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?=base_url();?>attendance/student_attendances3" method="post" class="horizontal-form">
												<div class="form-body">
												<br>
												<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Session</label>
														      <select class="form-control" name="academic_year_id">
															<option selected="" disabled="">Academic Year</option>
															<?php foreach ($this->M_academic_year->get_academic_years() as $row) {?>
																<option value="<?=$row['academic_year_id'];?>">
																	<?=$row['academic_year'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
												</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Term</label>
														<select class="form-control" name="term_id">
															<option selected="" disabled="">Term</option>
														<?php foreach ($this->M_term->get_terms() as $row) {?>
																<option value="<?=$row['term_id'];?>">
																	<?=$row['term'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
												</div>

												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Class</label>
														<select class="form-control" name="grade_level_id">
															<option selected="" disabled="">Option</option>
														<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																<option value="<?=$row['grade_level_id'];?>">
																	<?=$row['grade_level'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
												</div>
											</div>


												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> View Records</button>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
