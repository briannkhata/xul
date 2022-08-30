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
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <a href="<?=base_url();?>beneficiary/read" class="btn default green-stripe">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Beneficiary</th>
                            <th>Deduction Status</th>
                            <th>Date of Birth</th>
                            <th>Beneficiary Status</th>
                            <th>Join Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->M_beneficiary->get_beneficiaries() as $row):?>
                        <tr>
                            <td><?=$this->M_user->get_user($row['user_id']);?><br>
                                <?=$this->M_schemetype->get_schemetype($row['schemetype_id']);?> |
                                <?=$this->M_membershiptype->get_membershiptype($row['membershiptype_id']);?></td>
                            <td><?=$row['beneficiary'];?> - <?=$row['membershipnumber'];?> </td>
                            <td><?php if($row['deduct']== 1):?>
                                DEDUCT
                                <br>
                                <b><?=number_format($row['damount'],2);?></b>
                                <?php else:?>
                                DO NOT DEDUCT
                                <?php endif;?>
                            </td>
                            <td><?=date('d F Y',strtotime($row['dob']));?></td>
                            <td><?=$row['benstatus'];?></td>
                            <td><?=date('d F Y',strtotime($row['join_date']));?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?=base_url();?>beneficiary/read/<?=$row['beneficiary_id'];?>"
                                        class="btn btn-sm default green-stripe"><i class="fa fa-edit"></i></a>
                                    <a href="<?=base_url();?>beneficiary/delete/<?=$row['beneficiary_id'];?>"
                                        class="btn btn-sm default red-stripe"><i class="fa fa-times-circle"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<?php $this->load->view('footer');?>