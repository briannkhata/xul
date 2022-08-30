					<?php $this->load->view('header');?>
	          <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?>
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>overtime/get_users_by_branch" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Branch</label>
														<select class="form-control" name="branch_id" required="">
														<option selected="" disabled="">Option</option>
															<?php foreach ($this->M_branch->get_branches() as $row) {?>
																<option value="<?=$row['branch_id'];?>">
																		<?=$row['name'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Month</label>
														<select class="form-control" name="month" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->db->get('months')->result_array() as $row) {?>
																<option value="<?=$row['month'];?>">
																		<?=$row['month'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Year</label>
														<select class="form-control" name="year" required="">
														<option selected="" disabled="">Option</option>
										<?php foreach ($this->db->get('years')->result_array() as $row) {?>
																<option value="<?=$row['year'];?>">
																		<?=$row['year'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-actions left">
												<button type="submit" class="btn default blue-stripe"> Continue</button>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
