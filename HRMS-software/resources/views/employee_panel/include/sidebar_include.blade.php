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
             <li>
                 <a href="{{ route('all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-envelope-open"></i>
                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>
             
            <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="fas fa-check-circle"></i>
                    <span class="nav-text">Attendance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('employee-attendance-create') }}">Add Attendance</a></li>
                    <li><a href="{{ route('all-employee-attendance') }}">Check Attendance</a></li>
                </ul>
            </li>
            
             <li>
                 <a href="{{ route('seprate-employee-cmr') }}" aria-expanded="false">
                     <i class="fas fa-boxes"></i>
                     <span class="nav-text">CMR</span>
                 </a>
             </li>
             <li>
                 <a href="{{ route('mytask') }}" aria-expanded="false">
                     <i class="fas fa-book-open"></i>
                     <span class="nav-text">My Task</span>
                 </a>
             </li>
             <li>
                <a href="{{ route('employee-performance') }}" aria-expanded="false">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="nav-text"> Performance</span>
                </a>
            </li>

            <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="fas fa-check-circle"></i>
                    <span class="nav-text">Resignation</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('resignation-create') }}">Add Resignation</a></li>
                    <li><a href="{{ route('all-resignation') }}">All Resignation</a></li>
                </ul>
            </li>

         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
