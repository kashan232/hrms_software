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
                     <i class="fas fa-check-circle"></i>

                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('employee-cmr') }}" aria-expanded="false">
                     <i class="fas fa-check-circle"></i>

                     <span class="nav-text">CMR</span>
                 </a>
             </li>

         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->