@include('admin_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin_panel.include.navbar_include')


    @include('admin_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Attendance Record</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Employee</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Attendance</th>
                                            <th>Monthly Record</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($attendance_records) < 1)
                                    <div class="alert alert-danger">
                                        <strong>Sorry!</strong> No Attendance Found.
                                    </div>
                                @else
                                    @foreach ($attendance_records as $attendance_record)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance_record->department }}</td>
                                            <td>{{ $attendance_record->job_designation }}</td>
                                            <td>
                                                <a href="#" data-emp-id="{{ $attendance_record->emp_id }}"
                                                    data-department="{{ $attendance_record->department }}"
                                                    data-attendance-date="{{ $attendance_record->employee_attendance_date }}"
                                                    class="single_employee">
                                                    {{ $attendance_record->emp_name }}
                                                </a>
                                            </td>
                                            <td>{{ $attendance_record->employee_attendance_date }}</td>
                                            <td>{{ $attendance_record->start_time}}</td>
                                            <td>{{ $attendance_record->end_time}}</td>
                                            <td>
                                                @if ($attendance_record->employee_attendance == 'Present')
                                                    <button
                                                        class="btn btn-success">{{ $attendance_record->employee_attendance }}</button>
                                                @elseif ($attendance_record->employee_attendance == 'Absent')
                                                    <button
                                                        class="btn btn-danger">{{ $attendance_record->employee_attendance }}</button>
                                                @elseif ($attendance_record->employee_attendance == 'Leave')
                                                    <button
                                                        class="btn btn-warning">{{ $attendance_record->employee_attendance }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('individual-employee-attendance', ['id' => $attendance_record->emp_id, 'dep' => $attendance_record->department, 'at_date' => $attendance_date, 'total_month_days' => $days_count]) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Generate
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
            2024</p>
    </div>
</div> <!--**********************************
            Footer end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')