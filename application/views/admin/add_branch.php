					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>academic_year/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Branch</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>

												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Rate</label>
															<input type="text" name="rate" class="form-control" value="<?php if (!empty($rate)){echo $rate;}?>" required>
														</div>
													</div>	

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Address</label>
															<input type="text" name="address" class="form-control" value="<?php if (!empty($address)){echo $address;}?>" required>
														</div>
													</div>							
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>branch" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
