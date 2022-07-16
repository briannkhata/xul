<?php $this->load->view('header');?>
	<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
								<?=$page_title;?>
							</div>

						</div>
						
						<div class="portlet-body">
							<table class="table well">
								<tr>
									<td>Academic Year </td>
									<td><?=$this->M_academic_year->get_academic_year($academic_year_id);?></td>
								</tr>
								<tr>
									<td>Term</td>
									<td><?=$this->M_term->get_term($term_id);?></td>
								</tr>
								<tr>
									<td>Study Mode </td>
									<td><?=$this->M_study_mode->get_study_mode($study_mode_id);?></td>
								</tr>
								<tr>
									<td>Scholarship </td>
									<td><?=$this->M_scholarship_type->get_scholarship_type($scholarship_type_id);?></td>
								</tr>
								<tr>
									<td>Class </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>

								<tr>
									<td>Charge type</td>
									<td><?=$this->M_charge_type->get_charge_type($charge_type_id);?></td>
								</tr>
							
							</table>
						<form action="" method="post" id="formCharges">
<input type="hidden" name="charge_type_id" id="charge_type_id" value="<?=$charge_type_id;?>">
<input type="hidden" name="study_mode_id" id="study_mode_id" value="<?=$study_mode_id;?>">
<input type="hidden" name="academic_year_id" id="academic_year_id" value="<?=$academic_year_id;?>">
<input type="hidden" name="term_id" id="term_id" value="<?=$term_id;?>">
<input type="hidden" name="grade_level_id" id="grade_level_id" value="<?=$grade_level_id;?>">
<input type="hidden" name="scholarship_type_id" id="scholarship_type_id" value="<?=$scholarship_type_id;?>">

							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width:3%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Class</th>
								<th>Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$data = [];
								$db = $this->db->select('user_id')->from('charges')
								->where('term_id',$term_id)
								->where('academic_year_id',$academic_year_id)
								->where('charge_type_id',$charge_type_id)
								->get()->result_array();
								if(count($db) > 0)
								{
									foreach($db as $row)
									{ $data[] = $row['user_id']; }
								}
								$this->db->select('*');
								if(!empty($data))
								$this->db->where_not_in('user_id',$data);
								$this->db->where('deleted',0);
								$this->db->where('role','student');
								$this->db->where('academic_year_id',$academic_year_id);
								if(isset($study_mode_id)){
									$this->db->where('study_mode_id',$study_mode_id);
								}elseif(isset($scholarship_type_id)){								
									$this->db->where('scholarship_type_id',$scholarship_type_id);
								}elseif(isset($grade_level_id)){
									$this->db->where('grade_level_id',$grade_level_id);
								}elseif(isset($grade_level_id) && isset($scholarship_type_id)){
									$this->db->where('grade_level_id',$grade_level_id);
									$this->db->where('scholarship_type_id',$scholarship_type_id);
								}elseif(isset($study_mode_id) && isset($grade_level_id)){
									$this->db->where('grade_level_id',$grade_level_id);
									$this->db->where('study_mode_id',$study_mode_id);
								}elseif(isset($study_mode_id) && isset($scholarship_type_id)){
									$this->db->where('study_mode_id',$study_mode_id);
									$this->db->where('scholarship_type_id',$scholarship_type_id);
								}elseif(isset($grade_level_id) && isset($scholarship_type_id) && isset($study_mode_id)){
									$this->db->where('grade_level_id',$grade_level_id);
									$this->db->where('scholarship_type_id',$scholarship_type_id);
									$this->db->where('study_mode_id',$study_mode_id);
								}else{

								}
								$list = $this->db->get('users')->result_array();
				
							$count = 1;
							foreach ($list as $row):?>
							<tr>
							<td><?=$count++;?>
							<input type="hidden" name="user_id[]" value="<?=$row['user_id'];?>"></td>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=$row['gender'];?></td>
								<td><?=$this->M_grade_level->get_grade_level($row['grade_level_id']);?></td>
								<td><?=number_format($this->M_charge_type->get_amount($charge_type_id),2);?></td>
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well no-print">
								
						   <a name="button" onclick="apply_charges()" class="btn default">Apply Charges</a>
						   <a href="<?=base_url();?>charge/invoices1" class="btn default">Back</a>
										
							</center>
							</form>
							
					
			</div>
			<?php $this->load->view('footer');?>
			<script type="text/javascript">
				
              if($('.checkall').length > 0) {
                          $('.checkall').click(function(){
                            var parentTable = $(this).parents('table');                       
                            var ch = parentTable.find('tbody input[type=checkbox]');                     
                            if($(this).is(':checked')) {
                            
                              //check all rows in table
                              ch.each(function(){ 
                                $(this).attr('checked',true);
                                $(this).parent().addClass('checked');  //used for the custom checkbox style
                                $(this).parents('tr').addClass('selected'); // to highlight row as selected
                              });
                                    
                            
                            } else {
                              
                              //uncheck all rows in table
                              ch.each(function(){ 
                                $(this).attr('checked',false); 
                                $(this).parent().removeClass('checked'); //used for the custom checkbox style
                                $(this).parents('tr').removeClass('selected');
                              }); 
                              
                            }
                          });
                        }

            	function apply_charges(){
					var formData = $('#formCharges').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>charge/apply_charges',
					    data: formData,
					    dataType: "json",
					    success: function(data, textStatus, jqXHR){
					        alert('Charges applied Successfully');
					        location.reload();
					    },
					    error: function(xhr,status,error){
					        alert('Error!!');
					    }
					}); 
			    }


              function apply_charges1(){
                    var user_id = [];
                     jQuery('.cc:checked').each(function(i,e){
                       user_id.push(jQuery(this).val());
                    });

                  if(user_id ==''){
                    alert('PLEASE SELECT ATLEAST ONE STUDENT TO APPLY CHARGES!');
                  }else{
                 if(confirm('Are you sure ????'))
                {
                  jQuery.post("<?=base_url()?>staff/maintain_salary",
                  {
                     user_id : user_id
                  },
                  function(data,status){
                      //location.href="<?php echo base_url();?>admin/salary_changes"
                      location.reload();

                  });
                    }
                }
              }
  

			</script>
			