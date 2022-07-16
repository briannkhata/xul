					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>grade_point/save" method="post" class="horizontal-form"><br>
											<div class="form-body">

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Grade Point</label>
															<input type="text" name="grade_point" class="form-control" value="<?php if (!empty($grade_point)){echo $grade_point;}?>" required>
														</div>
													</div>

												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>	

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mark from</label>
															<input type="text" name="mark_from" class="form-control" value="<?php if (!empty($mark_from)){echo $mark_from;}?>" required>
														</div>
													</div>	

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mark Upto</label>
															<input type="text" name="mark_upto" class="form-control" value="<?php if (!empty($mark_upto)){echo $mark_upto;}?>" required>
														</div>
													</div>	

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Grade Group</label>
															<select class="form-control" name="grade_group_id">
																<option disabled="" disabled="">Option</option>
														<?php foreach ($this->M_grade_group->get_grade_groups() as $row) {?>
																<option <?php if($grade_group_id == $row['grade_group_id']) echo 'selected';?> value="<?=$row['grade_group_id'];?>">
																		<?=$row['grade_group'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<!--div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
															<select class="form-control" name="academic_year_id">
																<option disabled="" disabled="">Option</option>
														<?php foreach ($this->M_academic_year->get_academic_years() as $row) {?>
																<option <?php if($academic_year_id == $row['academic_year_id']) echo 'selected';?> value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div-->				

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Comment</label>
															<input type="text" name="comment" class="form-control" value="<?php if (!empty($comment)){echo $comment;}?>" required>
														</div>
													</div>								
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Save</button>
												<a href="<?=base_url();?>grade_point" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
