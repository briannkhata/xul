					<?php $this->load->view('header');?>
										<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
							
									<div class="portlet-body form">
									<form action="<?=base_url();?>book/student_books" method="post">
											<div class="form-body">
												<br>
												<div class="row">


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">User</label>
														<select class="form-control" name="user_id" required="">
															<option selected="" disabled="">Option</option>
													<?php foreach ($this->M_user->get_users() as $row) {?>
																	<option value="<?=$row['user_id'];?>">
																		<?=$row['name'];?> (<?=$row['role'];?>)
																			
																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>
													


													
												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> Views Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
