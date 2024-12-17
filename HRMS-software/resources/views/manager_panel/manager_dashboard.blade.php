@include('manager_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('manager_panel.include.navbar_include')


    @include('manager_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                @if(!$attendanceExists)
                <div class="modal fade" id="attendanceAlert" tabindex="-1" aria-labelledby="attendanceAlertLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title d-flex align-items-center text-white" id="attendanceAlertLabel">
                                    <i class="bi bi-exclamation-circle me-2"></i> Attendance Required
                                </h5>
                            </div>
                            <div class="modal-body text-center">
                                <p class="text-danger fs-5">
                                    <i class="bi bi-clock-history"></i>
                                    Please mark your attendance for today first!
                                </p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <a href="{{ route('Manager-attendance-create') }}" class="btn btn-danger d-flex align-items-center">
                                    <i class="bi bi-pencil-square me-2"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Auto-show the modal
                    document.addEventListener("DOMContentLoaded", function() {
                        var myModal = new bootstrap.Modal(document.getElementById('attendanceAlert'));
                        myModal.show();
                    });
                </script>
                @endif

                <div class="d-flex flex-wrap mb-4 row">
                    <div class="col-xl-4 col-lg-4 mb-2">
                        <h2 class="text-black  font-w600 mb-1">Welcome Back, Manager: <strong>{{ Auth::user()->name }}</strong></h2> <!-- Use h2 for bigger font and bold employee name -->
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
                <!-- Projects Card -->

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('manager-all-leaverequest') }}">
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
                    <a href="{{ route('project-listing-to-manager') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-clipboard-list fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Projects</h5>
                                <h3 class="mt-2">{{ $all_project }}</h3> <!-- Dynamic count for projects -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Task Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('manager-task') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-tasks fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Tasks</h5>
                                <h3 class="mt-2">{{ $taskCount }}</h3> <!-- Dynamic count for tasks -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Expense Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('manager-all-expense') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-dollar-sign fa-2x mb-2 text-danger"></i>
                                <h5 class="mb-0">Expenses</h5>
                                <h3 class="mt-2">{{ $expenseCount }}</h3> <!-- Dynamic count for expenses -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Revenue Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('Manager-employee-attendance') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-line fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Attendance</h5>
                                <h3 class="mt-2">{{ $attendances }}</h3> <!-- Dynamic count for revenue -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Employee Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('Manager-employee-record') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-2x mb-2 text-warning"></i>
                                <h5 class="mb-0">Employees</h5>
                                <h3 class="mt-2">{{ $employee }}</h3> <!-- Dynamic count for employees -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Remote Employee Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('Manager-employee-record') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-user-tie fa-2x mb-2 text-primary"></i>
                                <h5 class="mb-0">Remote Employees</h5>
                                <h3 class="mt-2">{{ $remoteEmployeeCount }}</h3> <!-- Dynamic count for remote employees -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('manager-all-hiring') }}">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-briefcase fa-2x mb-2 text-secondary"></i>
                                <h5 class="mb-0">Jobs</h5>
                                <h3 class="mt-2">{{ $leaves }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

            </div>


            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Leave Request Status</h5>
                            <!-- Container for the ApexCharts donut chart -->
                            <div id="leaveStatusChart" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Expense Status</h5>
                            <!-- ApexCharts Container -->
                            <div id="expenseBarChart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-xxl-12">
                    <div class="card p-3">
                        <h5 class="card-title text-center mb-3">Project Status</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm display table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Department<br> Designation <br>Managers </th>
                                        <th>By</th>
                                        <th> Name</th>
                                        <th> Category</th>
                                        <th>Start Date <br> End Date</th>
                                        <th>Priority</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_project_detais as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $project->department }} <br>
                                            {{ $project->designation }} <br>
                                            @if($project->manager)
                                            {{ $project->manager->first_name }} {{ $project->manager->last_name }}
                                            @else
                                            Not Assigned
                                            @endif
                                        </td>
                                        <td>{{ $project->usertype }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->project_category }}</td>
                                        <td>{{ $project->project_start_date }} <br>{{ $project->project_end_date }}</td>
                                        <td>
                                            {{ $project->priority }}
                                            @php
                                            $progress = 0;
                                            $color = '';
                                            switch($project->priority) {
                                            case 'Highest':
                                            $progress = 100;
                                            $color = 'bg-success';
                                            break;
                                            case 'Medium':
                                            $progress = 75;
                                            $color = 'bg-info';
                                            break;
                                            case 'Low':
                                            $progress = 50;
                                            $color = 'bg-warning';
                                            break;
                                            case 'Lowest':
                                            $progress = 25;
                                            $color = 'bg-danger';
                                            break;
                                            }
                                            @endphp
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span>{{ $progress }}%</span>
                                        </td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            @if ($project->status == 'Pending')
                                            <span class="leave-icon">⏳</span>
                                            @elseif ($project->status == 'Completed')
                                            <span class="leave-icon">✔️</span>
                                            @elseif ($project->status == 'Reject')
                                            <span class="leave-icon">❌</span>
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

            <div class="row">

                <div class="col-xl-12 col-xxl-12">
                    <div class="card p-3">
                        <h5 class="card-title text-center">Task Status</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm display table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Assign To</th>
                                        <th>Priority</th>
                                        <th>Description</th>
                                        <th> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_task as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->project_name }}</td>
                                        <td>{{ $task->task_category }}</td>
                                        <td>{{ $task->department }} </td>
                                        <td>{{ $task->designation }} </td>
                                        <td>{{ $task->task_assign_person }}</td>
                                        <td>{{ $task->task_priority }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            @if ($task->status == 'Pending')
                                            <span class="leave-icon">⏳</span>
                                            @elseif ($task->status == 'Complete')
                                            <span class="leave-icon">✔️</span>
                                            @elseif ($task->status == 'Incomplete')
                                            <span class="leave-icon">❌</span>
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

@include('manager_panel.include.footer_include')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@include('manager_panel.include.expense_chart')


<script>
    // Dynamic data from the backend with fallback values to avoid NaN
    var leaveData = {
        approved: {
            {
                $leaveApproved ?? 0
            }
        },
        pending: {
            {
                $leavePending ?? 0
            }
        },
        rejected: {
            {
                $leaveReject ?? 0
            }
        }
    };

    // Create ApexCharts donut chart
    var options = {
        chart: {
            type: 'donut',
            height: 250
        },
        series: [leaveData.approved, leaveData.pending, leaveData.rejected], // Data for Approved, Pending, Rejected
        labels: ['Approved', 'Pending', 'Rejected'],
        colors: ['#4ba064', '#ffc107', '#dc3545'], // Colors for each status
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                const total = leaveData.approved + leaveData.pending + leaveData.rejected || 1; // Avoid division by zero
                const count = opts.w.config.series[opts.seriesIndex];
                const percentage = ((count / total) * 100).toFixed(2);
                return count + ' (' + percentage + '%)';
            },
            style: {
                colors: ['#fff']
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    const total = leaveData.approved + leaveData.pending + leaveData.rejected || 1; // Avoid division by zero
                    const percentage = ((val / total) * 100).toFixed(2);
                    return val + ' (' + percentage + '%)';
                }
            }
        }
    };

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#leaveStatusChart"), options);
    chart.render();
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