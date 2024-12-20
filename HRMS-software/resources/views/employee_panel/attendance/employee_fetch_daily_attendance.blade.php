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

<div id="main-wrapper">
    @include('employee_panel.include.navbar_include')
    @include('employee_panel.include.sidebar_include')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Record Attendance</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if(count($attendance_records) < 1)
                                            <div class="alert alert-danger">
                                            <strong>Sorry!</strong> No Attendance Found.
                                    </div>
                                    @else
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>SNO</th>
                                                <th>Department | Job Designation</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Employee Name</th>
                                                <th>Date</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attendance_records as $attendance_record)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attendance_record['department'] }} <br> {{ $attendance_record['job_designation'] }}</td>
                                                <td>{{ $attendance_record['employee_attendance'] == 'Absent' ? '-' : $attendance_record['start_time'] }}</td>
                                                <td>{{ $attendance_record['employee_attendance'] == 'Absent' ? '-' : $attendance_record['end_time'] }}</td>
                                                <td>{{ $attendance_record['emp_name'] }}</td>
                                                <td>{{ $attendance_record['employee_attendance_date'] }}</td>
                                                <td>
                                                    @if ($attendance_record['employee_attendance'] == 'Present')
                                                    <button class="btn btn-success">{{ $attendance_record['employee_attendance'] }}</button>
                                                    @elseif ($attendance_record['employee_attendance'] == 'Absent')
                                                    <button class="btn btn-danger">{{ $attendance_record['employee_attendance'] }}</button>
                                                    @elseif ($attendance_record['employee_attendance'] == 'Leave')
                                                    <button class="btn btn-warning">{{ $attendance_record['employee_attendance'] }}</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('employee_panel.include.footer_include')
</div>

</body>

</html>