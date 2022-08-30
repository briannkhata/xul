					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>taxband/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Title</label>
															<input type="text" name="title" class="form-control" value="<?php if (!empty($title)){echo $title;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 1 Top</label>
															<input type="text" name="band1_top" class="form-control" value="<?php if (!empty($band1_top)){echo $band1_top;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 1 Rate</label>
															<input type="text" name="band1_rate" class="form-control" value="<?php if (!empty($band1_rate)){echo $band1_rate;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 2 Top</label>
															<input type="text" name="band2_top" class="form-control" value="<?php if (!empty($band2_top)){echo $band2_top;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 2 Rate</label>
															<input type="text" name="band2_rate" class="form-control" value="<?php if (!empty($band2_rate)){echo $band2_rate;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 3 Top</label>
															<input type="text" name="band3_top" class="form-control" value="<?php if (!empty($band3_top)){echo $band3_top;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 3 Rate</label>
															<input type="text" name="band3_rate" class="form-control" value="<?php if (!empty($band3_rate)){echo $band3_rate;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 4 Top</label>
															<input type="text" name="band4_top" class="form-control" value="<?php if (!empty($band4_top)){echo $band4_top;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Band 4 Rate</label>
															<input type="text" name="band4_rate" class="form-control" value="<?php if (!empty($band4_rate)){echo $band4_rate;}?>" required>
														</div>
													</div>



													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Active</label>
														<select class="form-control" name="active" required="">
															<option selected="" disabled="">Option</option>
															<option <?php if($active == 1) echo 'selected';?> value="1">Active</option>
															<option <?php if($active == 0) echo 'selected';?> value="0">In Active</option>

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
												<a href="<?=base_url();?>taxband" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
