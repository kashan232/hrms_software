 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li><a href="{{ route('admin-dashboard') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-networking"></i> --}}
                     <i class="fa-solid fa-house"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             <li><a href="{{ route('department') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fa-solid fa-building-user"></i>
                     <span class="nav-text">Department</span>
                 </a>
             </li>
             <li><a href="{{ route('designation') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fa-solid fa-building-columns"></i>
                     <span class="nav-text">Designation</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fa-solid fa-user"></i>
                     <span class="nav-text">Employee</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-employee') }}">Add Employee</a></li>
                     <li><a href="{{ route('all-employee') }}">List Employee</a></li>
                     <li><a href="{{ route('get-designations') }}">Deleted Employee</a></li>
                 </ul>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fa-solid fa-user"></i>
                     <span class="nav-text">Attendance</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-employee') }}">Add Attendance</a></li>
                     <li><a href="{{ route('all-employee') }}">List Attendance</a></li>
                 </ul>

             </li>

             <li><a href="{{ route('all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
                 </a>
             </li>

             <li><a href="{{ route('all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-check-circle"></i>

                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="flaticon-381-television"></i>
                     <span class="nav-text">Evaluation Management</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a class="" href="{{ route('project') }}" aria-expanded="false">Project</a>
                     </li>
                     <li><a class="" href="{{ route('task') }}" aria-expanded="false">Task</a>
                    </li>
                 </ul>
             </li>

         </ul>

         {{-- <div class="copyright">
                    <p><strong>Jobie Dashboard</strong> © 2023 All Rights Reserved</p>
                    <p>by DexignZone</p>
                </div> --}}
     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
