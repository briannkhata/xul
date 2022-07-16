					<?php $this->load->view('header');?>
							<div class="portlet box grey-cascade">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>grade_level/save" method="post" class="horizontal-form">
											<div class="form-body">

												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">Grade Level</label>
															<input type="text" name="grade_level" class="form-control" value="<?php if (!empty($grade_level)){echo $grade_level;}?>" required>
														</div>
													</div>

												
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Numeric</label>
															<input type="number" name="numeric" class="form-control" value="<?php if (!empty($numeric)){echo $numeric;}?>" required>
														</div>
													</div>	

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Grade Group</label>
															<select class="form-control" name="grade_group_id">
																<option disabled="" disabled="">Option</option>
														<?php foreach ($this->M_grade_group->get_grade_groups() as $row) {?>
																<option <?php if($grade_group_id == $row['grade_group_id']) echo 'selected';?> value="<?=$row['grade_group_id'];?>">
																		<?=$row['grade_group'];?></option>
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
												<a href="<?=base_url();?>grade_level" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
