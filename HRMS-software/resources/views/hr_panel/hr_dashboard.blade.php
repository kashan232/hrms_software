@include('hr_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
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
                    <a href="{{ route('all-leaverequest') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Employees</h5>
                                <h3 class="mt-2">0</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-leaverequest') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-plane-departure fa-2x mb-2 text-warning"></i>
                                <h5 class="mb-0">Managers</h5>
                                <h3 class="mt-2">0</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-leave') }}">
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
                                <i class="fas fa-user-tie fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Hiring</h5>
                                <h3 class="mt-2">{{ $hiringCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-clipboard-list fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Projects</h5>
                                <h3 class="mt-2">{{ $projectCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-tasks fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Task</h5>
                                <h3 class="mt-2">{{ $taskCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-line fa-2x mb-2 text-secondary"></i>
                                <h5 class="mb-0">Revenue</h5>
                                <h3 class="mt-2">{{ $revenueCount }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="row">
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
                            <div class="card-header">
                                <h5>Employee Check-in/Check-out Times</h5>
                            </div>
                            <div class="card-body">
                                <!-- Display initials and times -->
                                <div id="employeeAttendanceDetails">
                                    <!-- Example employee data -->
                                    <div class="employee-details">
                                        <div class="employee-initial">KS</div>
                                        <span>Kashan Shaikh</span> - Check-in: 9:00 AM, Check-out: 5:00 PM
                                    </div>
                                    <div class="employee-details">
                                        <div class="employee-initial">JS</div>
                                        <span>John Smith</span> - Check-in: 9:15 AM, Check-out: 5:15 PM
                                    </div>
                                    <div class="employee-details">
                                        <div class="employee-initial">AS</div>
                                        <span>Aisha Syed</span> - Check-in: 8:45 AM, Check-out: 4:45 PM
                                    </div>
                                </div>
                                <!-- Chart for Check-in/Check-out Times -->
                                <div id="checkInOutChart"></div>
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

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#teamAttendanceDonut"), options);
    chart.render();

      // Donut Chart Configuration
      var attendanceOptions = {
        series: [40, 10, 20, 30], // On Time, Absent, Leave, Present
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

    // Render the Donut Chart
    var attendanceChart = new ApexCharts(document.querySelector("#teamAttendanceDonut"), attendanceOptions);
    attendanceChart.render();

    // Check-in/Check-out Chart Configuration
    var checkInOutOptions = {
        series: [{
            name: 'Check-in',
            data: [9, 9.25, 8.75] // Example check-in times in hours (9:00 AM, 9:15 AM, 8:45 AM)
        }, {
            name: 'Check-out',
            data: [17, 17.25, 16.75] // Example check-out times in hours (5:00 PM, 5:15 PM, 4:45 PM)
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: {
                show: false
            }
        },
        colors: ['#007bff', '#28a745'], // Primary and secondary colors
        xaxis: {
            categories: ['Kashan Shaikh', 'John Smith', 'Aisha Syed'], // Employee Names
        },
        yaxis: {
            title: {
                text: 'Time (Hours)'
            }
        },
        legend: {
            position: 'top'
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
            },
        },
        dataLabels: {
            enabled: true,
        },
    };

    // Render the Check-in/Check-out Chart
    var checkInOutChart = new ApexCharts(document.querySelector("#checkInOutChart"), checkInOutOptions);
    checkInOutChart.render();
    
</script>