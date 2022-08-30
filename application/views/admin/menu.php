<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-accordion-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="#" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active">
					<a href="<?=base_url();?>User/dashboard">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				
				</li>	
				<li>
					<a href="javascript:;">
					<i class="fa fa-gears"></i>
					<span class="title">Configs</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>User/Settings">
							- Set Up</a>
						</li>

						<li>
							<a href="<?=base_url();?>Department">
							- Departments</a>
						</li>

						<li>
							<a href="<?=base_url();?>Branch">
							 - Branches</a>
						</li>

						<li>
							<a href="<?=base_url();?>Taxband">
							 - Tax Bands</a>
						</li>
						<li>
							<a href="<?=base_url();?>Pparam">
							 - Pension Parameters</a>
						</li>
						<li>
							<a href="<?=base_url();?>grade">
							 - Grades</a>
						</li>

						<li>
							<a href="<?=base_url();?>Job">
							 - Jobs</a>
						</li>

						<li>
							<a href="<?=base_url();?>Jobrequirement">
							 - Job Requirements</a>
						</li>

						<li>
							<a href="<?=base_url();?>Bank">
							 - Banks</a>
						</li>
						<li>
							<a href="<?=base_url();?>Staff_type">
							 - Staff Types</a>
						</li>

						<li>
							<a href="<?=base_url();?>Leavetype">
							 - Leave Types</a>
						</li>
						<li>
							<a href="<?=base_url();?>Overtimetype">
							 - Overtime Types</a>
						</li>

						
						<li>
							<a href="<?=base_url();?>department">
							 - Departments</a>
						</li>

						<li>
							<a href="<?=base_url();?>Attendancecode">
							 - Attendance Codes</a>
						</li>
					</ul>
				</li>		
				<li>
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">Manage People</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">

						<li>
							<a href="<?=base_url();?>User">
							- Staff</a>
						</li>
						<li>
							<a href="<?=base_url();?>User/read">
							 - Create Staff</a>
						</li>

						<li>
							<a href="<?=base_url();?>Role">
							 - Roles</a>
						</li>

					
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-file"></i>
					<span class="title">Manage Earnings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>overtime/add_overtimes1">
							 - Add Overtime</a>
						</li>

						<li>
							<a href="<?=base_url();?>bonus/add_bonus1">
							 - Add Bonuses</a>
						</li>

						<li>
							<a href="<?=base_url();?>arrear/add_arrears1">
							 - Add Arrears</a>
						</li>

						<li>
							<a href="<?=base_url();?>bonus">
							 - Bonuses</a>
						</li>

						<li>
							<a href="<?=base_url();?>arrear">
							 - Arrears</a>
						</li>
						<li>
							<a href="<?=base_url();?>add_overtime">
							 - Add Overtime</a>
						</li>

						<li>
							<a href="<?=base_url();?>grade_group">
							 - Buld Add Overtime</a>
						</li>

						<li>
							<a href="<?=base_url();?>Overtime/filter">
							 - Filter Overtimes</a>
						</li>

					</ul>
				</li>

					<li>
					<a href="javascript:;">
					<i class="fa fa-filter"></i>
					<span class="title">Health Schemes</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>schemetype">
							 - Scheme types</a>
						</li>
						<li>
							<a href="<?=base_url();?>membershiptype">
							 - Membership types</a>
						</li>
						<li>
							<a href="<?=base_url();?>beneficiary">
							- Benefiaries</a>
						</li>
					
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-money"></i>
					<span class="title">Salary Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>attendance_code">
							- Bonttendance Codes</a>
						</li>
						<li>
							<a href="<?=base_url();?>attendance/filter_staff_attendance">
							- Take staff Attendance</a>
						</li>
						<li>
							<a href="<?=base_url();?>attendance/filter_student_attendance">
							- Take student Attendance</a>
						</li>

						<li>
							<a href="<?=base_url();?>attendance/filter_staff_attendance1">
							- Staff Attendance - Daily</a>
						</li>

						<li>
							<a href="<?=base_url();?>attendance/filter_student_attendance1">
							- Student Attendance - Daily</a>
						</li>

						<li>
							<a href="<?=base_url();?>attendance/filter_student_attendance3">
							- Student Attendance - Termly</a>
						</li>
						
						
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-calendar"></i>
					<span class="title">Leave Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">

					<li>
							<a href="<?=base_url();?>leaveapplication/read">
							- Create Leave</a>
						</li>

						<li>
							<a href="<?=base_url();?>leaveapplication">
							- Leave Applications</a>
						</li>

						<li>
							<a href="<?=base_url();?>leaveapplication/approved">
							- Approved Applications</a>
						</li>

						<li>
							<a href="<?=base_url();?>leaveapplication/approved">
							- On Leave</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;">
					<i class="fa fa-comments"></i>
					<span class="title">Communication</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>sms/send_sms">
							- Send SMS</a>
						</li>
						<li>
							<a href="<?=base_url();?>sms">
							- SMS History</a>
						</li>

						<li>
							<a href="<?=base_url();?>email">
							- Emails</a>
						</li>
						
					</ul>
				</li>
			
			
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>