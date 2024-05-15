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
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->