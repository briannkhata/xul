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
							<div class="table-toolbar">
								<div class="row" style="margin-top: 2%;">
									<div class="col-md-12">
								<a href="<?=base_url();?>examination_paper/read" class="btn default">
											Add New
											</a>
									</div>
									
								</div>
							</div>
							<hr>
							<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="width:3%;">#</th>
								<th>Paper</th>
								<th>Main Subject</th>
								<th>Marks</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$count = 1;
							foreach ($this->M_examination_paper->get_examination_papers() as $row):?>
							<tr>
								<td><?=$count++;?></td>
								<td><?=$row['examination_paper'];?></td>
								<td>
									<?=$this->M_subject->get_subject($row['subject_id']);?>
								</td>
								<td><?=$row['total_marks'];?></td>

								<td>
									<div class="btn-group">
										<a href="<?=base_url();?>examination_paper/read/<?=$row['examination_paper_id'];?>" class="btn default"><i class="fa fa-edit"></i></a>
										
										<a href="<?=base_url();?>examination_paper/delete/<?=$row['examination_paper_id'];?>" class="btn default"><i class="fa fa-times-circle"></i></a>						
					</div>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php $this->load->view('footer');?>
