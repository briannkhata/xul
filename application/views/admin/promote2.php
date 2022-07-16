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
									<td>Grade Level </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>

								<tr>
									<td>Promote to </td>
									<td><?=$this->M_grade_level->get_grade_level($to);?></td>
								</tr>
							</table>
						<form action="" method="post" id="formPromote">
							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width:3%;"><input type="checkbox" class="checkall"></th>
								<th>Student</th>
								<th>Reg Number</th>
								<th>Gender</th>
								<th>Section</th>
							</tr>
							</thead>
							<tbody>
							<input type="hidden" name="academic_year_id" value="<?=$academic_year_id;?>">
							<input type="hidden" name="to" value="<?=$to;?>">
							<?php foreach ($this->M_user->get_students_by_class($grade_level_id) as $row){?>
							<tr>
								<td>
									<input type="checkbox" class="cc" name="user_id[]" value="<?=$row['user_id'];?>">
								</td>
								<td><?=$row['name'];?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=$row['gender'];?></td>
								<td><?=$this->M_section->get_section($row['section_id']);?></td>				
							</tr>
							<?php }?>
							</tbody>
							
							</table>
							<center class="well no-print">
								
								<button name="button" onclick="register()" class="btn default green-stripe">
								Promote</button>
						
						   <a href="<?=base_url();?>user/promote" class="btn default red-stripe">Back</a>
										
							</center>
							</form>
							
					
			</div>
			<?php $this->load->view('footer');?>
			<script type="text/javascript">
				function register(){
					var formData = $('#formPromote').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>user/promote3',
					    data: formData,
					    dataType: "json",
					    success: function(data, textStatus, jqXHR){
					        alert('Students promoted Saved Successfully');
					        location.reload();
					    },
					    error: function(xhr,status,error){
					        alert('Error!! Saving Data');
					    }
					}); 
			    }

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
			      </script>


