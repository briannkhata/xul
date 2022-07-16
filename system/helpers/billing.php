<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?=$system;?> | <?=$page_title;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link href="<?=base_url();?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?=base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?=base_url();?>assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?=base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?=base_url();?>assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<?php include'includes/header_top.php';?>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
			<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
				<?php include 'includes/nav.php';?>
			</div>
		</div>
	<!-- END SIDEBAR -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!--div class="page-head">
				<div class="page-title">
					<h1><?=$company;?></h1>
				</div>
				<div class="page-toolbar">
					<!-- BEGIN THEME PANEL -
					<div class="btn-group btn-theme-panel">
						<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
						<i class="icon-settings"></i>
						</a>
						<div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<h3>THEME</h3>
									<ul class="theme-colors">
										<li class="theme-color theme-color-default active" data-theme="default">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Dark Header</span>
										</li>
										<li class="theme-color theme-color-light" data-theme="light">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Light Header</span>
										</li>
									</ul>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 seperator">
									<h3>LAYOUT</h3>
									<ul class="theme-settings">
										<li>
											 Theme Style
											<select class="layout-style-option form-control input-small input-sm">
												<option value="square" selected="selected">Square corners</option>
												<option value="rounded">Rounded corners</option>
											</select>
										</li>
										<li>
											 Layout
											<select class="layout-option form-control input-small input-sm">
												<option value="fluid" selected="selected">Fluid</option>
												<option value="boxed">Boxed</option>
											</select>
										</li>
										<li>
											 Header
											<select class="page-header-option form-control input-small input-sm">
												<option value="fixed" selected="selected">Fixed</option>
												<option value="default">Default</option>
											</select>
										</li>
										<li>
											 Top Dropdowns
											<select class="page-header-top-dropdown-style-option form-control input-small input-sm">
												<option value="light">Light</option>
												<option value="dark" selected="selected">Dark</option>
											</select>
										</li>
										<li>
											 Sidebar Mode
											<select class="sidebar-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
										<li>
											 Sidebar Menu
											<select class="sidebar-menu-option form-control input-small input-sm">
												<option value="accordion" selected="selected">Accordion</option>
												<option value="hover">Hover</option>
											</select>
										</li>
										<li>
											 Sidebar Position
											<select class="sidebar-pos-option form-control input-small input-sm">
												<option value="left" selected="selected">Left</option>
												<option value="right">Right</option>
											</select>
										</li>
										<li>
											 Footer
											<select class="page-footer-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					 END THEME PANEL --
				</div>-- END PAGE TOOLBAR 
			</div>-- END PAGE HEAD -->
		
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-basket"></i>
									<span class="caption-subject font-green-sharp bold uppercase">
									<?=$page_title;?></span>
								</div>
								<div class="actions btn-set">
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_general" data-toggle="tab">
											Billing </a>
										</li>
									</ul>
									<div class="tab-content no-space">
												<div class="tab-pane active" id="tab_general">
													<div class="portlet-body">
														<p></p>
																<form action="<?=base_url();?>admin/addbill" method="post" id="fomu">
																	<?php 
																	
																	//$client_id=$this->session->userdata('client_id');
																	$total_amount = 0;
																	$total_minus_discount = 0;
																	$charges = $this->db->select('*')->from('requested_tests')->where('client_id',$client_id)->get()->result_array();
																	foreach($charges as $c0):
																		$amount1 = $c0['amount'];
																		$total_amount += $amount1;
																	endforeach;
																													
																	?>
																	<div class="col-md-12">
																		<div class="form-group">
																			<div class="input-group margin-top-10">
																				<span class="input-group-addon">Total Bill</span>
																				   <input type="text" name="total_bill" id="total_bill" class="form-control input-lg" value="<?=$total_amount;?>" readonly>
																				<span class="input-group-addon">MK</span>
																			</div>	
																		</div>	
																	</div>
													
																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Amount Tendered</label>
																			 <input type="text" name="amount_tendered" id="amount_tendered" class="form-control input-lg" placeholder="Amount Tendered">
																		</div>		
																	</div>	
																			
																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Discount</label>
																				<input type="text" name="discount" id="discount" class="form-control input-lg" placeholder="Discount">
																		</div>	
																	</div>
																			
																			
																	<div class="col-md-12">
																		<div class="form-group">
																			<div class="input-group margin-top-10">
																				<span class="input-group-addon">Balance</span>
																				<input type="text" name="change" id="change" class="form-control input-lg" value="0.00" readonly>
																				<span class="input-group-addon">MK</span>
																			</div>	
																		</div>	
																	</div>
																											
																	<div class="col-md-6">
																		<div class="form-group">
																			<button type="reset" class="btn btn-default">Cancel</button>
																			<button type="submit"  class="btn blue">add bill</button>
																		</div>
																	</div>
																</form>
													
												</div>
										</div>
													
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2017 &copy; Designed and Developed by Focus IT
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<script src="<?=base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?=base_url();?>assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/scripts/datatable.js"></script>
<script src="<?=base_url();?>assets/admin/pages/scripts/ecommerce-products-edit.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/admin/pages/scripts/ui-extended-modals.js"></script>
 <script type="text/javascript">
       /*     $(function () {
                $('#fomu').hide();
				$('#lucia').click(function(e){
				    $('#fomu').show();
					$('#formbilling')[0].reset();
					$('#formbilling').hide();
				});				
            });*/
 </script>
