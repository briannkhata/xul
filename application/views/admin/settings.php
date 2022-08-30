					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?>
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
							<form action="<?=base_url();?>user/save_settings" method="post" class="horizontal-form">
											<?php foreach ($this->db->get('settings')->result_array() as $row):?>

											<div class="form-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Name</label>
														<input type="text" class="form-control" name="company" value="<?=$row['company'];?>">
														<input type="hidden" name="id" value="<?=$row['id'];?>">
														
														</div>
													</div>
											
												</div>

												
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Primary Phone1</label>
															<input type="tel" class="form-control" name="phone1" value="<?=$row['phone1'];?>">														
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alt Phone 1</label>
															<input type="tel" class="form-control" name="phone2" value="<?=$row['phone2'];?>">														
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alt Phone 2</label>
															<input type="tel" class="form-control" name="phone3" value="<?=$row['phone3'];?>">														
														</div>
													</div>

											</div>

													<div class="row">

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Primary Email</label>
															<input type="email" class="form-control" name="email1" value="<?=$row['email1'];?>">														
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alt Email 2</label>
															<input type="email" class="form-control" name="email2" value="<?=$row['email2'];?>">														
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Alt Email 3</label>
															<input type="email" class="form-control" name="email3" value="<?=$row['email3'];?>">														
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Physical Address</label>
															<textarea class="form-control" name="physical_address">
																<?=$row['physical_address'];?>
															</textarea>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Contact Address</label>
															<textarea class="form-control" name="contact_address">
																<?=$row['contact_address'];?>
															</textarea>
														</div>
													</div>
												
													
												</div>
												
											</div>
										<?php endforeach;?>
											<div class="form-actions left">
												<button type="submit" class="btn default"> Save</button>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
