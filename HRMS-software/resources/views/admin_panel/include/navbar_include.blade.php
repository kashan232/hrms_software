<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img src="/images/hrms_logo/hrms_white.png" alt="" style="max-width:150px;">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
    Header start
***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Dashboard </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item">
                            <div class="input-group search-area d-xl-inline-flex d-none">
                                <input type="text" class="form-control" placeholder="Search something here...">
                                <div class="input-group-append">
                                    <button class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                                </div>
                            </div>
                        </li>
                       
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="/images/profile/admin.png" width="20" alt="" />
                                @if (Auth::check())
                                    <div class="header-info">
                                        <span class="text-black">{{ Auth::user()->name }}</span>
                                        <p class="fs-12 mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                @else
                                    <div class="header-info">
                                        <span class="text-black">Guest</span>
                                        <p class="fs-12 mb-0">Please log in</p> 
                                    </div>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('Admin-Change-Password') }}" class="dropdown-item ai-icon">
                                    <i class="fas fa-unlock text-primary"></i>
                                    <span class="ms-2">Change Password </span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">{{ __('Log Out') }} </span>
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div> <!--**********************************
            Header end ti-comment-alt
        ***********************************-->