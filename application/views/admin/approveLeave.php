<?php $this->load->view('header');?>
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>leaveapplication/approve" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<?php foreach($this->M_leaveapplication->get_leaveapplication_by_id($leaveapplication_id) as $row){?>
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">
															<?=strtoupper($this->M_user->get_user($row['user_id']));?></label>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Days Applied : <?=$row['days_applied'];?></label>
														</div>
														</div>
														<hr>

														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Leave Start Date : <?=date('d M Y',strtotime($row['start_date']));?></label>
														</div>
														</div>
														<hr>

														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Leave Type : <?=$this->M_leavetype->get_leavetype($row['leavetype_id']);?></label>
														</div>
												</div>
														<hr>
													

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Days to  Approve</label>
															<input type="text" name="days_approved" class="form-control" value="<?=$row['days_applied'];?>" required>
														</div>
													</div>
												</div>
												<?php }?>
												
											</div>
											<div class="form-actions left">
                                                <input type="hidden" name="leaveapplication_id" value="<?=$leaveapplication_id;?>">
												<button type="submit" class="btn default blue-stripe"> Approve</button>
												<a href="<?=base_url();?>leaveapplication" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
