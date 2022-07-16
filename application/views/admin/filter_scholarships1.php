                    <?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <?=$page_title;?> 
                                        </div>
                                    
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?=base_url();?>scholarship/filter2" method="post" class="horizontal-form">
												<div class="form-body">
												<br>
												<div class="row">
							
													<div class="col-md-7">
														<div class="form-group">
															<label class="control-label">Scholarship type</label>
														      <select class="form-control" name="scholarship_type_id">
															<option selected="" disabled="">Scholarship type</option>
															<?php foreach ($this->M_scholarship_type->get_scholarship_types() as $row) {?>
																<option value="<?=$row['scholarship_type_id'];?>">
																	<?=$row['scholarship_type'];?>
																</option>
															<?php }?>
															
														</select>
													</div>
												</div>

											</div>


												
											</div>
											<div class="form-actions left">
											     
												<button type="submit" class="btn default blue-stripe"> View Records</button>
											</div>
										</form>
										<!-- END FORM-->
								</div>
						<?php $this->load->view('footer');?>
