<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>leaveapplication/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

												<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Staff</label>
														<select class="form-control" name="user_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_user->get_users() as $row) {?>
																<option <?php if($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Days Applied</label>
															<input type="text" name="days_applied" class="form-control" value="<?php if (!empty($days_applied)){echo $days_applied;}?>" required>
														</div>
													</div>

												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Leave Type</label>
														<select class="form-control" name="leavetype_id">
															<option selected="" disabled="">Option</option>
																	<?php foreach($this->M_leavetype->get_leavetypes() as $row){?>
																	<option <?php if($leavetype_id == $row['leavetype_id']){ echo 'selected';}?> value="<?=$row['leavetype_id'];?>">
																	<?=$row['leavetype'];?>
																</option>
																<?php }?>
													</select>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Start Date</label>
													<input type="date" name="start_date" class="form-control" value="<?php if (!empty($start_date)){echo $start_date;}?>" required>
												</div>
											</div>


											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Comment</label>
													<input type="text" name="comment" class="form-control" value="<?php if (!empty($comment)){echo $comment;}?>" required>
												</div>
											</div>

										</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>leaveapplication" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
