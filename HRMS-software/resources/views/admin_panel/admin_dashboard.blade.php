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
                <div class="d-flex flex-wrap mb-4 row">

                    <div class="col-xl-4 col-lg-4 mb-2">
                        <h2 class="text-black  font-w600 mb-1">Welcome : <strong>{{ Auth::user()->name }}</strong></h2> <!-- Use h2 for bigger font and bold employee name -->
                    </div>

                    @if(session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- class="card" style="width: auto; border: 1px solid #007bff;" -->
                    <div class="col-xl-8 col-lg-8 d-flex justify-content-end align-items-center">
                        <div class="ms-3"> <!-- Margin start for spacing -->
                            <div> <!-- Card for date with primary border -->
                                <div class="card-body">
                                    <h6 id="currentDate" class="text-center fs-16" style="margin: 0;"></h6> <!-- Smaller font for date -->
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock me-2" style="font-size: 16px;"></i> <!-- Smaller clock icon -->
                            <div id="currentTime" class="fs-14"></div> <!-- Current time with smaller font -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Mark Absent HRs -->
                <!-- <div class="col-md-4 mb-3">
                    <form action="{{ route('admin.mark-absent') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">
                            Mark Absent HRs
                        </button>
                    </form>
                </div> -->

                <!-- Mark Absent Managers -->
                <!-- <div class="col-md-4 mb-3">
                    <form action="{{ route('admin.mark-absent-manager') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-block">
                            Mark Absent Managers
                        </button>
                    </form>
                </div> -->

                <!-- Mark Absent Employees -->
                <!-- <div class="col-md-4 mb-3">
                    <form action="{{ route('admin.mark-absent-employee') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info btn-block">
                            Mark Absent Employees
                        </button>
                    </form>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('department') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-building-user fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Total Departments</h5>
                                <h3 class="mt-2">{{ $departCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('designation') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-building-columns fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Designation</h5>
                                <h3 class="mt-2">{{ $designationCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-employee') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-user fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Employees</h5>
                                <h3 class="mt-2">{{ $employeeCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('project') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-briefcase fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Projects</h5>
                                <h3 class="mt-2">{{ $projectCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('employee-task-update') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-tasks fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Tasks</h5>
                                <h3 class="mt-2">{{ $taskCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hiring-listing') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-graduation-cap fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Hiring</h5>
                                <h3 class="mt-2">{{ $hiringCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('expense-listing') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-receipt fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Expenses</h5>
                                <h3 class="mt-2">{{ $expenseCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-revenue') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-bell fa-2x mb-2 text-dark"></i>
                                <h5 class="mb-0">Revenue</h5>
                                <h3 class="mt-2">{{ $revenueCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-quiz-creation') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-question fa-2x mb-2 text-dark"></i>

                                <h5 class="mb-0">Quizes</h5>
                                <h3 class="mt-2">{{ $revenueCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('leaves') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Leaves</h5>
                                <h3 class="mt-2">{{ $totalLeaveCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin-approve-leave') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-check fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Approve Leaves</h5>
                                <h3 class="mt-2">{{ $approvedLeaveCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin-reject-leave') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-times fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Reject Leaves</h5>
                                <h3 class="mt-2">{{ $rejectedLeaveCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Leave Status</h5>
                                        <canvas id="leaveStatusChart" width="600" height="600"></canvas>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Attendance Chart</h5>
                                        <canvas id="attendanceChart"></canvas>
                                    </div>
                                </div>
                            </a>
                        </div>





                    </div>
                </div>
                <br>
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Expense Overview</h5>
                            <canvas id="expenseChart"></canvas>
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

@include('admin_panel.include.chart')

<!-- Include Chart.js and ChartDataLabels library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    // Fetch the dynamic leave data from the server (using Blade variables)
    const approvedLeaves = {
        {
            $approvedLeaveCount
        }
    };
    const pendingLeaves = {
        {
            $pendingLeaveCount
        }
    };
    const rejectedLeaves = {
        {
            $rejectedLeaveCount
        }
    };

    // Leave Status Chart
    const leaveStatusCtx = document.getElementById('leaveStatusChart').getContext('2d');
    const leaveStatusChart = new Chart(leaveStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Approved Leaves', 'Rejected Leaves', 'Pending Leaves'],
            datasets: [{
                label: 'Leave Status',
                data: [approvedLeaves, rejectedLeaves, pendingLeaves], // Use dynamic data here
                backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#000'
                    }
                },
                title: {
                    display: true,
                    text: 'Leave Status Overview',
                    color: '#000'
                },
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: '#fff',
                    formatter: (value, ctx) => {
                        const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        const percentage = ((value / total) * 100).toFixed(1) + '%';
                        return percentage;
                    },
                }
            },
        },
        plugins: [ChartDataLabels],
    });
</script>

<script>
    const presentCount = {
        {
            $presentCount
        }
    };
    const absentCount = {
        {
            $absentCount
        }
    };
    const leaveCount = {
        {
            $leaveCount
        }
    };


    // attendace chart
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceChart = new Chart(ctx, {
        type: 'pie', // Pie chart
        data: {
            labels: ['Present', 'Absent', 'Leave'],
            datasets: [{
                label: 'Attendance Status',
                data: [presentCount, absentCount, leaveCount], // Change these values according to your data
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Attendance Summary'
                }
            }
        }
    });
</script>

<script>
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const date = now.toLocaleDateString('en-US', options);
        const time = now.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });

        document.getElementById('currentDate').innerText = date;
        document.getElementById('currentTime').innerText = time;
    }

    setInterval(updateTime, 1000);
    updateTime();

    // Leave Status Chart
</script>