<script type="text/javascript">

   var save_method; //for save method string
    var table;
	function add_client()
    {
      //save_method = 'add';
      //$('#formclient')[0].reset(); // reset form on modals
      //$('#client').modal('show'); // show bootstrap modal
	  location.href="<?=base_url();?>admin/add_client";
	  
    }
	function addbill()
    {
      //save_method = 'add';
      //$('#formclient')[0].reset(); // reset form on modals
      $('#billing').modal('show'); // show bootstrap modal
	  //location.href="<?=base_url();?>admin/add_client";
	  
    }
	
    function edit_client(id)
    {
      save_method = 'update';
      $('#formclient')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/client_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			
			$('[name="client_id"]').val(data.client_id);
            $('[name="name"]').val(data.name);
            $('[name="email"]').val(data.email);
			$('[name="pay_mode"]').val(data.pay_mode);
			$('[name="gender"]').val(data.gender);
			$('[name="address"]').val(data.address);
			$('[name="phone"]').val(data.phone);
			$('[name="request_date"]').val(data.request_date);
          	$('[name="doctor_name"]').val(data.doctor_name);
			$('[name="dob"]').val(data.dob);
			$('[name="clinic_id"]').val(data.clinic_id);
			$('[name="test_id"]').val(data.test_id);
			
            $('#patient').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Patient'); // Set title to Bootstrap modal title
			$('.zanda').text('Save changes');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
 
    function vclient(id)
    {
       //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/client_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			
			$('[name="client_id"]').val(data.client_id);
            $('[name="name"]').val(data.name);
            $('[name="lname"]').val(data.lname);
            $('[name="email"]').val(data.email);
			$('[name="pay_mode"]').val(data.pay_mode);
			$('[name="gender"]').val(data.gender);
			$('[name="address"]').val(data.address);
			$('[name="phone"]').val(data.phone);
			$('[name="request_date"]').val(data.request_date);
          	$('[name="doctor_name"]').val(data.doctor_name);
			$('[name="dob"]').val(data.dob);
			$('[name="clinic_id"]').val(data.clinic_id);
			$('[name="test_id"]').val(data.test_id);
			
            $('#vclient').modal('show');
            $('.modal-title').text('CLIENT DETAILS');
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
	 function savee()
    {
      var url = "<?php echo site_url('admin/client_update')?>";
   
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#formclient').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
                location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert('Error adding or updating data!');
					
            }
        });
    }
 
 
 
 
    function save()
    {
      var url;
	 // var url_0= "<?php echo site_url('admin/receipt_preview')?>";
     // if(save_method == 'add')
      //{
          url = "<?php echo site_url('admin/new_patient');?>";
      //}
      //else
     // {
      //  url = "<?php echo site_url('admin/client_update')?>";
      //}
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#formbilling').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               //$('#billing').modal('show');
              //location.reload();// for reload a page
			  //location.href=url_0;
			 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                //alert('Error adding or updating data!');
					  //location.href=url_0;
            }
        });
    }
 
    function delete_client(id)
    {
      if(confirm('Are you sure you want to delete the selected CLIENT?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('admin/client_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }
 
  </script>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datepicker();
				$('#dob').datepicker();
				$('#d1').datepicker();
				$('.selectpicker').select2();
				$('#clinic_id').select2();
				$('#pay_mode').select2();
				$('#faki').select2();
				$('#maopo').dataTable();
				$('#mmaop').dataTable();
				
				
            });
 </script>
<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	<script>
		function addclient()
		{
		  var url = "<?php echo site_url('admin/client_add')?>";
		
		   // ajax adding data to database
			  $.ajax({
				url : url,
				type: "POST",
				data: $('#formzanda').serialize(),
				dataType: "JSON",
				success: function(data)
				{
				   alert("DATA SAVED SUCCESSFULLY");
				   $('#formzanda')[0].reset();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding or updating data!');

				}
				/*complete: function(xhr,status) 
				{
					alert("DATA SAVED SUCCESSFULLY");
				   $('#formzanda')[0].reset();
				}*/
			});
		}
	</script>
