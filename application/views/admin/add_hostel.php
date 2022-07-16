					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>hostel/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Name</label>
															<input type="text" name="name" class="form-control" value="<?php if (!empty($name)){echo $name;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Capacity</label>
															<input type="number" name="capacity" class="form-control" value="<?php if (!empty($capacity)){echo $capacity;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Hostel type</label>
															<select class="form-control" name="hostel_type_id">
																<option selected="" disabled="">Option</option>
																<?php foreach($this->M_hostel_type->get_hostel_types() as $row){?>
																	<option <?php if($row['hostel_type_id'] == $hostel_type_id) echo "selected";?>   value="<?=$row['hostel_type_id'];?>"><?=$row['hostel_type'];?></option>

																<?php }?>
																
															</select>
															
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Location</label>
															<input type="text" name="location" class="form-control" value="<?php if (!empty($location)){echo $location;}?>">
														</div>
													</div>

																	
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>hostel" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
