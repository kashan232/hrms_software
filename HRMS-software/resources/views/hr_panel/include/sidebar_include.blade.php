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

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="fas fa-check-circle"></i>
                    <span class="nav-text">Attendance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('hr-attendance-create') }}">Add Attendance</a></li>
                    <li><a href="{{ route('hr-employee-attendance') }}">Check Attendance</a></li>
                </ul>
            </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fa-solid fa-user"></i>
                     <span class="nav-text">Employee</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('hr-add-employee') }}">Add Employee</a></li>
                     <li><a href="{{ route('hr-all-employee') }}">List Employee</a></li>
                 </ul>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-user-cog"></i>
                     <span class="nav-text">Manager</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('hr-add-manager') }}">Add Manager</a></li>
                     <li><a href="{{ route('hr-all-manager') }}">List Manager</a></li>
                 </ul>
             </li>

             <li><a href="{{ route('all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-envelope-open-text"></i>
                     <span class="nav-text">Leaves</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('all-leave') }}">All Leaves</a></li>
                     <li><a href="{{ route('pending-leave') }}">Pending Leaves</a></li>
                     <li><a href="{{ route('approve-leave') }}">Approved Leaves</a></li>
                     <li><a href="{{ route('reject-leave') }}">Rejected Leaves</a></li>
                 </ul>
             </li>
             
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Offer Letter</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('hr-offer-letter') }}">Create Offer Letter</a></li>
                     <li><a href="{{ route('hr-all-offer-letter') }}">All Offer letter</a></li>
                 </ul>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-user-plus"></i>
                     <span class="nav-text"> Promotion</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('hr-promotion') }}">Create Promotion</a></li>
                     <li><a href="{{ route('hr-all-promotion') }}">All Promotion</a></li>
                 </ul>
             </li>

             <li><a class="has-arrow ai-icon" href="{{ route('hr-all-resignation') }}" aria-expanded="false">
                     <i class="fas fa-user-times"></i>
                     <span class="nav-text"> Resignation</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('hr-all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-envelope-open"></i>
                     <span class="nav-text">Add Leave Request</span>
                 </a>
             </li>
             <li><a class="has-arrow ai-icon" href="{{ route('employee-cmr') }}" aria-expanded="false">
                     <i class="fas fa-boxes"></i>
                     <span class="nav-text">CMR</span>
                 </a>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-money-bill-alt"></i>
                     <span class="nav-text">Expense</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-expense') }}">Add Expense</a></li>
                     <li><a href="{{ route('all-expense') }}">All Expense</a></li>
                 </ul>

             </li>
             <!-- <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-graduation-cap"></i>
                     <span class="nav-text">Jobs</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-hiring') }}">Add Jobs</a></li>
                     <li><a href="{{ route('all-hiring') }}">All Jobs</a></li>
                 </ul>
             </li> -->

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-clipboard"></i>
                     <span class="nav-text">Job Board</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-job-board') }}">Create Job Board</a></li>
                     <li><a href="{{ route('all-job-board') }}">Jobs Boards</a></li>
                 </ul>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="far fa-envelope"></i>
                     <span class="nav-text">Applications</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('job-applications') }}">Job Applications</a></li>
                     <li><a href="{{ route('approved-applications') }}">Approved Applications</a></li>
                     <li><a href="{{ route('rejected-applications') }}">Rejected Applications</a></li>
                     <li><a href="{{ route('Intervied-applications') }}">Interview Applications</a></li>
                     <li><a href="{{ route('hired-applications') }}">Hired Applications</a></li>
                 </ul>
             </li>
             
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-money-bill"></i>
                     <span class="nav-text">Payrol</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('create-salary') }}">Add Salary</a></li>
                     <li><a href="{{ route('generate-salary') }}">Generate Salary</a></li>
                 </ul>
             </li>

             <li class="has-menu">
                 <a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Reporting</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('report-expense-hr') }}">Expense Report</a></li>
                     <li><a href="{{ route('report-employee-cmr-hr') }}">CMR Report</a></li>
                     <li><a href="{{ route('report-all-jobs-hr') }}">Jobs Report</a></li>
                 </ul>
             </li>


             <!-- <li>
            <a class="has-arrow ai-icon" href="{{ route('remote-employee-listing') }}" aria-expanded="false">
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