</body>
<!-- END BODY -->
</html>


			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="patient" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="border-radius:0px; min-width:40%; margin-left:5%;">
					<div class="modal-header alert-primary">
							<h4 class="modal-title"></h4>
					</div>
				<div class="modal-body">
					<form role="form" action="#" id="formclient">
					   
							<div class="col-md-6">
								<div class="form-group">
								  <label for="exampleInputEmail1">Fullname</label>
								      <input type="hidden" name="client_id" value="">
				    				   <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Fullname" required>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label>Test</label>
								  <select class="form-control selectpicker" name="test_id[]" multiple>
								  <option selected disabled>Select test</option>
								  <?php $test=$this->db->get('tests')->result_array();?>
								  <?php foreach($test as $row):?>
									  <option value="<?=$row['test_id'];?>"><?=$row['test_name'];?></option>
									<?php endforeach;?>
								  </select>
								</div>
							</div>		
							<div class="col-md-6">
								<div class="form-group">
								  <label for="exampleInputEmail1">Request Date</label>
								  <input type="text" class="form-control" name="request_date" id="d1" placeholder="Request Date" required>
								</div>
							</div>
										
							<div class="col-md-6">
								<div class="form-group">
								  <label for="exampleInputEmail1">Phone No.</label>
								  <input type="tel" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Phone No." required>
								</div>
							</div>
					
										
							<div class="col-md-12">
								<div class="form-group">
									  <label for="exampleInputEmail1">Contact Address</label>
									  <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Contact Address" required>
								</div>
							</div>
									
							<div class="col-md-6">
								<div class="form-group">
								  <label for="exampleInputEmail1">Email</label>
								  <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email address" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  <label for="exampleInputEmail1">Age</label>
								  <input type="text" class="form-control" name="age" id="age" placeholder="Age">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label>Gender</label>
								  <select class="form-control" name="gender">
								  <option selected disabled>Select gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								  </select>
								</div>
							</div>
			
						<div class="col-md-6">
							<div class="form-group">
							  <label>Pay Mode</label>
							  <select class="form-control" name="pay_mode">
							  <option selected disabled>Select option</option>
							  <?php $mode=$this->db->get('payment_mode')->result_array();?>
							  <?php foreach($mode as $zoba):?>
									<option value="<?=$zoba['pay_mode'];?>"><?=$zoba['pay_mode'];?></option>
								<?php endforeach;?>
							  </select>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							  <label>Hospital</label>
							  <select class="form-control" name="clinic_id">
							  <option selected disabled>Select hospital</option>
							  <?php $clinic=$this->db->get('clinics')->result_array();?>
							  <?php foreach($clinic as $row):?>
								  <option value="<?=$row['clinic_id'];?>"><?=$row['clinic_name'];?></option>
								<?php endforeach;?>
							  </select>
							</div>
						</div>		
						
						<div class="col-md-6">
							<div class="form-group">
								 <label for="exampleInputEmail1">Doctor's Name</label>
								 <input type="text" class="form-control" name="doctor_name" id="exampleInputEmail1" placeholder="Doctor's name">
							</div>
						</div>

		
					<div class="col-md-12">
						<div class="form-group">
							<div class="modal-footer">
								 <button type="button" class="btn blue zanda" onclick="savee()">SAVE</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
			<!-- /.modal -->
			
			
							<div id="billing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="border-radius:0px;">
								<div class="modal-body">
									
									<form action="<?=base_url();?>admin/addbill" method="post" id="formbill" class="form-horizontal">
											<?php 
											
											$client_id=$this->session->userdata('client_id');
											$total_amount = 0;
											$total_minus_discount = 0;
											$charges = $this->db->select('*')->from('requested_tests')->where('client_id',$client_id)->get()->result_array();
											foreach($charges as $c0):
												$amount1 = $c0['amount'];
												$total_amount += $amount1;
											endforeach;
											
											
											?>
											<div class="col-md-12">
												<div class="form-group">
													<div class="input-group margin-top-10">
														<span class="input-group-addon">Total Bill</span>
														   <input type="text" name="total_bill" id="total_bill" class="form-control input-lg" value="<?=$total_amount;?>" readonly>
														<span class="input-group-addon">MK</span>
													</div>	
												</div>	
											</div>
							
											<div class="col-md-6">
												<div class="form-group">
													<label>Amount Tendered</label>
													 <input type="text" name="amount_tendered" id="amount_tendered" class="form-control input-lg" placeholder="Amount Tendered">
												</div>		
											</div>	
													
											<div class="col-md-6">
												<div class="form-group">
													<label>Discount</label>
														<input type="text" name="discount" id="discount" class="form-control input-lg" placeholder="Discount">
												</div>	
											</div>
													
													
											<div class="col-md-12">
												<div class="form-group">
													<div class="input-group margin-top-10">
														<span class="input-group-addon">Balance</span>
														<input type="text" name="change" id="change" class="form-control input-lg" value="0.00" readonly>
														<span class="input-group-addon">MK</span>
													</div>	
												</div>	
											</div>
							
										
								
										<div class="col-md-6">
											<div class="form-group">
												
													<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
													<button type="submit"  class="btn blue">add bill</button>
												
											</div>
										</div>
								</form>
							</div>