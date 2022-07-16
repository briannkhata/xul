					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>book/filter2" method="post">
											<div class="form-body">
												<br>
												<div class="row">

												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Class</label>
															<select class="form-control" name="grade_level_id">
																<option selected="" disabled="">Class</option>
																<option value="all">ALL CLASSES</option>
														<?php foreach($this->M_grade_level->get_grade_levels() as $row){?>
																	<option value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?></option>
																<?php }?>
															</select>
														</div>
													</div>


												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> Views Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
