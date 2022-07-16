					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>lab_item/lab_item_report" method="post">
											<div class="form-body">
												<br>
												<div class="row">


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Category</label>
														<select class="form-control" name="lab_type_id" required="">
															<option selected="" disabled="">Option</option>
															<option value="all">ALL CATEGORIES</option>
													<?php foreach ($this->M_lab_type->get_lab_types() as $row) {?>
																	<option value="<?=$row['lab_type_id'];?>">
																		<?=$row['lab_type'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Location</label>
														<select class="form-control" name="lab_shelf_id" required="">		<option selected="" disabled="">Option</option>
															<option value="all">ALL LOCATIONS</option>
											<?php foreach ($this->M_lab_shelf->get_lab_shelfs() as $row) {?>
																<option value="<?=$row['lab_shelf_id'];?>">
																		<?=$row['lab_shelf'];?> | 
																		<?=$row['code'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													
												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default"> Views Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
