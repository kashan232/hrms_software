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
             <li><a href="{{ route('all-leaverequest') }}" aria-expanded="false">
                     <i class="fas fa-check-circle"></i>

                     <span class="nav-text">Leave Request</span>
                 </a>
             </li>
             <li><a class="has-arrow ai-icon" href="{{ route('mytask') }}" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
                <span class="nav-text">My task</span>
            </a>

        </li>
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
