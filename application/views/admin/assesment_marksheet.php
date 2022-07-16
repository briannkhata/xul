<?php $this->load->view('header');?>
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
						
						</div>
						<?php
						  $term_id = $this->M_assesment->get_term_id($assesment_id);
						  $subject_id = $this->M_assesment->get_subject_id($assesment_id);
						  $subject = $this->M_subject->get_subject($subject_id);
						  $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
						  $assesment_type_id = $this->M_assesment->get_assesment_type_id($assesment_id);
						  $title = $this->M_assesment->get_title($assesment_id);
						?>
						<div class="portlet-body">
							<table class="table well">
								<tr>
									<td colspan="2"><?=$title;?> | 
									<?=$this->M_assesment_type->get_assesment_type($assesment_type_id);?>
									      | <?=$subject;?></td>
								</tr>
								<tr>
									<td>Total Marks</td>
									<td><?=$this->M_assesment->get_total_marks($assesment_id);?> %</td>
								</tr>
								<tr>
									<td>Assigned By </td>
									<td><?=$this->M_user->get_user($this->M_assesment->get_added_by($assesment_id));?></td>
								</tr>
								<tr>
									<td>Term </td>
									<td><?=$this->M_term->get_term($term_id);?></td>
								</tr>
								

								<tr>
									<td>Date Assigned </td>
									<td><?=$this->M_assesment->get_date_assigned($assesment_id);?> |
										<?=$this->M_assesment->get_due_date($assesment_id);?></td>
								</tr>

								<tr>
									<td>Class </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-12">
							   <div class="form-group">
							    <div class="input-group">
							     <span class="input-group-addon">Search</span>
							     <input type="text" name="search" id="search" placeholder="Name..." class="form-control" />
							    </div>
							   </div>
							</div>
							</div>
						
						<form action="#" id="formMarksASS">
							<table class="table table-bordered">
							<thead>
							<tr>
								<th style="width:2%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Mark</th>
								<th>Action</th>
							</tr>
							</thead>
						<input type="hidden" name="grade_level_id" id="grade_level_id" value="<?=$grade_level_id;?>">
						<input type="hidden" name="assesment_id" id="assesment_id" value="<?=$assesment_id;?>">

							<tbody id="RESULT">
							
					<?php 
					$count = 1;
					foreach ($this->M_user->get_students_by_class($grade_level_id) as $row):
$assesment_mark_id = $this->M_assesment->get_assesment_mark_id($assesment_id,$grade_level_id,$row['user_id']);
$mark_obtained = $this->M_assesment->get_mark_obtained($assesment_id,$grade_level_id,$row['user_id']);
		$grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);
		$point_based = $this->M_grade_group->get_point_based($grade_group_id);
?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=strtoupper($row['name']);?></td>
								<td><?=$row['reg_no'];?></td>
								<td><?=ucfirst($row['gender']);?>
<input type="hidden" name="assesment_mark_id[]" value="<?php if(isset($assesment_mark_id)) echo $assesment_mark_id;?>">
<input type="hidden" name="user_id[]" value="<?=$row['user_id'];?>">
								</td>
								<td>
									<input type="text" name="mark_obtained[]" value="<?php if(isset($mark_obtained)) echo $mark_obtained;?>"></td>
									
								</td>
								<td class="no-print">
									<a href="" class="btn default btn-xs red-stripe" onclick="delete_mark(<?=$assesment_mark_id;?>)"><i class="fa fa-times-circle"></i></a>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
						</table>
							
							<center>
								
							 <a type="button" onclick="save_marks()"  class="btn default">
								Save Marks</a>
						   <a href="<?=base_url();?>assesment" class="btn default">Back</a>
										
							</center>
							</form>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php $this->load->view('footer');?>

			<script type="text/javascript">
				function save_marks(){
					var formData = $('#formMarksASS').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>assesment/save_marks',
					    cache:false,
					    traditional: true,
					    data: formData,
					    dataType: "json",
					    success: function(data, textStatus, jqXHR){
					        alert('Marks Saved Successfully');
					        location.reload();
					    },
					    error: function(xhr,status,error){
					        alert('Error!! Saving Data');
					    }
					}); 
			    }

			function delete_mark(assesment_mark_id){
				$.post("<?=base_url();?>assesment/delete_mark",
					{
					assesment_mark_id: assesment_mark_id
				},
				function(data,status){
					location.reload();
				});
			}

			function search(grade_level_id,search,assesment_id){
				$.post("<?=base_url();?>assesment/delete_mark",
					{
				  grade_level_id: grade_level_id,
					assesment_id:assesment_id,
					      search:search
				},
				function(data,status){
					jQuery('#RESULT').html('');
					//location.reload();
				});
			}

			$('#RES').dataTable({
			      "paging": false,
		        "ordering": false,
		            "info": false
			});

			function load_data(search){
			  $.ajax({
			      url:"<?=base_url(); ?>user/searchUser",
			   method:"POST",
			     data:{
			     	search:search,
		    grade_level_id:$('#grade_level_id').val(),
		      assesment_id:$('#assesment_id').val()
			         },
			   success:function(data){
			    $('#RESULT').html(data);
			   }
			  })
			 }

			 $('#search').keyup(function(){
			  var search = $(this).val();

			  if(search != ''){
			   	load_data(search);
			    } else {
			    location.reload();
			  }
			});
		</script>
