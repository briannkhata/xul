					<?php $this->load->view('header');?>
							<div class="portlet box">
									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
									<form action="<?=base_url();?>book/book_report" method="post">
												<div class="row" style="padding: 1%;">

												
													<br><br><br>
													<div class="col-md-3">
														Subject<br>

														<select class="form-control" name="subject_id">
															<option selected="" disabled="">Subject</option>
															<?php foreach ($this->M_subject->get_subjects() as $row) {?>
																<option value="<?=$row['subject_id'];?>">
																	<?=$row['subject'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
													<div class="col-md-3">
														Book Category<br>
														<select class="form-control" name="book_category_id">
															<option selected="" disabled="">Category</option>
															<?php foreach ($this->M_book_category->get_book_categories() as $row) {?>
																<option value="<?=$row['book_category_id'];?>">
																	<?=$row['book_category'];?>
																</option>
															<?php }?>
															
														</select>
													</div>

													<div class="col-md-3">
														Grade Level<br>
														<select class="form-control" name="grade_level_id">
															<option selected="" disabled="">Grade Level</option>
															<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																<option value="<?=$row['grade_level_id'];?>">
																	<?=$row['grade_level'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
													
													<br>
													<div class="col-md-3">
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
