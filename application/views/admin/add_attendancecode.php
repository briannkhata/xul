					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>attendancecode/save" method="post" class="horizontal-form">
											<br>
											<div class="form-body">

												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Attendance Code</label>
															<input type="text" name="attendancecode" class="form-control" value="<?php if (!empty($attendancecode)){echo $attendancecode;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Title</label>
															<input type="text" name="title" class="form-control" value="<?php if (!empty($title)){echo $title;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Status</label>
															<select class="form-control" name="deduct">
																<option selected disabled>Option</option>
																<option <?php if($deduct == 1) echo 'selected';?> value="1">Yes Deduct</option>
																<option <?php if($deduct == 0) echo 'selected';?> value="0">Do not Duduct</option>
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
												<a href="<?=base_url();?>attendancecode" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
