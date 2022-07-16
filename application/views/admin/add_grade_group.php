					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
									<form action="<?=base_url();?>grade_group/save" method="post" class="horizontal-form">
											<br>
											<div class="form-body">

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Grade group</label>
															<input type="text" name="grade_group" class="form-control" value="<?php if (!empty($grade_group)){echo $grade_group;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Point Based</label>
															<select class="form-control" name="point_based">
																<option selected="" disabled="">Option</option>
																<option <?php if($point_based == 1) echo 'selected';?> value="1">Yes</option>
																<option <?php if($point_based == 0) echo 'selected';?> value="0">No</option>
																
															</select>
															
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Save</button>
												<a href="<?=base_url();?>grade_group" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
