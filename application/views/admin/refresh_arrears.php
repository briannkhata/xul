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
                        <a href="<?=base_url();?>arrear" class="btn default">
                                Back
                            </a>
                            <a href="#" class="btn default green-stripe">
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->M_arrear->get_arrears_by_month_and_year($month,$year) as $row):?>
                        <tr>
                            <td><?=$this->M_user->get_user($row['user_id']);?></td>
                            <td><?=$row['month'];?> | <?=$row['year'];?> </td>
                            <td><?=number_format($row['amount'],2);?></td>
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