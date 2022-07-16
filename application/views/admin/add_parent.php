					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> 
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>parento/save" method="post" class="horizontal-form" enctype="multipart/form-data">
											<div class="form-body">
												<br>
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>
												</div>

												<div class="row">
												

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nationality</label>
															<input type="text" name="nationality" class="form-control" value="<?php if (!empty($nationality)){echo $nationality;}?>" required>
														</div>
													</div>
												
											
												
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Phone</label>
															<input type="tel" name="phone" class="form-control" value="<?php if (!empty($phone)){echo $phone;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Email</label>
															<input type="email" name="email" class="form-control" value="<?php if (!empty($email)){echo $email;}?>" required>
														</div>
													</div>
												</div>

													<div class="row">
														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Relation</label>
															<input type="text" name="relation" class="form-control" value="<?php if (!empty($relation)){echo $relation;}?>" required>
														</div>
													</div>

												
										
													</div>
												<div class="row">
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Postal Address</label>
															<textarea class="form-control" name="postal_address">
																<?php if (!empty($postal_address)){echo $postal_address;}?>
															</textarea>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Physical Address</label>
															<textarea class="form-control" name="physical_address">
																<?php if (!empty($physical_address)){echo $physical_address;}?>
															</textarea>
														</div>
													</div>
												</div>

												
												

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Sibling</label>
															<select class="form-control" name="child_id">
																<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_user->get_students() as $row){?>
											<option <?php if($child_id == $row['user_id']) echo 'selected';?>  value="<?=$row['user_id'];?>">
																	<?=$row['name'];?> | <?=$row['reg_no'];?>
																</option>
															<?php }?>
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
												<a href="<?=base_url();?>parento" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
