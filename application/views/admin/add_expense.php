					<?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
									<div class="portlet-title">
										<div class="caption">
											<?=$page_title;?> |
										</div>
									
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?=base_url();?>expense/save" method="post" class="horizontal-form">
											<div class="form-body">
												<br>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Expense type</label>
															<select class="form-control" name="expense_type_id">
																<option disabled="" selected="">Select Option</option>
																<?php foreach ($this->M_expense_type->get_expense_types() as $row) {?>

																	<option <?php if($row['expense_type_id'] == $expense_type_id) echo 'selected';?> value="<?=$row['expense_type_id'];?>">
																		<?=$row['expense_type'];?>
																	</option>
																	
																<?php }?>
																
															</select>
															
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Amount</label>
															<input type="text" name="amount" class="form-control" value="<?php if (!empty($amount)){echo $amount;}?>" required>
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Expense Date</label>
															<input type="date" name="expense_date" class="form-control" value="<?php if (!empty($expense_date)){echo $expense_date;}?>" required>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Comment</label>
															<input type="text" name="comment" class="form-control" value="<?php if (!empty($comment)){echo $comment;}?>" required>

															<input type="hidden" name="added_by" value="<?=$this->session->userdata('user_id');?>" required>
														</div>
													</div>

																	
												</div>
												
											</div>
											<div class="form-actions left">
											       <?php if (isset($update_id)){?>
                                                     <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
                                                  <?php }?>
												<button type="submit" class="btn default blue-stripe"> Save</button>
												<a href="<?=base_url();?>expense" class="btn default green-stripe"> Back</a>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
