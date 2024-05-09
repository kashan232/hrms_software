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
             <li><a href="{{ route('all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
                 </a>
             </li>
             <li class="has-menu"><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                {{-- <i class="flaticon-381-controls-3"></i> --}}
                <i class="fa-solid fa-user"></i>
                <span class="nav-text">All Leaves</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('all-leave') }}">All Leaves</a></li>
                <li><a href="{{ route('pending-leave') }}">Pending Leaves</a></li>
                <li><a href="{{ route('approve-leave') }}">Approve Leaves</a></li>
                <li><a href="{{ route('reject-leave') }}">Reject Leaves</a></li>
            </ul>

        </li>
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
