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
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-clipboard-user fa-2x mb-2 text-secondary"></i>
                                <h5 class="mb-0">Remote Employees</h5>
                                <h3 class="mt-2">{{ $remoteEmployeeCount }}</h3>
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
                    <a href="{{ route('all-revenue') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-user-tie fa-2x mb-2 text-success"></i>

                                <h5 class="mb-0">Jobs</h5>
                                <h3 class="mt-2">4</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-revenue') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Leaves</h5>
                                <h3 class="mt-2">5</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-revenue') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-question fa-2x mb-2 text-dark"></i>

                                <h5 class="mb-0">Quizes</h5>
                                <h3 class="mt-2">{{ $revenueCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Leave Status</h5>
                                        <canvas id="leaveStatusChart" width="600" height="600"></canvas>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-12">
                            <a href="#">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Attendance Chart</h5>
                                        <canvas id="attendanceChart"></canvas>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8 col-xxl-8 col-lg-6 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Expense Overview</h5>
                            <canvas id="expenseChart" width="400" height="400"></canvas>
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

<!-- Include Chart.js and ChartDataLabels library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

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
    const leaveStatusCtx = document.getElementById('leaveStatusChart').getContext('2d');
    const leaveStatusChart = new Chart(leaveStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Approved Leaves', 'Rejected Leaves', 'Pending Leaves'],
            datasets: [{
                label: 'Leave Status',
                data: [70, 20, 10],
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

    // Expense Chart
    const expenseCtx = document.getElementById('expenseChart').getContext('2d');
    const expenseChart = new Chart(expenseCtx, {
        type: 'bar',
        data: {
            labels: ['2024-10-15', '2024-10-16', '2024-10-17'], // Example labels, adjust as needed
            datasets: [{
                label: 'Expenses',
                data: [300, 200, 400], // Example data points, replace with actual data
                backgroundColor: '#007bff',
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
                    text: 'Expense Overview',
                    color: '#000'
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#000',
                    },
                },
                x: {
                    ticks: {
                        color: '#000',
                    },
                }
            }
        }
    });

    // attendace chart

    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceChart = new Chart(ctx, {
        type: 'pie', // Pie chart
        data: {
            labels: ['Present', 'Absent', 'Leave'],
            datasets: [{
                label: 'Attendance Status',
                data: [12, 3, 5], // Change these values according to your data
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