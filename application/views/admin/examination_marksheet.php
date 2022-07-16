<?php $this->load->view('header');?>
	<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey" style="border:1px solid #E5E5E5;">
						<div class="portlet-title">
							<div class="caption">
							</div>

						</div>
						<?php
						  $academic_year_id = $this->M_examination->get_academic_year_id($examination_id);
						  $subject_id = $this->M_examination_paper->get_subject_id($examination_paper_id);
						  $subject = $this->M_subject->get_subject($subject_id);
						  $grade_group_id = $this->M_grade_level->get_grade_group_id($grade_level_id);

						?>
						<div class="portlet-body">
							<table class="table well">
								<tr>
									<td>Academic Year </td>
									<td><?=$this->M_academic_year->get_academic_year($academic_year_id);?></td>
								</tr>
								<tr>
									<td>Examination </td>
									<td><?=$this->M_examination->get_examination($examination_id);?></td>
								</tr>

								<tr>
									<td>Examination Paper </td>
									<td><?=$this->M_examination_paper->get_examination_paper($examination_paper_id);?>
										(<?=$subject;?>) 
									</td>
								</tr>
								<tr>
									<td>Total Marks</td>
									<td><?=$this->M_examination_paper->get_total_marks($examination_paper_id);?></td>
								</tr>

								<tr>
									<td>Grade Level </td>
									<td><?=$this->M_grade_level->get_grade_level($grade_level_id);?></td>
								</tr>
							</table>

							<div class="row">
								<div class="col-md-12">
							   <div class="form-group">
							    <div class="input-group">
							     <span class="input-group-addon">Search</span>
							     <input autofocus="" type="text" name="search" id="search" placeholder="Name..." class="form-control" />
							    </div>
							   </div>
							</div>
							</div>

						<form action="#" method="post" id="formMarks">
							<table class="table table-bordered">
							<thead class="well">
							<tr>
								<th style="width: 2%;">#</th>
								<th>Student</th>
								<th>Reg No</th>
								<th>Gender</th>
								<th>Mark</th>
								<th>Action</th>
							</tr>
							</thead>
							<input type="hidden" name="grade_level_id" id="grade_level_id" value="<?=$grade_level_id;?>">
			<input type="hidden" name="examination_paper_id" id="examination_paper_id" value="<?=$examination_paper_id;?>">
							<input type="hidden" name="examination_id" id="examination_id" value="<?=$examination_id;?>">

							<tbody id="RESULT">
				
							<?php 
							$count = 1;
							foreach ($this->M_user->get_students_by_class($grade_level_id) as $row):
$examination_mark_id = $this->M_examination->get_examination_mark_id($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);
$mark_obtained = $this->M_examination->get_mark_obtained($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);
$points = $this->M_examination->get_points($examination_id,$grade_level_id,$examination_paper_id,$row['user_id']);
?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=strtoupper($row['name']);?>
<input type="hidden" name="examination_mark_id[]" value="<?php if(isset($examination_mark_id)) echo $examination_mark_id;?>">
<input type="hidden" name="user_id[]" value="<?=$row['user_id'];?>">
<input type="hidden" name="points[]" value="<?=$points;?>">


								</td>
								<td><?=$row['reg_no'];?></td>
								<td><?=ucfirst($row['gender']);?></td>
								<td>
								<input type="text" name="mark_obtained[]" value="<?php if(isset($mark_obtained)) echo $mark_obtained;?>"></td>
								
								<td>
									<a href="" class="btn default" onclick="delete_mark(<?=$examination_mark_id;?>)"><i class="fa fa-times-circle"></i></a>
								</td>

								
							</tr>
							<?php endforeach;?>
							</tbody>
							
							</table>
							<center class="well no-print">
								
						   <a onclick="save_marks()" class="btn default">Save Marks</a>
						   <a href="<?=base_url();?>examination/filter_examination" class="btn default">Back</a>
										
							</center>
							</form>
							
					
			</div>
			<?php $this->load->view('footer');?>
			<script type="text/javascript">
				function save_marks(){
					var formData = $('#formMarks').serializeArray();
					$.ajax({
					    type : "POST",
					      url: '<?=base_url();?>examination/save_marks',
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

				function delete_mark(examination_mark_id){
				$.post("<?=base_url();?>examination/delete_mark",
					{
					examination_mark_id: examination_mark_id
				},
				function(data,status){
					location.reload();
				});
			}

			function load_data(search){
			  $.ajax({
			      url:"<?=base_url(); ?>user/searchUser2",
			   method:"POST",
			     data:{
			     	search:search,
		    grade_level_id:$('#grade_level_id').val(),
      examination_paper_id:$('#examination_paper_id').val(),
		    examination_id:$('#examination_id').val()
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
