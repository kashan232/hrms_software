@include('admin_panel.include.header_include')
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
        @include('admin_panel.include.navbar_include')
    <!--**********************************
            Nav header end
        ***********************************-->
    <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin_panel.include.sidebar_include')
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
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Attendance</a></li>
                    </ol>
                </div>
            </div>
            
            <div class="row page-titles mx-0">
                <div class="col-md-12 d-flex">
                    <label class="label">Start Date: </label>
                    <input type="date" id="datepicker-start" placeholder="Start Date"
                        class="form-control col-md-2">
                    <label class="label">End Date: </label>
                    <input type="date" id="datepicker-end" placeholder="End Date"
                        class="form-control col-md-2">
                    <label class="label">Attendance Type: </label>
                    <select id="attendance-type" class="form-control col-md-2">
                        <option value="">All</option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Leave">Leave</option>
                    </select>
                    <button id="apply-filters" class="btn btn-warning ml-3 mr-3 mb-3">Filter</button>
                    {{-- <button class="btn btn-primary ml-3 mr-3 mb-3" id="export-pdf"
                        data-route="{{ route('export.pdf') }}">Export PDF</button> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Attendance Date</th>
                                                    <th>Student Name</th>
                                                    <th>Attendance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($studentAttendance as $studentAttendance)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $studentAttendance->student_attendance_date }}</td>
                                                        <td>{{ $studentAttendance->student_name }}</td>
                                                        <td>
                                                            @if ($studentAttendance->student_attendance == 'Present')
                                                                <button
                                                                    class="btn btn-success">{{ $studentAttendance->student_attendance }}</button>
                                                            @elseif ($studentAttendance->student_attendance == 'Absent')
                                                                <button
                                                                    class="btn btn-danger">{{ $studentAttendance->student_attendance }}</button>
                                                            @elseif ($studentAttendance->student_attendance == 'Leave')
                                                                <button
                                                                    class="btn btn-warning">{{ $studentAttendance->student_attendance }}</button>
                                                            @endif
                                                        </td>											
                                                    </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>
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
    @include('admin_panel.include.footer_include')

{{-- <script>
    $(document).ready(function() {
        $('#apply-filters').click(function() {
            var startDate = $('#datepicker-start').val();
            var endDate = $('#datepicker-end').val();
            var attendanceType = $('#attendance-type').val();

            // Apply the filters to the table rows
            $('.data-table tbody tr').each(function() {
                var date = $(this).find('td:nth-child(2)').text();
                var type = $(this).find('td:nth-child(4) button').text();

                if ((startDate === '' || date >= startDate) && (endDate === '' || date <=
                        endDate) &&
                    (attendanceType === '' || type === attendanceType)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }); --}}

{{-- 
        // pdf code 
        //     $('#export-pdf').click(function () {

        //     var year = $('#datepicker-year').val();
        //     var month = $('#datepicker-month').val();
        //     var day = $('#datepicker-day').val();
        //     var attendanceType = $('#attendance-type').val();

        //     // Construct the URL with filter parameters
        //     var pdfUrl = '{{ route('export.pdf') }}?year=' + year + '&month=' + month + '&day=' + day + '&attendance_type=' + attendanceType;

        //     // Open the URL in a new window or tab
        //     window.open(pdfUrl, '_blank');
        // });


    //     $('#export-pdf').click(function() {
    //         var startDate = $('#datepicker-start').val();


    //         var endDate = $('#datepicker-end').val();
    //         var attendanceType = $('#attendance-type').val();

    //         // var pdfUrl = '{{ route('export.pdf') }}?start_date=' + startDate + '&end_date=' + endDate + '&attendance_type=' + attendanceType;

    //         // Construct the URL with filter parameters
    //         var pdfUrl = $(this).data('route'); // Retrieve the route URL from the data attribute

    //         // Construct the URL with filter parameters
    //         if (attendanceType === 'All' && startDate === '' && endDate === '') {
    //             // Export all records without date range or attendance type filter
    //             pdfUrl += '';
    //         } else if (attendanceType === 'All') {
    //             // Export all records with date range
    //             pdfUrl += '?start_date=' + startDate + '&end_date=' + endDate;
    //         } else {
    //             // Export filtered records
    //             pdfUrl += '?start_date=' + startDate + '&end_date=' + endDate + '&attendance_type=' +
    //                 attendanceType;
    //         }

    //         // Open the URL in a new window or tab
    //         window.open(pdfUrl, '_blank');
    //     });

    // }); --}}
{{-- </script> --}}
</body>

</html>
