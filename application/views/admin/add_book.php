					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>book/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Title</label>
															<input type="text" name="title" class="form-control" value="<?php if (!empty($title)){echo $title;}?>" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Authors</label>
														<input type="text" name="author" class="form-control" value="<?php if (!empty($author)){echo $author;}?>" required>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">ISBN</label>
															<input type="text" name="isbn" class="form-control" value="<?php if (!empty($isbn)){echo $isbn;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Edition</label>
															<input type="text" name="edition" class="form-control" value="<?php if (!empty($edition)){echo $edition;}?>" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Location (Shelf)</label>
														<select class="form-control" name="book_shelf_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_book_shelf->get_book_shelfs() as $row) {?>
																	<option <?php if($book_shelf_id == $row['book_shelf_id']) echo 'selected';?> value="<?=$row['book_shelf_id'];?>">
																		<?=$row['book_shelf'];?> |
																		<?=$row['code'];?>	
																		</option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Grade level</label>
														<select class="form-control" name="grade_level_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																	<option <?php if($grade_level_id == $row['grade_level_id']) echo 'selected';?> value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Book Category</label>
														<select class="form-control" name="book_category_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_book_category->get_book_categories() as $row) {?>
																	<option <?php if($book_category_id == $row['book_category_id']) echo 'selected';?> value="<?=$row['book_category_id'];?>">
																		<?=$row['book_category'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>



													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Subject</label>
														<select class="form-control" name="subject_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_subject->get_subjects() as $row) {?>
																<option <?php if($subject_id == $row['subject_id']) echo 'selected';?> value="<?=$row['subject_id'];?>">
																		<?=$row['subject'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>


													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Publisher</label>
															<input type="text" name="publisher" class="form-control" value="<?php if (!empty($publisher)){echo $publisher;}?>">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Place Published</label>
															<input type="text" name="place_published" class="form-control" value="<?php if (!empty($place_published)){echo $place_published;}?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Published</label>
															<input type="date" name="date_published" class="form-control" value="<?php if (!empty($date_published)){echo $date_published;}?>">
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
												<a href="<?=base_url();?>book" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
