					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> <?=strtoupper($this->M_user->get_user($user_id));?>
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>charge/pay2" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<b>
													<input type="hidden" name="user_id" value="<?=$user_id;?>">
													<input type="hidden" name="charge_id" value="<?=$charge_id;?>">
													<div class="col-md-12">
														
															<label class="control-label">Academic Year :
															<?=$this->M_academic_year->get_academic_year($academic_year_id);?></label>													
													<hr>
															<label class="control-label"> Term :
															<?=$this->M_term->get_term($term_id);?></label>													
													<hr>
															<label class="control-label"> Charge Amount : 
														<?=number_format($this->M_charge->get_balance($charge_id),2);?>
															</label>
													
												<hr>
											</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Amount Paid</label>
															<input type="text" name="amount_paid" class="form-control" value="<?=$this->M_charge->get_balance($charge_id);?>">
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Payment Mode</label>
															<input type="text" name="payment_mode" class="form-control">
															
														</div>
													</div>

												
													
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Pay Charge</button>
												<a href="<?=base_url();?>charge" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
