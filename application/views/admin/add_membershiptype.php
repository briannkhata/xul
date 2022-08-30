<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>membershiptype/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

												
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Membership type</label>
															<input type="text" name="membershiptype" class="form-control" value="<?php if (!empty($membershiptype)){echo $membershiptype;}?>" required>
														</div>
													</div>

													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Charge</label>
															<input type="text" name="charge" class="form-control" value="<?php if (!empty($charge)){echo $charge;}?>" required>
														</div>
													</div>



													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Sheme type</label>
															<select class="form-control" name="schemetype_id">
																<option selected disabled>schemetype</option>
																<?php foreach($this->M_schemetype->get_schemetypes() as $row){?>
																<option <?php if($schemetype_id == $row['schemetype_id'] ) echo 'selected';?> value="<?=$row['schemetype_id'];?>">
																<?=$row['schemetype'];?></option>
																<?php }?>
															</select>
														</div>
													</div>

											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>membershiptype" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
