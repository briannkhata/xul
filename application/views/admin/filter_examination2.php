					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>examination/filter_examination3" method="post">
											<div class="form-body">
												<br>
												<div class="row">

												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Examination Session</label>
														<select class="form-control" name="examination_id" required="">
															<option selected="" disabled="">Option</option>
												<?php foreach ($this->M_examination->get_examinations() as $row) {?>
																	<option value="<?=$row['examination_id'];?>">
																		<?=$row['examination'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Grade level</label>
														<select class="form-control" name="grade_level_id" required="">
															<option selected="" disabled="">Option</option>
													<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																	<option value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Subject</label>
														<select class="form-control" name="subject_id" required="">
														<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_subject->get_subjects() as $row) {?>
																<option value="<?=$row['subject_id'];?>">
																		<?=$row['subject'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													
												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default"> Views Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
