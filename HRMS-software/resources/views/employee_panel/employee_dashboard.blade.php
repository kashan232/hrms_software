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
                    <a href="#">
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
                    <a href="#">
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
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-shield-alt fa-2x mb-2 text-danger"></i>
                            <h5 class="mb-0">Insurance</h5>
                            <h3 class="mt-2">{{ $CRMInsurances }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="#">
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
                    <a href="#">
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
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-money-bill-wave fa-2x mb-2 text-success"></i>
                                <h5 class="mb-0">Salaries</h5>
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
                                    <span class="fs-28 text-black font-w600 d-block">7h 17mins</span>
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
                                    <span class="fs-28 text-black font-w600 d-block">7h 17mins</span>
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
                                    <span class="fs-28 text-black font-w600 d-block text-success">85%</span>
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
                                    <span class="fs-28 text-black font-w600 d-block">7h 17mins</span>
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
                                    <span class="fs-28 text-black font-w600 d-block">2</span>
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
                                    <span class="fs-28 text-black font-w600 d-block">4</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black text-center">Task Updates</h4>
                        </div>
                        <div class="card-body pb-4">
                            <canvas id="taskChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- <div class="col-xl-4 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card d-flex flex-xl-column flex-sm-column flex-md-row flex-column">
                                <div class="card-body text-center profile-bx">
                                    <div class="profile-image mb-4">
                                        @if($all_employee->emp_pic)
                                        <img src="/employe_profile/{{ $all_employee->emp_pic }}" alt="Profile Picture" style="border-radius:50%;">
                                        @else
                                        <img src="images/avatar/1.jpg" class="rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <h4 class="fs-22 text-black mb-1">{{ $all_employee->first_name }}</h4>
                                    <p class="mb-4">{{ $all_employee->designation }}</p>
                                    <div class="row">
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut" data-peity='{ "fill": ["rgb(139, 199, 64)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>{{ ($totalPresent / 30) * 100 }}</span>
                                                <small class="text-black">{{ $totalPresent }}</small>
                                            </div>
                                            <span class="d-block">Present</span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut" data-peity='{ "fill": ["rgb(255, 103, 70)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>{{ ($totalAbsent / 30) * 100 }}</span>
                                                <small class="text-black">{{ $totalAbsent }}</small>
                                            </div>
                                            <span class="d-block">Absent</span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut" data-peity='{ "fill": ["rgb(64, 24, 157)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>{{ ($totalLeave / 30) * 100 }}</span>
                                                <small class="text-black">{{ $totalLeave }}</small>
                                            </div>
                                            <span class="d-block">Leave</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="col-xl-12 col-xxl-12">
                    <div class="card p-3">
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
                                            <div class="button--group">
                                                <button type="button" class="btn btn-primary">
                                                    {{ $task->status }} </button>
                                            </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        var attendanceData = [10, 5, 5]; // Example data: 10 Present, 5 Leave, 5 Absent
        var totalAttendance = attendanceData.reduce((a, b) => a + b, 0); // Calculate total attendance

        var options = {
            chart: {
                type: 'donut',
                height: 400, // Set a fixed height for the chart
                width: '400px', // Set a fixed width for the chart
                toolbar: {
                    show: false // Hide the toolbar for a cleaner look
                }
            },
            series: attendanceData, // Example data: Present, Leave, Absent
            labels: ['Present', 'Leave', 'Absent'],
            colors: ['#28a745', '#ffc107', '#dc3545'], // Green for Present, Yellow for Leave, Red for Absent
            plotOptions: {
                pie: {
                    donut: {
                        size: '60%', // Adjusted donut size to allow space for text
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
                                formatter: function() {
                                    return ''; // Do not show value here
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val, opts) {
                    return opts.w.globals.series[opts.seriesIndex]; // Show individual counts (not percentages)
                }
            },
            legend: {
                position: 'bottom',
                fontSize: '12px', // Reduced font size for legend labels
                labels: {
                    colors: ['#000'], // Ensure label text is readable
                    width: 50 // Set a fixed width for legend labels
                }
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 400, // Smaller height for smaller screens
                        width: '300px' // Set a smaller width for smaller screens
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#attendanceDonutChart"), options);
        chart.render();

        // Add total attendance label and heading in the center manually
        var totalLabel = document.createElement('div');
        totalLabel.style.position = 'absolute';
        totalLabel.style.left = '46%';
        totalLabel.style.top = '46%';
        totalLabel.style.transform = 'translate(-46%, -46%)';
        totalLabel.style.textAlign = 'center';
        totalLabel.style.pointerEvents = 'none'; // Disable pointer events for clicks

        // Create a heading for total attendance
        var heading = document.createElement('div');
        heading.style.fontSize = '20px'; // Set heading size
        heading.style.color = '#000';
        heading.innerHTML = 'Total Attendance';

        // Create a label for the total attendance count
        var totalCount = document.createElement('div');
        totalCount.style.fontSize = '22px'; // Set total count size
        totalCount.style.color = '#000';
        totalCount.innerHTML = totalAttendance; // Display the total attendance

        // Append heading and total count to the totalLabel
        totalLabel.appendChild(heading);
        totalLabel.appendChild(totalCount);

        // Append the total label to the donut chart
        document.querySelector('#attendanceDonutChart').appendChild(totalLabel);
    });

    // task chart
    // Sample Task Data
    const tasks = [{
            projectName: "HRMS",
            completionStatus: "Complete",
            startDate: "2024-10-15",
            endDate: "2024-10-22",
            priority: "Highest",
            description: "Testing the product and give review"
        },
        {
            projectName: "Project X",
            completionStatus: "Incomplete",
            startDate: "2024-10-10",
            endDate: "2024-10-15",
            priority: "Medium",
            description: "Develop the project documentation"
        },
        {
            projectName: "Project Y",
            completionStatus: "Complete",
            startDate: "2024-10-12",
            endDate: "2024-10-19",
            priority: "Low",
            description: "Conduct testing and finalize"
        },
        {
            projectName: "Project Z",
            completionStatus: "Incomplete",
            startDate: "2024-10-05",
            endDate: "2024-10-25",
            priority: "Highest",
            description: "Final review and approval"
        }
    ];

    // Count completed and incomplete tasks
    let completedCount = 0;
    let incompleteCount = 0;

    tasks.forEach(task => {
        if (task.completionStatus === "Complete") {
            completedCount++;
        } else {
            incompleteCount++;
        }
    });

    // Prepare data for the chart
    const labels = tasks.map(task => task.projectName);
    const data = {
        labels: labels,
        datasets: [{
                label: 'Complete',
                data: tasks.map(task => (task.completionStatus === "Complete" ? 1 : 0)), // 1 for complete
                backgroundColor: 'rgba(40, 167, 69, 0.6)', // Green
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 1
            },
            {
                label: 'Incomplete',
                data: tasks.map(task => (task.completionStatus === "Incomplete" ? 1 : 0)), // 1 for incomplete
                backgroundColor: 'rgba(220, 53, 69, 0.6)', // Red
                borderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 1
            }
        ]
    };

    // Chart configuration
    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'Projects'
                    }
                },
                y: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (context.parsed.y !== 0) {
                                label += ': ' + context.parsed.y;
                            }
                            return label;
                        }
                    }
                }
            }
        }
    };

    // Create and render the chart
    const myChart = new Chart(
        document.getElementById('taskChart'),
        config
    );
</script>