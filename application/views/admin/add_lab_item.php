					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>lab_item/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Item Code</label>
															<input type="text" name="item_code" class="form-control" value="<?php if (!empty($item_code)){echo $item_code;}?>" required>
														</div>
													</div>

													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">Item</label>
															<input type="text" name="lab_item" class="form-control" value="<?php if (!empty($lab_item)){echo $lab_item;}?>" required>
														</div>
													</div>
													

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Category</label>
													<select class="form-control" name="lab_type_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_lab_type->get_lab_types() as $row) {?>
																	<option <?php if($lab_type_id == $row['lab_type_id']) echo 'selected';?> value="<?=$row['lab_type_id'];?>">
																		<?=$row['lab_type'];?>
																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>
					

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Location (Shelf)</label>
													<select class="form-control" name="lab_shelf_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_lab_shelf->get_lab_shelfs() as $row) {?>
																	<option <?php if($lab_shelf_id == $row['lab_shelf_id']) echo 'selected';?> value="<?=$row['lab_shelf_id'];?>">
																		<?=$row['lab_shelf'];?> |
																		<?=$row['code'];?>	
																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>
													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Description</label>
															<textarea class="form-control" name="description">
																<?php if (!empty($description)){echo $description;}?>
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
												<a href="<?=base_url();?>lab_item" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
