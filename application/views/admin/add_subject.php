					<?php $this->load->view('header');?>
							<div class="portlet box grey-cascade">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>subject/save" method="post" class="horizontal-form">
											<div class="form-body">

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Subject</label>
															<input type="text" name="subject" class="form-control" value="<?php if (!empty($subject)){echo $subject;}?>" required>
														</div>
													</div>


												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Code</label>
															<input type="text" name="code" class="form-control" value="<?php if (!empty($code)){echo $code;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Key Subject</label>
															<select class="form-control" name="key_subject">
																<option selected="" disabled="">Select Option</option>
																<option <?php if($key_subject == '1') echo 'selected';?>  value="1">Key Subject</option>
																<option <?php if($key_subject == '0') echo 'selected';?>  value="0">not Key Subject</option>

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
												<a href="<?=base_url();?>subject" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
