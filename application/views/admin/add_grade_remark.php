					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>grade_remark/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Grade Remark</label>
															<input type="text" name="grade_remark" class="form-control" value="<?php if (!empty($grade_remark)){echo $grade_remark;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mark from</label>
															<input type="text" name="mark_from" class="form-control" value="<?php if (!empty($mark_from)){echo $mark_from;}?>" required>
														</div>
													</div>	

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mark Upto</label>
															<input type="text" name="mark_upto" class="form-control" value="<?php if (!empty($mark_upto)){echo $mark_upto;}?>" required>
														</div>
													</div>	

													<div class="col-md-4">
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

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Principal Comment</label>
															<textarea class="form-control" name="headmaster">
																<?php if (!empty($headmaster)){echo $headmaster;}?>
															</textarea> 
														</div>
													</div>	

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Class teacher</label>
															<textarea class="form-control" name="classteacher">
																<?php if (!empty($classteacher)){echo $classteacher;}?>
															</textarea> 
														</div>
													</div>	

																					
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Save</button>
												<a href="<?=base_url();?>grade_remark" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
