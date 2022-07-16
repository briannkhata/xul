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
					<span class="title">Academics</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>academic_year">
							- Academic Years</a>
						</li>

						<li>
							<a href="<?=base_url();?>term">
							- Terms</a>
						</li>

						<li>
							<a href="<?=base_url();?>section">
							 - Sections</a>
						</li>

						<li>
							<a href="<?=base_url();?>subject">
							 - Subjects</a>
						</li>
						<li>
							<a href="<?=base_url();?>study_mode">
							 - Mode of study</a>
						</li>

						<li>
							<a href="<?=base_url();?>scholarship_type">
							 - Scholarship types</a>
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
							<a href="<?=base_url();?>user/students">
							- Students</a>
						</li>
						<li>
							<a href="<?=base_url();?>parento">
							- Parents</a>
						</li>

						<li>
							<a href="<?=base_url();?>department">
							 - Departments</a>
						</li>

						<li>
							<a href="<?=base_url();?>staff_type">
							 - Staff type</a>
						</li>

						<li>
							<a href="<?=base_url();?>user/staffs">
							- Staff</a>
						</li>

						<li>
							<a href="<?=base_url();?>responsibility">
							 - Responsibilities</a>
						</li>

						<li>
							<a href="<?=base_url();?>discipline">
							 - Discipline</a>
						</li>

						<li>
							<a href="<?=base_url();?>scholarship">
							 - Scholarships</a>
						</li>

						<li>
							<a href="<?=base_url();?>duty">
							 - Duty</a>
						</li>
						<li>
							<a href="<?=base_url();?>user/graduates">
							 - Graduates</a>
						</li>
					
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-file"></i>
					<span class="title">Examinations</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>grade_group">
							 - Grade groups</a>
						</li>

						
						<li>
							<a href="<?=base_url();?>grade_level">
							 - Grade Levels</a>
						</li>

						<li>
							<a href="<?=base_url();?>grade_point">
							 - Grade Points</a>
						</li>

						<li>
							<a href="<?=base_url();?>grade_remark">
							 - Grade Remarks</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination">
							- Examinations</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination_paper">
							- Examination papers</a>
						</li>
						<li>
							<a href="<?=base_url();?>assesment_type">
							- Assesment types</a>
						</li>
						<li>
							<a href="<?=base_url();?>assesment">
							- Assesments</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination/filter_examination">
							- Add Exam Marks</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination/swatch1">
							- Swatch Double Papers</a>
						</li>
						<li>
							<a href="<?=base_url();?>assesment/filter_assesment">
							- Filter Assesment Marks</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination/filter_examination2">
							- Filter Exam Marks (Subject)</a>
						</li>

						<li>
							<a href="<?=base_url();?>examination/filter_examination4">
							- Filter Exam Marks (Papers)</a>
						</li>
						<li>
							<a href="<?=base_url();?>examination/filter_report_cards">
							- Report Cards</a>
						</li>

					
						<li>
							<a href="<?=base_url();?>examination/filter_marksheet">
							- Marksheet</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-money"></i>
					<span class="title">Accounting</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>charge_type">
							 - Charge types</a>
						</li>
						<li>
							<a href="<?=base_url();?>income_type">
							 - Income types</a>
						</li>
						<li>
							<a href="<?=base_url();?>expense_type">
							 - Expense types</a>
						</li>
						<li>
							<a href="<?=base_url();?>expense">
							- Expenses</a>
						</li>
						<li>
							<a href="<?=base_url();?>income">
							- Incomes</a>
						</li>
						<li>
							<a href="<?=base_url();?>charge">
							- Charges</a>
						</li>
						<li>
							<a href="<?=base_url();?>payment">
							- Payments</a>
						</li>
						
						
					</ul>
				</li>

					<li>
					<a href="javascript:;">
					<i class="fa fa-file"></i>
					<span class="title">Library</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>book_category">
							 - Categories</a>
						</li>
						<li>
							<a href="<?=base_url();?>book_shelf">
							 - Book Shelves</a>
						</li>
						<li>
							<a href="<?=base_url();?>book">
							- Books</a>
						</li>
						<li>
							<a href="<?=base_url();?>book_rentout">
							- Rent Outs</a>
						</li>
						<li>
							<a href="<?=base_url();?>book/receivings">
							- Receivings</a>
						</li>

						
						<li>
							<a href="<?=base_url();?>book/filter_books">
							- Book Report</a>
						</li>	
						<li>
							<a href="<?=base_url();?>book/filter_student_books">
							- User Books</a>
						</li>					
						
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-calendar"></i>
					<span class="title">Attendance</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>attendance_code">
							- Attendance Codes</a>
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
					<i class="fa fa-filter"></i>
					<span class="title">Hostel</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>hostel_type">
							- Hostel types</a>
						</li>
						<li>
							<a href="<?=base_url();?>hostel">
							- Hostels</a>
						</li>

						<li>
							<a href="<?=base_url();?>hostel_prefect">
							- Prefects</a>
						</li>

						<li>
							<a href="<?=base_url();?>hostel/student_hostels">
							- Occupants</a>
						</li>

						<li>
							<a href="<?=base_url();?>Hostel/filter_hostels">
							- Filter Hostels</a>
						</li>
						
					</ul>
				</li>

				<li>
					<a href="javascript:;">
					<i class="fa fa-flask"></i>
					<span class="title">Laboratory</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?=base_url();?>lab_shelf">
							- Shelfs</a>
						</li>
						<li>
							<a href="<?=base_url();?>lab_type">
							- Categories</a>
						</li>

						<li>
							<a href="<?=base_url();?>lab_item">
							- Items</a>
						</li>

						<li>
							<a href="<?=base_url();?>lab_item/receivings">
							- Receivings</a>
						</li>

						<li>
							<a href="<?=base_url();?>lab_item/filter_lab_items">
							- Lab Report</a>
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
			
			
			
				<li>
					<a href="<?=base_url();?>user/settings">
					<i class="fa fa-cogs"></i>
					<span class="title">Settings</span>
					</a>
						
				</li>
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>