					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>duty/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">User</label>
														<select class="form-control" name="user_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_user->get_staffs() as $row) {?>
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
										<?php foreach ($this->M_academic_year->get_active_academic_years() as $row) {?>
																<option <?php if($academic_year_id == $row['academic_year_id']) echo 'selected';?> value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Term</label>
														<select class="form-control" name="term_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_term->get_active_terms() as $row) {?>
																<option <?php if($term_id == $row['term_id']) echo 'selected';?> value="<?=$row['term_id'];?>">
																		<?=$row['term'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

												

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">From Date</label>
															<input type="date" name="from_date" class="form-control" value="<?php if (!empty($from_date)){echo $from_date;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">To Date</label>
															<input type="date" name="to_date" class="form-control" value="<?php if (!empty($to_date)){echo $to_date;}?>" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Week No</label>
															<input type="number" name="week_no" class="form-control" value="<?php if (!empty($week_no)){echo $week_no;}?>" required>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Comment</label>
															<input type="text" name="comment" class="form-control" value="<?php if (!empty($comment)){echo $comment;}?>" required>
														</div>
													</div>
												
						<input type="hidden" name="added_by"  value="<?=$this->session->userdata('user_id');?>">
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>duty" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
