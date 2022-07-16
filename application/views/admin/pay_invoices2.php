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
									<td><?=$this->M_scholarship_type->get_scholarship_type($scholarship_type_id);?></td>
								</tr>

							
							
							</table>
						<form action="" method="post" id="formCharges">
<input type="hidden" name="academic_year_id" id="academic_year_id" value="<?=$academic_year_id;?>">
<input type="hidden" name="term_id" id="term_id" value="<?=$term_id;?>">

							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width:3%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Class</th>
								<th>Amount</th>
								<th>Charge</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$this->db->where('charges.term_id',$term_id);
								$this->db->where('charges.academic_year_id',$academic_year_id);

								if(isset($grade_level_id)){
								 $this->db->where('grade_level_id',$grade_level_id);
							  }elseif(isset($scholarship_type_id)){
							  	$this->db->where('scholarship_type_id',$scholarship_type_id);
							  }elseif(isset($study_mode_id)){
							  	$this->db->where('scholarship_type_id',$study_mode_id);
							  }elseif (isset($scholarship_type_id) && isset($grade_level_id)) {
							  	$this->db->where('scholarship_type_id',$scholarship_type_id);
							  	$this->db->where('grade_level_id',$grade_level_id);
							  }else{
							  }

								$this->db->where('charges.deleted',0);
								$this->db->or_where('charges.deleted',2);
								$this->db->join('users','users.user_id = charges.user_id');
								$list = $this->db->get('charges')->result_array();
							$count = 1;
							foreach ($list as $row){?>
							<tr>
							<td><?=$count++;?>
						  <input type="hidden" name="user_id[]" value="<?=$row['user_id'];?>">
							<input type="hidden" name="charge_id[]" value="<?=$row['charge_id'];?>"></td>
								<td><?=$this->M_user->get_user($row['user_id']);?></td>
								<td><?=$this->M_user->get_reg_no($row['user_id']);?></td>
								<td><?=$this->M_user->get_gender($row['user_id']);?></td>
								<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								<td><input style="border: none;" type="text" name="amount_paid[]" value="<?=$row['balance'];?>"></td>
								<td><?=$this->M_charge_type->get_charge_type($row['charge_type_id']);?></td>
							</tr>
							<?php }?>
							</tbody>
							
							</table>
							<center class="well no-print">
								
						   <a onclick="pay_charges()" class="btn default">Pay Charges</a>
 						   <a onclick="window.print()" class="btn default">Print</a>
						   <a href="<?=base_url();?>charge/pay_invoices1" class="btn default">Back</a>
										
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

            	function pay_charges(){
					var formData = $('#formCharges').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>charge/pay_charges',
					    data: formData,
					    dataType: "json",
					    success: function(data, textStatus, jqXHR){
					        alert('Charges paid Successfully');
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
			