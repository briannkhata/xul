					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>beneficiary/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Member</label>
															<select class="form-control" name="user_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_user->get_users() as $row) {?>

																	<option <?php if($row['user_id'] == $user_id) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> | <?=$row['membership_number'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Beneficiary</label>
															<input type="text" name="beneficiary" class="form-control" value="<?php if (!empty($beneficiary)){echo $beneficiary;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Membership Number</label>
															<input type="text" name="membershipnumber" class="form-control" value="<?php if (!empty($membershipnumber)){echo $beneficiary;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Birth</label>
															<input type="date" name="dob" class="form-control" value="<?php if (!empty($dob)){echo $dob;}?>" required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Schemetype</label>
															<select class="form-control" name="schemetype_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_schemetype->get_schemetypes() as $row) {?>
																	<option <?php if($row['schemetype_id'] == $schemetype_id) echo 'selected';?> value="<?=$row['schemetype_id'];?>">
																		<?=$row['schemetype'];?>
																	</option>

																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Membership type</label>
															<select class="form-control" name="membershiptype_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_membershiptype->get_membershiptypes() as $row) {?>

																	<option <?php if($row['membershiptype_id'] == $membershiptype_id) echo 'selected';?> value="<?=$row['membershiptype_id'];?>">
																		<?=$row['membershiptype'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Deduction Status</label>
															<select class="form-control" name="deduct">
																<option disabled="" selected="">Select Option</option>
																<option <?php if($deduct == 1) echo 'selected';?> value="1">Deduct</option>
																<option <?php if($deduct == 0) echo 'selected';?> value="0">Do not Deduct</option>
															</select>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Deduct Amount</label>
															<input type="text" name="damount" class="form-control" value="<?php if (!empty($damount)){echo $damount;}?>" required>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Beneficiary Status</label>
															<select class="form-control" name="benstatus">
																<option disabled="" selected="">Select Option</option>
																<option <?php if($benstatus == 'HOLDER') echo 'selected';?> value="HOLDER">HOLDER</option>
																<option <?php if($benstatus == 'CHILD') echo 'selected';?> value="CHILD">CHILD</option>
																<option <?php if($benstatus == 'ADULT') echo 'selected';?> value="ADULT">ADULT</option>
															</select>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Join Date</label>
															<input type="date" name="join_date" class="form-control" value="<?php if (!empty($join_date)){echo $join_date;}?>" required>
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>beneficiary" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
