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
                            <h4 class="card-title">Monthly Attendance Record</h4>
                        </div>
                        <div class="row mt-4 ">
                            <div class="col-md-12">
                                <button class="btn btn-primary ml-3" style="font-size: 15px">
                                    Total Days in month : {{ $total_month_days }}
                                </button>
                                <button class="btn btn-success ml-3" style="font-size: 15px">
                                    Total Present : {{ $present_count }}
                                </button>
                                <button class="btn btn-danger ml-3" style="font-size: 15px">
                                    Total Absent : {{ $absent_count }}
                                </button>
                                <button class="btn btn-warning ml-3" style="font-size: 15px">
                                    Total Leave : {{ $leave_count }}
                                </button>
                                <button class="btn btn-dark ml-3" id="downloadpdf" style="font-size: 15px" onclick="generatePDF()">
                                    Generate PDF
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department</th>
                                            <th>Job Designation</th>
                                            <th>Employee Name</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee_data as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->department }}</td>
                                            <td>{{ $data->job_designation }}</td>
                                            <td>
                                                {{ $data->emp_name }}
                                            </td>
                                            <td id="date">{{ $data->employee_attendance_date }}</td>
                                            <td>{{ $data->start_time}}</td>
                                            <td>{{ $data->end_time}}</td>
                                            <td id="attendance_type">
                                                @if ($data->employee_attendance == 'Present')
                                                <button class="btn btn-success">{{ $data->employee_attendance }}</button>
                                                @elseif ($data->employee_attendance == 'Absent')
                                                <button class="btn btn-danger">{{ $data->employee_attendance }}</button>
                                                @elseif ($data->employee_attendance == 'Leave')
                                                <button class="btn btn-warning">{{ $data->employee_attendance }}</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>


<script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Add a title to the PDF
        doc.setFontSize(16);
        doc.text('Monthly Attendance Record', 20, 10);

        // Add attendance summary
        doc.setFontSize(12);
        doc.text('Total Days in Month: {{ $total_month_days }}', 20, 20);
        doc.text('Total Present: {{ $present_count }}', 20, 30);
        doc.text('Total Absent: {{ $absent_count }}', 20, 40);
        doc.text('Total Leave: {{ $leave_count }}', 20, 50);

        // Define table structure
        const tableData = [];
        @foreach ($employee_data as $data)
            tableData.push([
                "{{ $loop->iteration }}",
                "{{ $data->department }}",
                "{{ $data->job_designation }}",
                "{{ $data->emp_name }}",
                "{{ $data->employee_attendance_date }}",
                "{{ $data->start_time }}",
                "{{ $data->end_time }}",
                "{{ $data->employee_attendance }}"
            ]);
        @endforeach

        // Table headers
        const headers = ['Sno#', 'Department', 'Job Designation', 'Employee Name', 'Date', 'Start Time', 'End Time', 'Attendance'];

        // Generate table in the PDF
        doc.autoTable({
            head: [headers],
            body: tableData,
            startY: 60,
        });

        // Save the PDF
        doc.save('Attendance_Record.pdf');
    }
</script>
