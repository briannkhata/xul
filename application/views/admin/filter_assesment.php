					<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
									<form action="<?=base_url();?>assesment/assesment_marksheet3" method="post" class="horizontal-form">
											<div class="form-body">
												<div class="row">

			
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Grade level</label>
														<select class="form-control" name="grade_level_id" required="">
															<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_grade_level->get_grade_levels() as $row) {?>
																	<option value="<?=$row['grade_level_id'];?>">
																		<?=$row['grade_level'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													


													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">Assesment</label>
														<select class="form-control" name="assesment_id" required="">
														<option selected="" disabled="">Option</option>
											<?php foreach ($this->M_assesment->get_assesments() as $row) {?>
																<option value="<?=$row['assesment_id'];?>">
																	<?=$row['title'];?> >> 
															<?=$this->M_subject->get_subject($row['subject_id']);?> >>
															<?=$this->M_academic_year->get_academic_year($row['academic_year_id']);?> >>
															<?=date('d F Y',strtotime($row['date_assigned']));?>
																
															</option>
																<?php }?>
																
															</select>
														</div>
													</div>

													
												</div>
												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> View Records
												</button>
												
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
