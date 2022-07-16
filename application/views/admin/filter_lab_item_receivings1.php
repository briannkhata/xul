					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>lab_item/filter_receivings2" method="post">
											<div class="form-body">
												<br>
												<div class="row">

												<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Arrival Date1</label>
														<input type="date" name="arrival_date1" class="form-control">
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Arrival Date2</label>
														<input type="date" name="arrival_date2" class="form-control">
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
