					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>hostel/filter_hostels2" method="post">
											<div class="form-body">
												<br>
												<div class="row">

												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Academic Year</label>
														<select class="form-control" name="academic_year_id" required="">
															<option selected="" disabled="">Option</option>
												<?php foreach ($this->M_academic_year->get_academic_years() as $row) {?>
																	<option value="<?=$row['academic_year_id'];?>">
																		<?=$row['academic_year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Hostel</label>
														<select class="form-control" name="hostel_id" required="">
															<option selected="" disabled="">Option</option>
													<?php foreach ($this->M_hostel->get_hostels() as $row) {?>
																	<option value="<?=$row['hostel_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													

													
												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> 
													View Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
