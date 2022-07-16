					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>book_missing/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

												

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Book</label>
														<select class="form-control" name="book_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_book->get_available_books() as $row) {?>
																	<option <?php if($book_id == $row['book_id']) echo 'selected';?> value="<?=$row['book_id'];?>">
																		<?=$row['title'];?> | 
																		<?=$row['isbn'];?> |
																	<?=$row['edition'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Borrower</label>
														<select class="form-control" name="user_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_user->get_users() as $row) {?>
																	<option <?php if($user_id == $row['user_id']) echo 'selected';?> value="<?=$row['user_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													
													
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date Lost</label>
															<input type="date" name="lost_date" class="form-control" value="<?php if (!empty($lost_date)){echo $lost_date;}?>" >
														</div>
													</div>
							<input type="hidden" name="added_by" value="<?=$this->session->userdata('user_id');?>">
																	
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>book_missing" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
