@include('employee_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<style>
    .profile-bx .profile-image img {
        margin: 18px;
        width: 118px;
        height: 130px !important;
    }
</style>
<div id="main-wrapper">

    @include('employee_panel.include.navbar_include')


    @include('employee_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex flex-wrap mb-4 row">
                    <div class="col-xl-3 col-lg-4 mb-2">
                        <h2 class="text-black  font-w600 mb-1">Welcome Back, <strong>{{ Auth::user()->name }}</strong></h2> <!-- Use h2 for bigger font and bold employee name -->
                    </div>
                    <!-- class="card" style="width: auto; border: 1px solid #007bff;" -->
                    <div class="col-xl-9 col-lg-8 d-flex justify-content-end align-items-center">
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
                <!-- First Card Row -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-leaverequest') }}">
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
                    <a href="{{ route('mytask') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-tasks fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Tasks</h5>
                                <h3 class="mt-2">{{ $task }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('all-employee-attendance') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-check fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Attendance</h5>
                                <h3 class="mt-2">{{ $attendance_records }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('seprate-employee-cmr') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-cogs fa-2x mb-2 text-warning"></i>
                                <h5 class="mb-0">Skills</h5>
                                <h3 class="mt-2">{{ $CRMSkills }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Second Card Row -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('seprate-employee-cmr') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Insurance</h5>
                                <h3 class="mt-2">{{ $CRMInsurances }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('seprate-employee-cmr') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-chalkboard-teacher fa-2x mb-2 text-secondary"></i>
                                <h5 class="mb-0">Training</h5>
                                <h3 class="mt-2">{{ $CRMTraininges }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('seprate-employee-cmr') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-briefcase fa-2x mb-2 text-dark"></i>
                                <h5 class="mb-0">Experience</h5>
                                <h3 class="mt-2">{{ $CRMExperiences }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('seprate-employee-cmr') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-money-bill-wave fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Salary</h5>
                                <h3 class="mt-2">{{ $CRMSalaires }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card overflow-hidden">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="fs-20 text-black text-center">My Attendance</h4>
                                </div>
                                <div class="card-body pb-4">
                                    <div class="d-flex justify-content-center">
                                        <!-- Attendance Donut Chart -->
                                        <div id="attendanceDonutChart" style="width: 500px; height: 500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-clock text-primary" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">Average Hours</p>
                                    <span class="fs-28 text-black font-w600 d-block">{{ $averageHours }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-sign-out-alt text-primary" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">Average Check-In</p>
                                    <span class="fs-28 text-black font-w600 d-block">{{ $averageCheckIn }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-stopwatch text-success" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">On-time arrival</p>
                                    <span class="fs-28 text-black font-w600 d-block text-success">{{ $onTimeArrival }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-sign-out-alt text-danger" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">Average check-out</p>
                                    <span class="fs-28 text-black font-w600 d-block">{{ $averageCheckOut }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-times text-danger" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">Incomplete Task</p>
                                    <span class="fs-28 text-black font-w600 d-block">{{ $IncompleteTasks }} </span>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check text-success" style="font-size: 25px;"></i>
                                    </div>
                                    <p class="text-black mb-0">Complete Task</p>
                                    <span class="fs-28 text-black font-w600 d-block">{{ $CompleteTasks }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-xxl-12">
                    <div class="card p-2">
                    <div class="card-header border-0 pb-0">
                            <h3 class="text-black text-center mt-3 mb-4">Task Updates</h3>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-striped table-sm display table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Project Name</th>
                                        <th>Task Category</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Description</th>
                                        <th>Completion Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeetasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->project_name }}</td>
                                        <td>{{ $task->task_category }}</td>
                                        <td>{{ $task->start_date }}</td>
                                        <td>{{ $task->end_date }} </td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            @if ($task->status == 'Complete')
                                            <i class="fas fa-check text-success" style="font-size: 25px;"></i>
                                            @elseif ($task->status == 'Incomplete')
                                            <i class="fas fa-times text-danger" style="font-size: 25px;"></i>
                                            @elseif ($task->status == 'In Process')
                                            <button
                                                class="btn btn-warning">{{ $task->status }}</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

@include('employee_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Ensure the data is passed correctly
    var attendanceData = [
        {{ $totalPresentchart ?? 0 }},
        {{ $totalLeavechart ?? 0 }},
        {{ $totalAbsentchart ?? 0 }}
    ]; // Default to 0 if the values are not set

    var totalAttendance = {{ $totalAttendancechart ?? 0 }}; // Total attendance count, default to 0

    // Check for any potential errors or empty data
    if (attendanceData.some(item => item === 0)) {
        console.log('Error: Some attendance data is missing or not available');
    }

    var options = {
        chart: {
            type: 'donut',
            height: 400, 
            width: '400px',
            toolbar: { show: false }
        },
        series: attendanceData, // Present, Leave, Absent counts
        labels: ['Present', 'Leave', 'Absent'],
        colors: ['#28a745', '#ffc107', '#dc3545'],
        plotOptions: {
            pie: {
                donut: {
                    size: '60%',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '18px',
                            color: '#000',
                            offsetY: -10
                        },
                        value: {
                            show: true,
                            fontSize: '24px',
                            color: '#000',
                            offsetY: 10,
                            formatter: function() { return ''; }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                return opts.w.globals.series[opts.seriesIndex]; // Show counts
            }
        },
        legend: {
            position: 'bottom',
            fontSize: '12px',
            labels: { colors: ['#000'], width: 50 }
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: { height: 400, width: '300px' },
                legend: { position: 'bottom' }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#attendanceDonutChart"), options);
    chart.render();

    // Add total attendance label and heading in the center
    var totalLabel = document.createElement('div');
    totalLabel.style.position = 'absolute';
    totalLabel.style.left = '46%';
    totalLabel.style.top = '46%';
    totalLabel.style.transform = 'translate(-46%, -46%)';
    totalLabel.style.textAlign = 'center';
    totalLabel.style.pointerEvents = 'none';

    var heading = document.createElement('div');
    heading.style.fontSize = '20px';
    heading.style.color = '#000';
    heading.innerHTML = 'Total Attendance';

    var totalCount = document.createElement('div');
    totalCount.style.fontSize = '22px';
    totalCount.style.color = '#000';
    totalCount.innerHTML = totalAttendance;

    totalLabel.appendChild(heading);
    totalLabel.appendChild(totalCount);

    document.querySelector('#attendanceDonutChart').appendChild(totalLabel);
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
