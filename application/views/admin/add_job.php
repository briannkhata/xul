					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>job/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

												
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Job</label>
															<input type="text" name="job" class="form-control" value="<?php if (!empty($job)){echo $job;}?>" required>
														</div>
													</div>
												
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Grade</label>
													<select class="form-control" name="grade_id" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->M_grade->get_grades() as $row) {?>
																<option value="<?=$row['grade_id'];?>">
																		<?=$row['grade'];?></option>
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
												<a href="<?=base_url();?>job" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
