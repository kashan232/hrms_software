@include('hr_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f7fb;
    }

    .card {
        border-radius: 8px;
        border: none;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        background-color: white;
        border-bottom: none;
        padding: 15px 20px;
    }

    .card-body {
        padding: 15px 20px;
        max-height: 300px;
        /* Limit the height of the card */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    .list-unstyled li {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .leave-status {
        font-size: 0.9rem;
        font-weight: 500;
        color: #999;
        margin-left: 15px;
    }

    .status-pending {
        color: #ffae42;
    }

    .status-approved {
        color: #4CAF50;
    }

    .status-rejected {
        color: #f44336;
    }

    .leave-icon {
        font-size: 1rem;
        margin-right: 8px;
    }

    .leave-title {
        font-size: 1rem;
        font-weight: bold;
    }

    .leave-details {
        font-size: 0.85rem;
        color: #888;
    }

    a.apply-link {
        font-size: 0.9rem;
        color: #0062cc;
        text-decoration: none;
    }

    a.apply-link:hover {
        text-decoration: underline;
    }
</style>
<div id="main-wrapper">

    @include('hr_panel.include.navbar_include')


    @include('hr_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">

                <div class="row">
                    <div class="d-flex flex-wrap mb-4 row">
                        <div class="col-xl-4 col-lg-4 mb-2">
                            <h2 class="text-black  font-w600 mb-1">Welcome Back, <br> Hr: <strong>&nbsp;{{ Auth::user()->name }}</strong></h2> <!-- Use h2 for bigger font and bold employee name -->
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
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-employee') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Employees</h5>
                                <h3 class="mt-2"> {{ $hremployeecounts }} </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-manager') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-warning"></i>
                                <h5 class="mb-0">Managers</h5>
                                <h3 class="mt-2">{{ $all_managercounts }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-leaverequest') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Leave Requests</h5>
                                <h3 class="mt-2">{{ $leaves }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-expense') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-dollar-sign fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Expense</h5>
                                <h3 class="mt-2">{{ $expenseCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-hiring') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-user-tie fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Hiring</h5>
                                <h3 class="mt-2">{{ $hiringCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-resignation') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-times-circle fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Resignation</h5>
                                <h3 class="mt-2">{{ $EmployeeResignations }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-promotion') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-user-plus fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Promotion</h5>
                                <h3 class="mt-2">{{ $EmployeePromotions }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('hr-all-offer-letter') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope-open fa-2x mb-2 text-secondary"></i>
                                <h5 class="mb-0">Offer letters</h5>
                                <h3 class="mt-2">{{ $OfferLetters }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <!-- My Leaves Section -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>My Teams</h5>
                        </div>
                        <div class="card-body">
                            <div id="teamAttendanceDonut"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="m-0">My Leaves</h6>
                            <a href="#" class="apply-link">Apply for Leaves</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <!-- Pending Leave -->
                                @foreach($LeaveRequests as $LeaveRequest)
                                <li class="d-flex justify-content-between">
                                    <div>

                                        @if ($LeaveRequest->leave_approve == 'Pending')
                                        <span class="leave-icon">⏳</span>
                                        @elseif ($LeaveRequest->leave_approve == 'Approve')
                                        <span class="leave-icon">✔️</span>
                                        @elseif ($LeaveRequest->leave_approve == 'Reject')
                                        <span class="leave-icon">❌</span>
                                        @endif

                                        <span class="leave-title">{{ $LeaveRequest->leave_from_date }} - {{ $LeaveRequest->leave_to_date }}</span>
                                        <br />
                                        <span class="leave-details">{{ $LeaveRequest->leave_reason }}</span>
                                    </div>
                                    @if ($LeaveRequest->leave_approve == 'Pending')
                                    <div class="leave-status status-pending">Pending</div>

                                    @elseif ($LeaveRequest->leave_approve == 'Approve')
                                    <div class="leave-status status-approved">Approved</div>

                                    @elseif ($LeaveRequest->leave_approve == 'Reject')
                                    <div class="leave-status status-rejected">Rejected</div>

                                    @endif

                                </li>
                                @endforeach
                            </ul>
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
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('hr_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const date = now.toLocaleDateString('en-US', options); // Format date
        const time = now.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        }); // Format time

        document.getElementById('currentDate').innerText = date; // Set current date
        document.getElementById('currentTime').innerText = time; // Set current time
    }

    setInterval(updateTime, 1000); // Update time every second
    updateTime(); // Initial call to display time immediately
</script>

<script>
    // Corrected ApexCharts Donut Chart Configuration
    var options = {
        series: [40, 10, 20, 30], // On Time, Absent, Leave, Present
        chart: {
            type: 'donut',
            height: 300,
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
            }
        },
        labels: ['On Time', 'Absent', 'Leave', 'Present'],
        colors: ['#28a745', '#dc3545', '#fd7e14', '#007bff'], // Color codes
        legend: {
            position: 'right',
            fontSize: '14px',
            labels: {
                colors: ['#333'],
                useSeriesColors: true
            },
            markers: {
                width: 12,
                height: 12,
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%', // Bigger hole in the middle
                    labels: {
                        show: true,
                        total: {
                            showAlways: true,
                            show: true,
                            label: 'Total',
                            fontSize: '16px',
                            fontWeight: 600,
                            color: '#000',
                            formatter: function(w) {
                                return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                return val.toFixed(1) + "%"; // Correct percentage format
            }
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    width: '100%'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    // Attendance stats passed from the controller
    var attendanceStats = @json($attendanceStats);

    // Donut Chart Configuration
    var attendanceOptions = {
        series: [
            attendanceStats.ontime,
            attendanceStats.absent,
            attendanceStats.leave,
            attendanceStats.present
        ], // Dynamic data for On Time, Absent, Leave, Present
        chart: {
            type: 'donut',
            height: 300,
        },
        labels: ['On Time', 'Absent', 'Leave', 'Present'],
        colors: ['#28a745', '#dc3545', '#fd7e14', '#007bff'],
        legend: {
            position: 'right',
            fontSize: '14px',
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                }
            }
        },
        dataLabels: {
            enabled: true,
        }
    };

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#teamAttendanceDonut"), attendanceOptions);
    chart.render();
</script>