					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>assesment/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Title</label>
															<input type="text" name="title" class="form-control" value="<?php if (!empty($title)){echo $title;}?>" required>
														</div>
													</div>
													<div class="col-md-4">
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
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Assesment type</label>
														<select class="form-control" name="assesment_type_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_assesment_type->get_assesment_types() as $row) {?>
																	<option <?php if($assesment_type_id == $row['assesment_type_id']) echo 'selected';?> value="<?=$row['assesment_type_id'];?>">
																		<?=$row['assesment_type'];?></option>
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
																<option <?php if($subject_id == $row['subject_id']) echo 'selected';?> value="<?=$row['subject_id'];?>">
																		<?=$row['subject'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Total Marks</label>
															<input type="number" name="total_marks" class="form-control" value="<?php if (!empty($total_marks)){echo $total_marks;}?>" required>
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Term</label>
													<select class="form-control" name="term_id" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_term->get_terms() as $row) {?>
																<option <?php if($term_id == $row['term_id']) echo 'selected';?> value="<?=$row['term_id'];?>">
																		<?=$row['term'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date Assigned</label>
															<input type="date" name="date_assigned" class="form-control" value="<?php if (!empty($date_assigned)){echo $date_assigned;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Due Date</label>
															<input type="date" name="due_date" class="form-control" value="<?php if (!empty($due_date)){echo $due_date;}?>" required>
														</div>
													</div>

													<div class="col-md-12">
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
																
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>assesment" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
