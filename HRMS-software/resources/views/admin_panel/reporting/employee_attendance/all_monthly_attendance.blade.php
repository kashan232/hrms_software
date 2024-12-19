<div id="main-wrapper">

    @include('admin_panel.include.header_include')
    @include('admin_panel.include.navbar_include')
    @include('admin_panel.include.sidebar_include')

    <div class="content-body ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Monthly Attendance Summary</h4>
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
                                            <th>Total Present</th>
                                            <th>Total Absent</th>
                                            <th>Total Leave</th>
                                            <th>Monthly Record</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($attendance_summary) < 1)
                                            <div class="alert alert-danger">
                                                <strong>Sorry!</strong> No Attendance Found.
                                            </div>
                                        @else
                                        @foreach ($attendance_summary as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->department }}</td>
                                            <td>{{ $attendance->job_designation }}</td>
                                            <td>{{ $attendance->emp_name }}</td>
                                            <td>
                                                <button class="btn btn-success">
                                                    {{ $attendance->total_present }}
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger">
                                                    {{ $attendance->total_absent }}
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning">
                                                    {{ $attendance->total_leave }}
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('individual-employee-attendance', ['id' => $attendance['emp_id'] ?? '-', 'dep' => $attendance['department'], 'at_date' => $attendance_date, 'total_month_days' => $days_count]) }}" class="btn btn-info btn-sm">
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


<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a> 2024</p>
    </div>
</div>

</div>

@include('admin_panel.include.footer_include')