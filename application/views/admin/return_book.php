					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											RETURN <b><?=$title;?></b> BOOK | 
											<?=strtoupper($this->M_user->get_user($user_id));?>
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>book_rentout/return" method="post" class="horizontal-form">
											<div class="form-body">

												<div class="row">

													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Book</label>
															<input type="text"  class="form-control" value="<?=$this->M_book->get_title($book_id);?>" readonly>
														</div>
													</div>

													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Fine</label>
			<input type="text" class="form-control" value="<?=number_format($this->M_book->get_price($book_id),2);?>">
					<input type="hidden" name="fine" class="form-control" value="<?=$this->M_book->get_price($book_id);?>" >

														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Status</label>
															<select name="status" class="form-control">
																<option selected="" disabled="">Option</option>
																<option value="1">Return</option>
																<option value="3">Lost</option>
															</select>
															
														</div>
													</div>

													
							<input type="hidden" name="book_rentout_id" value="<?=$book_rentout_id;?>">
							<input type="hidden" name="book_id" value="<?=$book_id;?>">

												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>book_rentout" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
