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
             <li><a href="{{ route('all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-envelope-open-text"></i>
                     <span class="nav-text">All Leaves</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('all-leave') }}">All Leaves</a></li>
                     <li><a href="{{ route('pending-leave') }}">Pending Leaves</a></li>
                     <li><a href="{{ route('approve-leave') }}">Approve Leaves</a></li>
                     <li><a href="{{ route('reject-leave') }}">Reject Leaves</a></li>
                 </ul>

             </li>
             
             <li><a class="has-arrow ai-icon" href="{{ route('employee-cmr') }}" aria-expanded="false">
                     <i class="fas fa-boxes"></i>
                     <span class="nav-text">CMR</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-money-bill-alt"></i>
                     <span class="nav-text">Expense</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-expense') }}">Add Expense</a></li>
                     <li><a href="{{ route('all-expense') }}">All Expense</a></li>
                 </ul>

             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-graduation-cap"></i>
                     <span class="nav-text">Jobs</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-hiring') }}">Add Jobs</a></li>
                     <li><a href="{{ route('all-hiring') }}">All Jobs</a></li>
                 </ul>
             </li>

             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-graduation-cap"></i>
                     <span class="nav-text">Payrol</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('create-salary') }}">Add Salary</a></li>
                     <li><a href="{{ route('generate-salary') }}">Generate Salary</a></li>
                 </ul>
             </li>


             <li><a class="has-arrow ai-icon" href="{{ route('project-listing-to-hr') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Projects</span>
                 </a>
             </li>
             <li><a class="has-arrow ai-icon" href="{{ route('task') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-tasks"></i>
                     <span class="nav-text">Add Task</span>
                 </a>
             </li>
             
             <li><a class="has-arrow ai-icon" href="{{ route('remote-employee-listing') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-bell"></i>
                     <span class="nav-text">Remote Employee</span>
                 </a>
             </li>
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
