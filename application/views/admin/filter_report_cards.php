					<?php $this->load->view('header');?>
								<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
							<form action="<?=base_url();?>examination/report_cards" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-3">
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

													<div class="col-md-3">
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

													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label">Student</label>
														<select class="form-control" name="user_id">
														<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_user->get_students() as $row) {?>
																<option value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> [
																		<?=$row['reg_no'];?> ]
																	</option>
																<?php }?>
																
															</select>
														</div>
													</div>

														<div class="col-md-3">
														<div class="form-group">
														<button type="submit" class="btn default blue-stripe" style="margin-top: 10%;"> 
															View Records
												</button>
														</div>
													</div>

													
													
													


												
												</div>
												
											</div>
									
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
