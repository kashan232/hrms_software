 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li><a href="{{ route('home') }}" aria-expanded="false">
                     <i class="fa-solid fa-house"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             <li><a href="{{ route('department') }}" aria-expanded="false">
                     <i class="fa-solid fa-building-user"></i>
                     <span class="nav-text">Department</span>
                 </a>
             </li>
             <li><a href="{{ route('designation') }}" aria-expanded="false">
                     <i class="fa-solid fa-building-columns"></i>
                     <span class="nav-text">Designation</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-user-cog"></i>
                     <span class="nav-text">HR</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-hr') }}">Add HR</a></li>
                     <li><a href="{{ route('all-hr') }}">List HR</a></li>
                     <!-- {{-- <li><a href="{{ route('get-designations') }}">Deleted Employee</a></li> --}} -->
                 </ul>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-user-cog"></i>
                     <span class="nav-text">Manager</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-manager') }}">Add Manager</a></li>
                     <li><a href="{{ route('all-manager') }}">List Manager</a></li>
                     <li><a href="{{ route('allhr-manager') }}">HR Managers</a></li>
                     <!-- {{-- <li><a href="{{ route('get-designations') }}">Deleted Employee</a></li> --}} -->
                 </ul>
             </li>
             <li class="has-menu">
                 <a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fa-solid fa-user"></i>
                     <span class="nav-text">Employee</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-employee') }}">Add Employee</a></li>
                     <li><a href="{{ route('all-employee') }}">List Employee</a></li>
                     <li><a href="{{ route('allhr-employee') }}">List HR Employee</a></li>
                     <li><a href="{{ route('deleted-employee-screen') }}">Deleted Employee</a></li>
                 </ul>
             </li>
             <li>
                 <a class="has-arrow ai-icon" href="{{ route('daily-attendance') }}" aria-expanded="false">
                     <i class="fas fa-check-circle"></i>
                     <span class="nav-text">Attendance</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Project & Task</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('project') }}">Project</a></li>
                     <li><a href="{{ route('employee-task-update') }}">Task</a></li>
                 </ul>

             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-envelope-open-text"></i>
                     <span class="nav-text">approve Leaves</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('leaves') }}">Leaves</a></li>
                     <li><a href="{{ route('admin-all-leave') }}">Leave Requests</a></li>
                     <li><a href="{{ route('admin-pending-leave') }}">Pending Leaves</a></li>
                     <li><a href="{{ route('admin-approve-leave') }}">Approve Leaves</a></li>
                     <li><a href="{{ route('admin-reject-leave') }}">Reject Leaves</a></li>
                 </ul>

             </li>

             <li>
                 <a class="has-arrow ai-icon" href="{{ route('hiring-listing') }}" aria-expanded="false">
                     <i class="fa-solid fa-graduation-cap"></i>
                     <span class="nav-text">Jobs</span>
                 </a>
             </li>
             <li>
                 <a class="has-arrow ai-icon" href="{{ route('expense-listing') }}" aria-expanded="false">
                     <i class="fa-solid fa-receipt"></i>
                     <span class="nav-text">Expense</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-bell"></i>
                     <span class="nav-text">Revenue</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-revenue') }}">Add Revenue</a></li>
                     <li><a href="{{ route('all-revenue') }}">All Revenue</a></li>
                 </ul>

             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Reporting</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('report-employee-attendance') }}">Employee Attendance</a></li>
                     <li><a href="{{ route('report-employee-performance') }}">Employee Performance</a></li>
                     <li><a href="{{ route('report-leave') }}">Employee leave Report</a></li>
                     <li><a href="{{ route('hr-report-leave') }}">HR leave Report</a></li>
                     <li><a href="{{ route('manager-report-leave') }}">Manager leave Report</a></li>
                     <li><a href="{{ route('report-expense') }}">Expense Report</a></li>
                     <li><a href="{{ route('report-revenue') }}">Revenue Report</a></li>
                 </ul>

             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-question"></i>
                     <span class="nav-text">Quiz</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('Quiz-creation') }}">Quiz Creation</a></li>
                     <li><a href="{{ route('all-quiz-creation') }}">Quizzes</a></li>
                 </ul>

             </li>

         </ul>
     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->