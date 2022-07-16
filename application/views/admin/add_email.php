					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>email/send_email" method="post" class="horizontal-form" enctype="multipart/form-data">
											<div class="form-body">
												<br>
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Receiver</label>
															<input type="email" name="receiver" class="form-control" required>
														</div>
													</div>
												</div>

												<div class="row">
												

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Subject</label>
															<input type="text" name="subject" class="form-control" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Message</label>
															<textarea class="form-control" name="message">
															</textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                    <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Send</button>
												<a href="<?=base_url();?>email" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
