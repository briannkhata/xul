					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>charge_type/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Charge type</label>
															<input type="text" name="charge_type" class="form-control" value="<?php if (!empty($charge_type)){echo $charge_type;}?>" required>
														</div>
													</div>

												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Amount</label>
															<input type="text" name="amount" class="form-control" value="<?php if (!empty($amount)){echo $amount;}?>" required>
														</div>
													</div>	

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Comment</label>
															<input type="text" name="comment" class="form-control" value="<?php if (!empty($comment)){echo $comment;}?>">
														</div>
													</div>							
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>charge_type" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
