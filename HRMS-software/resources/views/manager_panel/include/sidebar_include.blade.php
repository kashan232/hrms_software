 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li><a href="{{ route('home') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-networking"></i> --}}
                     <i class="fa-solid fa-house"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-check-circle"></i>
                     <span class="nav-text">Attendance</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('Manager-attendance-create') }}">Add Attendance</a></li>
                     <li><a href="{{ route('Manager-employee-attendance') }}">Check Attendance</a></li>
                 </ul>
             </li>


             <li>
                 <a href="{{ route('Manager-employee-record') }}" aria-expanded="false">
                     <i class="fas fa-solid fa-user"></i>
                     <span class="nav-text">Employees</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('manager-all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-envelope-open"></i>
                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-money-bill-alt"></i>
                     <span class="nav-text">Expense</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('manager-add-expense') }}">Add Expense</a></li>
                     <li><a href="{{ route('manager-all-expense') }}">All Expense</a></li>
                 </ul>

             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-graduation-cap"></i>
                     <span class="nav-text">Jobs</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('manager-add-hiring') }}">Add Jobs</a></li>
                     <li><a href="{{ route('manager-all-hiring') }}">All Jobs</a></li>
                 </ul>
             </li>

             <li><a class="has-arrow ai-icon" href="{{ route('project-listing-to-manager') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Projects</span>
                 </a>
             </li>

             <li><a class="has-arrow ai-icon" href="{{ route('manager-task') }}" aria-expanded="false">
                     <i class="fas fa-graduation-cap"></i>
                     <span class="nav-text">Task</span>
                 </a>
             </li>

             <!-- <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">

                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('manager-add-task') }}">Create Task</a></li>
                     <li><a href="{{ route('manager-task') }}">All Task</a></li>
                 </ul>
             </li> -->


             <li class="has-menu">
                 <a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Reporting</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('report-expense-manager') }}">Expense Report</a></li>
                     <li><a href="{{ route('report-all-jobs-manager') }}">Jobs Report</a></li>
                     <li><a href="{{ route('report-all-task-manager') }}">Task Report</a></li>
                 </ul>
             </li>

             <!-- <li><a class="has-arrow ai-icon" href="{{ route('manager-remote-employee-listing') }}"
                     aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-bell"></i>
                     <span class="nav-text">Remote Employee</span>
                 </a>
             </li> -->
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->