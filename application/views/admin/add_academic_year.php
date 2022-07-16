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
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
															<input type="text" name="academic_year" class="form-control" value="<?php if (!empty($academic_year)){echo $academic_year;}?>" required>
														</div>
													</div>

												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Start Date</label>
															<input type="date" name="starts" class="form-control" value="<?php if (!empty($starts)){echo $starts;}?>" required>
														</div>
													</div>	

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">End Date</label>
															<input type="date" name="ends" class="form-control" value="<?php if (!empty($ends)){echo $ends;}?>" required>
														</div>
													</div>							
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>academic_year" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
