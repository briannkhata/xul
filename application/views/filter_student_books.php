					<?php $this->load->view('header');?>
							<div class="portlet box">
									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
									<form action="<?=base_url();?>book/student_books" method="post">
												<div class="row" style="padding: 1%;">

												
													<br><br><br>
													<div class="col-md-8">
														User<br>

														<select class="form-control" name="user_id">
															<option selected="" disabled="">User</option>
															<?php foreach ($this->M_user->get_users() as $row) {?>
																<option value="<?=$row['user_id'];?>">
																	<?=$row['name'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
													
													
													<br>
													<div class="col-md-4">
											     	   <button type="submit" class="btn default blue-stripe"> 
												View Books	</button>
											</div>
												
											</div>
											<br>
											<b style="margin-left: 1%;"></b>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
