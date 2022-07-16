					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>examination_paper/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Examination Paper</label>
															<input type="text" name="examination_paper" class="form-control" value="<?php if (!empty($examination_paper)){echo $examination_paper;}?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Total Marks</label>
															<input type="text" name="total_marks" class="form-control" value="<?php if (!empty($total_marks)){echo $total_marks;}?>" required>
														</div>
													</div>

												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Main Subject</label>
														<select class="form-control" name="subject_id" required="">
														<option selected="" disabled="">Option</option>
														
															<?php foreach ($this->M_subject->get_subjects() as $row) {?>
																<option <?php if($subject_id == $row['subject_id']) echo 'selected';?> value="<?=$row['subject_id'];?>">
																		<?=$row['subject'];?></option>
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
												<a href="<?=base_url();?>examination_paper" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
