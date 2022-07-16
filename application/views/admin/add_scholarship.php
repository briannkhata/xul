					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>scholarship/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-7">
														<div class="form-group">
															<label class="control-label">Student</label>
														<select class="form-control" name="user_id" required="">
															<option selected="" disabled="">Option</option>
												<?php foreach ($this->M_user->get_students() as $row) {?>
																	<option <?php if($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> | <?=$row['reg_no'];?>
																			
																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<label class="control-label">Scholarship type</label>
													<select class="form-control" name="scholarship_type_id" required="">
															<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_scholarship_type->get_scholarship_types() as $row) {?>
																	<option <?php if($scholarship_type_id == $row['scholarship_type_id']) echo 'selected';?> value="<?=$row['scholarship_type_id'];?>">
																		<?=$row['scholarship_type'];?></option>
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
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>scholarship" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
