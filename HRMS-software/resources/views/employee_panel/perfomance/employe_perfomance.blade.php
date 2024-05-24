@include('employee_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('employee_panel.include.navbar_include')


    @include('employee_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="text-center p-5 overlay-box" style="background-image: url(https://jobie.dexignzone.com/laravel/demo/images/big/img5.jpg);">
                                        <img src="images/profile/admin.png" width="100" class="img-fluid rounded-circle" alt="">
                                        <h3 class="mt-3 mb-0 text-white">Employee Name</h3>
                                        <h6 class="mt-3 mb-0 text-white">Employee Name</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0">Female</h4>
                                                    <small>Patient </small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0">Age: 24</h4>
                                                    <small>Years Old</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0">Female</h4>
                                                    <small>Patient </small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h4 class="mb-0">Age: 24</h4>
                                                    <small>Years Old</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer mt-0">
                                        <button class="btn btn-primary btn-lg btn-block">Contact</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-2 mb-2 text-center ">Attendance Overview</h3>
                            <div class="row">
                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="widget-stat card bg-secondary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                                <div class="media-body text-white">
                                                    <p class="mb-1">Total Present</p>
                                                    <h3 class="text-white">28</h3>
                                                    <div class="progress mb-2 bg-primary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                                    </div>
                                                    <small>76% Increase </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="widget-stat card bg-danger ">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                                <div class="media-body text-white">
                                                    <p class="mb-1">Total Absent</p>
                                                    <h3 class="text-white">250</h3>
                                                    <div class="progress mb-2 bg-secondary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                                    </div>
                                                    <small>30% Increase</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body  p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="fas fa-envelope-open"></i>
                                                </span>
                                                <div class="media-body text-white">
                                                    <p class="mb-1">Total Leave</p>
                                                    <h3 class="text-white">3280</h3>
                                                    <div class="progress mb-2 bg-secondary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                                    </div>
                                                    <small>80% Increase</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">
                            <div class="widget-stat card bg-success">
                                <div class="card-body p-4">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="flaticon-381-diamond"></i>
                                        </span>
                                        <div class="media-body text-white text-end">
                                            <p class="mb-1 text-white">Total Task</p>
                                            <h3 class="text-white">$56K</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">
                            <div class="widget-stat card bg-primary">
                                <div class="card-body p-4">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="flaticon-381-user-7"></i>
                                        </span>
                                        <div class="media-body text-white text-end">
                                            <p class="mb-1 text-white">Completed Task</p>
                                            <h3 class="text-white">$76</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">
                            <div class="widget-stat card bg-danger">
                                <div class="card-body  p-4">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="flaticon-381-calendar-1"></i>
                                        </span>
                                        <div class="media-body text-white text-end">
                                            <p class="mb-1 text-white">Late Task</p>
                                            <h3 class="text-white">76</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Task Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive recentOrderTable">
                                <table class="table verticle-middle table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ward No.</th>
                                            <th scope="col">Patient</th>
                                            <th scope="col">Dr Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Bills</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12</td>
                                            <td>Mr. Bobby</td>
                                            <td>Dr. Jackson</td>
                                            <td>01 August 2020</td>
                                            <td><span class="badge badge-rounded badge-primary">Checkin</span></td>
                                            <td>$120</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK
                    Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('employee_panel.include.footer_include')