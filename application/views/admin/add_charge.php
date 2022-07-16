					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>charge/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Student</label>
															<select class="form-control" name="user_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_user->get_students() as $row) {?>

																	<option <?php if($row['user_id'] == $user_id) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> | <?=$row['reg_no'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
															<select class="form-control" name="academic_year_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_academic_year->get_active_academic_years() as $row) {?>

																	<option <?php if($row['academic_year_id'] == $academic_year_id) echo 'selected';?> value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Term</label>
															<select class="form-control" name="term_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_term->get_active_terms() as $row) {?>

																	<option <?php if($row['term_id'] == $term_id) echo 'selected';?> value="<?=$row['term_id'];?>">
																		<?=$row['term'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Charge type</label>
															<select class="form-control" name="charge_type_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_charge_type->get_charge_types() as $row) {?>

																	<option <?php if($row['charge_type_id'] == $charge_type_id) echo 'selected';?> value="<?=$row['charge_type_id'];?>">
																		<?=$row['charge_type'];?> | <?=number_format($row['amount'],2);?>
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
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>charge" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
