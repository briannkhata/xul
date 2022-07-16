                    <?php $this->load->view('header');?>
              <div class="portlet box grey" style="border:1px solid #E5E5E5;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <?=$page_title;?> 
                                        </div>
                                    
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="<?=base_url();?>user/graduate2" method="post" class="horizontal-form">
                                            <div class="form-body">
                                                <br>
                                            
                                                <div class="row">
                                                 

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Class</label>
                                                            <select class="form-control" name="to">
                                                                <option selected="" disabled="">Option</option>
                                            <?php foreach ($this->M_grade_level->get_grade_levels() as $row){?>
                                            <option value="<?=$row['grade_level_id'];?>">
                                                                    <?=$row['grade_level'];?>
                                                                </option>
                                                            <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Academic Session</label>
                                                            <select class="form-control" name="academic_year_id">
                                                                <option selected="" disabled="">Option</option>
                                        <?php foreach ($this->M_academic_year->get_active_academic_years() as $row){?>
                                            <option value="<?=$row['academic_year_id'];?>">
                                                                    <?=$row['academic_year'];?>
                                                                </option>
                                                            <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Date Graduated</label>
                                                            <input type="date" name="date_graduated" class="form-control">
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
