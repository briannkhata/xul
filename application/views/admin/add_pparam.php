<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>pparam/save" method="post" class="horizontal-form">
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
															<label class="control-label">Staff Rate</label>
															<input type="text" name="staff" class="form-control" value="<?php if (!empty($staff)){echo $staff;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Company Rate</label>
															<input type="text" name="company" class="form-control" value="<?php if (!empty($company)){echo $company;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">GLA</label>
															<input type="text" name="gla" class="form-control" value="<?php if (!empty($gla)){echo $gla;}?>" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Broker</label>
															<input type="text" name="broker" class="form-control" value="<?php if (!empty($broker)){echo $broker;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">VAT</label>
															<input type="text" name="vat" class="form-control" value="<?php if (!empty($vat)){echo $vat;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Admin Fee</label>
															<input type="text" name="admin_fee" class="form-control" value="<?php if (!empty($admin_fee)){echo $admin_fee;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
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
												<a href="<?=base_url();?>pparam" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
