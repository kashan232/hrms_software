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
    <div class="content-body ">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('all-leaverequest') }}">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-envelope-open text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Leave Request</p>
                                        <span class="fs-48 text-white font-w600">{{ $leaves }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-info overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-book-open text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Task</p>
                                        <span class="fs-48 text-white font-w600">{{ $task }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-success overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Attendance</p>
                                        <span class="fs-48 text-white font-w600">{{ $attendance_records }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-info overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Skills</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMSkills }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-primary overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Insurance</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMInsurances }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-secondary overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Training</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMTraininges }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-dark overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Experience</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMExperiences }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-danger overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Salaires</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMSalaires }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('mytask') }}">
                        <div class="card bg-info overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Suggestion</p>
                                        <span class="fs-48 text-white font-w600">{{ $CRMSuggestions }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-4 col-xxl-4">
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
                </div>

                <div class="col-xl-8 col-xxl-8">
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