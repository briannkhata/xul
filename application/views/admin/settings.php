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
														<input type="text" class="form-control" name="app" value="<?=$row['app'];?>">
														<input type="hidden" name="id" value="<?=$row['id'];?>">
														
														</div>
													</div>
											
												</div>

												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Primary Phone</label>
															<input type="tel" class="form-control" name="phone" value="<?=$row['phone'];?>">														
														</div>
													</div>

											
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Primary Email</label>
															<input type="email" class="form-control" name="email" value="<?=$row['email'];?>">														
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Principal Signature</label>
															<input type="file" class="form-control" name="head_sign" value="<?=$row['head_sign'];?>">														
														</div>
													</div>
												</div>

											
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Address</label>
															<textarea class="form-control" name="address">
																<?=$row['address'];?>
															</textarea>
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Motto</label>
															<textarea class="form-control" name="motto">
																<?=$row['motto'];?>
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
