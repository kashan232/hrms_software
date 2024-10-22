@include('employee_panel.include.header_include')
<style>
    .attendance-button {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    .present {
        background-color: green;
        color: white;
    }

    .absent {
        background-color: red;
        color: white;
    }

    .leave {
        background-color: yellow;
        color: black;
    }

    #leftone {
        margin-left: 500px;
    }

    .label {
        font-size: 12px;
        margin-left: 2px;
        margin-right: 2px;
        margin-top: 4px;
    }
</style>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">
    <!--**********************************
            Nav header start
        ***********************************-->
    @include('employee_panel.include.navbar_include')
    <!--**********************************
            Nav header end
        ***********************************-->
    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('employee_panel.include.sidebar_include')
    <!--**********************************
            Sidebar end
        ***********************************-->
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4> All Record Attendance</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    @if (session('attendance_save'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Congratulations!</strong> {{ session('attendance_save') }}.
                                    </div>

                                    @endif

                                    @if(count($employees_attendance_data) > 0)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Attendance Already Submitted You Can Edit Record.!</strong>
                                        </div>
                                    @endif
                                    

                                    <form action="{{ route('employee-store-attendance') }}" method="POST">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example3" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Department | Job Designation</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Employee</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_employess as $employess)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <input type="hidden" name="emp_id[]" value="{{ $employess->id }}">
                                                        <td>{{ $employess->department }} <br> {{ $employess->designation }}</td>
                                                        <td>{{ $start_time}}</td>
                                                        <td>{{ $end_time }}</td>
                                                        <td>
                                                            <input type="hidden" name="employee_attendance_date" value="{{ $employee_attendance_date }}">
                                                            <input type="hidden" name="department" value="{{ $employess->department }}">
                                                            <input type="hidden" name="start_time" value="{{ $start_time}}">
                                                            <input type="hidden" name="end_time" value="{{ $end_time }}">
                                                            <input type="hidden" name="job_designation" value="{{ $employess->designation }}">
                                                            <input type="hidden" name="emp_name[]" value="{{ $employess->first_name }}">
                                                            <h6>{{ $employess->first_name }}&nbsp{{ $employess->last_name }}</h6>
                                                        </td>
                                                        <td>
                                                            <!-- Rest of the code -->
                                                            @php
                                                            $attendanceValue = $employees_attendance_data[$employess->id] ?? 'Present';
                                                            @endphp
                                                            <input type="radio" id="Present_{{ $employess->id }}" name="attendance[{{ $employess->id }}]" value="Present" {{ $attendanceValue === 'Present' ? 'checked' : '' }}>
                                                            <label for="Present_{{ $employess->id }}">Present</label><br>
                                                            <input type="radio" id="Absent_{{ $employess->id }}" name="attendance[{{ $employess->id }}]" value="Absent" {{ $attendanceValue === 'Absent' ? 'checked' : '' }}>
                                                            <label for="Absent_{{ $employess->id }}">Absent</label><br>
                                                            <input type="radio" id="Leave_{{ $employess->id }}" name="attendance[{{ $employess->id }}]" value="Leave" {{ $attendanceValue === 'Leave' ? 'checked' : '' }}>
                                                            <label for="Leave_{{ $employess->id }}">Leave</label>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 form-group mg-t-8 text-center">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Save Attendance
                                            </button>
                                        </div>
                                    </form>
                                </div>
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


</div>
**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('employee_panel.include.footer_include')

    </body>

    </html>