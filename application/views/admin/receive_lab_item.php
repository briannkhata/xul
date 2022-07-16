					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> | 
											Current Quantity : <?=$this->M_lab_item->get_instock($lab_item_id);?>
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>lab_item/save_receive" method="post" class="horizontal-form">
											<br>
											<div class="form-body">

												<div class="row">

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Price</label>
															<input type="text" name="price" class="form-control">
														</div>
													</div>
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Quantity</label>
															<input type="number" name="quantity" class="form-control">
														</div>
													</div>
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Arrival Date</label>
															<input type="date" name="arrival_date" class="form-control">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Comment</label>
															<input type="text" name="comment" class="form-control">
														</div>
													</div>

													

													
							<input type="hidden" name="lab_item_id" value="<?=$lab_item_id;?>">
							<input type="hidden" name="added_by" value="<?=$this->session->userdata('user_id');?>">

												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default"> Receive </button>
												<a href="<?=base_url();?>lab_item" class="btn default"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
