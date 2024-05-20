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
             <li><a href="{{ route('manager-all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
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
             <li><a class="has-arrow ai-icon" href="{{ route('project-listing-to-manager') }}" aria-expanded="false">
                     {{-- <i class="flaticon-381-controls-3"></i> --}}
                     <i class="fas fa-briefcase"></i>
                     <span class="nav-text">Projects</span>
                 </a>
             </li>
         </ul>

     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->
