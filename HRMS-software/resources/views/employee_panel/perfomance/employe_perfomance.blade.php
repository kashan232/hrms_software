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
                                        <h3 class="mt-3 mb-0 text-white">{{ $all_employee->first_name }} {{ $all_employee->last_name }}</h3>
                                        <h6 class="mt-3 mb-0 text-white">{{ $all_employee->designation }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h6 class="mb-0">Department</h6>
                                                    <small>{{ $all_employee->department }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h6 class="mb-0">Designation</h6>
                                                    <small>{{ $all_employee->designation }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h6 class="mb-0">Email</h6>
                                                    <small>{{ $all_employee->email }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <div class="bgl-primary rounded p-3">
                                                    <h6 class="mb-0">Phone Number</h6>
                                                    <small>{{ $all_employee->phone }}</small>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <h3 class="text-white">{{ $total_present }}</h3>
                                                    <div class="progress mb-2 bg-primary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: {{ ($total_present / 30) * 100 }}%"></div>
                                                    </div>
                                                    <small>{{ ($total_present / 30) * 100 }}% of the month</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="widget-stat card bg-danger">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                                <div class="media-body text-white">
                                                    <p class="mb-1">Total Absent</p>
                                                    <h3 class="text-white">{{ $total_absent }}</h3>
                                                    <div class="progress mb-2 bg-secondary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: {{ $total_absent }}%"></div>
                                                    </div>
                                                    <small>{{ $total_absent }}% Increase</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="me-3">
                                                    <i class="fas fa-envelope-open"></i>
                                                </span>
                                                <div class="media-body text-white">
                                                    <p class="mb-1">Total Leave</p>
                                                    <h3 class="text-white">{{ $total_leave }}</h3>
                                                    <div class="progress mb-2 bg-secondary">
                                                        <div class="progress-bar progress-animated bg-light" style="width: {{ $total_leave }}%"></div>
                                                    </div>
                                                    <small>{{ $total_leave }}% Increase</small>
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
                    <h3 class="mt-2 mb-2 text-center ">Task Overview</h3>
                    <div class="row">
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">
                            <div class="widget-stat card bg-success">
                                <div class="card-body p-4">
                                    <div class="media">
                                        <span class="me-3">
                                            <i class="flaticon-381-diamond"></i>
                                        </span>
                                        <div class="media-body text-white text-end">
                                            <p class="mb-1 text-white">Numbers of  Tasks</p>
                                            <h3 class="text-white">{{ $total_tasks }}</h3>
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
                                            <p class="mb-1 text-white">Completed</p>
                                            <h3 class="text-white">{{ $completed_tasks_count }}</h3>
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
                                            <p class="mb-1 text-white">Pending</p>
                                            <h3 class="text-white">{{ $incompletedTasksCount }}</h3>
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
                                            <th scope="col">SNO</th>
                                            <th scope="col">Project Name</th>
                                            <th scope="col">Task Category</th>
                                            <th scope="col">Start Date | End Date</th>
                                            <th scope="col">Task Priority</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employeetasks as $task)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $task->project_name }}</td>
                                            <td>{{ $task->task_category }}</td>
                                            <td>{{ $task->start_date }} <br> {{ $task->end_date }} </td>
                                            <td>
                                                {{ $task->task_priority }}
                                                @php
                                                $progress = 0;
                                                $color = '';
                                                switch ($task->task_priority) {
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

                                            </td>
                                            <td>{{ $task->description }}</td>
                                            <td>
                                                @if($task->status == 'Complete')
                                                <span class="badge badge-rounded badge-success">Complete</span>
                                                @else($task->status == 'Incomplete')
                                                <span class="badge badge-rounded badge-danger">Incomplete</span>
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