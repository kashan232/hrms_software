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
                    <a href="#">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-line fa-2x mb-2 text-info"></i>
                                <h5 class="mb-0">Revenue</h5>
                                <h3 class="mt-2">{{ $revenueCount }}</h3> <!-- Dynamic count for revenue -->
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Employee Card -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="#">
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
                    <a href="#">
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
                    <a href="{{ route('all-leaverequest') }}">
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
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Leave Request Status</h5>
                            <!-- Set a container for the chart with a fixed height -->
                            <div style="height: 250px;">
                                <canvas id="leaveStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Expense Status</h5>
                            <!-- Set a container for the chart with a fixed height -->
                            <div>
                                <canvas id="expenseBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">Project Status</h5>
                            <!-- Set a container for the chart with a fixed height -->
                            <div >
                                <canvas id="projectStatusChart" width="100%" height="100"></canvas>

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

@include('manager_panel.include.footer_include')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    // Get data for the chart from backend (this is sample data for now)
    var leaveData = {
        approved: 10, // Example count for approved leaves
        pending: 5, // Example count for pending leaves
        rejected: 2 // Example count for rejected leaves
    };

    // Calculate total
    var total = leaveData.approved + leaveData.pending + leaveData.rejected;

    // Donut chart configuration
    var ctx = document.getElementById('leaveStatusChart').getContext('2d');
    var leaveStatusChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Approved', 'Pending', 'Rejected'], // Status labels
            datasets: [{
                label: 'Leave Status',
                data: [leaveData.approved, leaveData.pending, leaveData.rejected], // Data for statuses
                backgroundColor: ['#4ba064', '#ffc107', '#dc3545'], // Colors for each status
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom' // Legend position
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var value = tooltipItem.raw;
                            var percentage = ((value / total) * 100).toFixed(2);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`; // Tooltip with count and percentage
                        }
                    }
                },
                datalabels: {
                    anchor: 'center', // Center the labels inside the segments
                    align: 'center', // Align the labels at the center
                    formatter: function(value, context) {
                        var percentage = ((value / total) * 100).toFixed(2);
                        return `${value} (${percentage}%)`; // Show count and percentage inside the donut
                    },
                    color: '#fff' // Text color for the data labels
                }
            }
        }
    });


    // Sample expense data
    var leaveData = {
        paid: 60000,
        pending: 10000,
        rejected: 5000
    };

    // Bar chart configuration
    var ctx = document.getElementById('expenseBarChart').getContext('2d');
    var expenseBarChart = new Chart(ctx, {
        type: 'bar', // Changed to 'bar' for a bar chart
        data: {
            labels: ['Paid', 'Pending', 'Rejected'], // Expense status labels
            datasets: [{
                label: 'Expense Status',
                data: [leaveData.paid, leaveData.pending, leaveData.rejected], // Amounts
                backgroundColor: ['#4ba064', '#ffc107', '#dc3545'], // Colors for each status
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true, // Start the y-axis at zero
                    title: {
                        display: true,
                        text: 'Amount' // Label for the y-axis
                    }
                },
                x: {
                    title: {
                        display: true
                        // Label for the x-axis
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var value = tooltipItem.raw;
                            return `${tooltipItem.label}: ${value}`; // Tooltip with count
                        }
                    }
                }
            }
        }
    });

    // Display expense details below the chart
    document.getElementById('paidAmount').innerText = leaveData.paid;
    document.getElementById('pendingAmount').innerText = leaveData.pending;
    document.getElementById('rejectedAmount').innerText = leaveData.rejected;
</script>

<script>
    // Sample project data
var projectData = {
    projects: [
        { createdBy: 'admin', name: 'HRMS', category: 'hr management', startDate: '2024-10-01', endDate: '2024-10-31', priority: 'Highest', description: 'testing', status: 'Complete' },
        { createdBy: 'admin', name: 'Finance System', category: 'finance', startDate: '2024-09-01', endDate: '2024-10-15', priority: 'Medium', description: 'finance tracking', status: 'Pending' },
        { createdBy: 'admin', name: 'Inventory Management', category: 'inventory', startDate: '2024-08-01', endDate: '2024-09-30', priority: 'Lowest', description: 'manage inventory', status: 'Complete' },
        { createdBy: 'admin', name: 'HR Recruitment', category: 'hr management', startDate: '2024-10-05', endDate: '2024-11-01', priority: 'Highest', description: 'recruiting staff', status: 'Incomplete' }
        // Add more project entries as needed
    ]
};

// Count statuses
var statusCounts = { Pending: 0, Complete: 0, Incomplete: 0 };

// Count project statuses
projectData.projects.forEach(project => {
    statusCounts[project.status]++;
});

// Stacked bar chart configuration
var ctx = document.getElementById('projectStatusChart').getContext('2d');
var projectStatusChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Projects'],
        datasets: [
            {
                label: 'Pending',
                data: [statusCounts.Pending],
                backgroundColor: '#ffc107', // Yellow for Pending
            },
            {
                label: 'Complete',
                data: [statusCounts.Complete],
                backgroundColor: '#4ba064', // Green for Complete
            },
            {
                label: 'Incomplete',
                data: [statusCounts.Incomplete],
                backgroundColor: '#dc3545', // Red for Incomplete
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Projects'
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
});

</script>