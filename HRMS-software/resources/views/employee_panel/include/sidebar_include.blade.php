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
             <li>
                 <a href="{{ route('all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-envelope-open"></i>
                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>

                 <li>
                     <a href="{{ route('employee-cmr') }}" aria-expanded="false">
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
                    <a href="#" aria-expanded="false">
                        <i class="fas fa-book-open"></i>
                        <span class="nav-text">Remote Work</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('add-employee-remote-work') }}">Add</a></li>
                        <li><a href="{{ route('all-employee-remote-work') }}">All</a></li>
                    </ul>
                </li>
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
