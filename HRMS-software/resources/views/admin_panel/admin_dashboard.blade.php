@include('admin_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin_panel.include.navbar_include')

    
    @include('admin_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="p-2 me-3 feature-icon rounded">
                                   <i class="fa-solid fa-building-user text-white"></i>
                                </span>
                               
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Total Departments</p>
                                    <span class="fs-48 text-white font-w600">{{ $departCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="card bg-info overflow-hidden">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fa-solid fa-building-columns text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Designation</p>
                                    <span class="fs-48 text-white font-w600">{{ $designationCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fa-solid fa-user text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Employee</p>
                                    <span class="fs-48 text-white font-w600">{{ $employeeCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- // new cards --}}
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fas fa-briefcase text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Projects</p>
                                    <span class="fs-48 text-white font-w600">{{ $projectCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="card bg-info overflow-hidden">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fas fa-briefcase text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Task</p>
                                    <span class="fs-48 text-white font-w600">{{ $taskCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fa-solid fa-clipboard-user text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Remote Employees</p>
                                    <span class="fs-48 text-white font-w600">{{ $remoteEmployeeCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fa-solid fa-graduation-cap text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Hiring</p>
                                    <span class="fs-48 text-white font-w600">{{ $hiringCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fa-solid fa-receipt text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Expense</p>
                                    <span class="fs-48 text-white font-w600">{{ $remoteEmployeeCount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="media align-items-center">
                            <span class="p-2 me-3 feature-icon rounded">
                                    <i class="fas fa-bell text-white"></i>
                                </span>
                                <div class="media-body text-end feature-icon-text">
                                    <p class="fs-18 text-white mb-2">Revenue</p>
                                    <span class="fs-48 text-white font-w600">{{ $remoteEmployeeCount }}</span>
                                </div>
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
            <p>Copyright © Designed &amp; Developed by <a href="#">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')
<script>
    // Fetch data from server-side (you need to implement this)
    // Example data
    var projectData = {
        labels: ['Completed', 'In Progress', 'Pending'],
        datasets: [{
            data: [20, 30, 50], // Example data, replace with your actual data
            backgroundColor: ['#4E36E2', '#1BD084', '#FF424D']
        }]
    };

    // Get the canvas element
    var ctx = document.getElementById('projectChart').getContext('2d');

    // Create new chart instance
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: projectData
    });
</script>
