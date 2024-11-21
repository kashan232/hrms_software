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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Attendance</h4>
                        </div>
                        <div class="card-body">
                            <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                                <span id="errorMessage"></span>
                            </div>
                            <div class="basic-form">
                                <form id="inAttendanceForm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Designation</label>
                                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $Manager->designation }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Start Time</label>
                                            <input type="time" id="startTime" name="start_time" class="form-control" readonly
                                                value="{{ $attendance_details ? $attendance_details->start_time : '' }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>End Time</label>
                                            <input type="time" id="end_time" name="end_time" class="form-control" value="{{ $attendance_details ? $attendance_details->end_time : '' }}">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Date</label>
                                            <input type="date" name="employee_attendance_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                                        </div>
                                    </div>
                                    <!-- In button to mark attendance -->
                                    <button type="button" id="markInButton" class="btn btn-success">Check-In</button>
                                    <button type="submit" id="markoutButton" class="btn btn-danger">Chek-Out</button>
                                </form>
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

@include('manager_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('#markInButton').click(function() {
            // Get the current time
            let currentTime = new Date().toLocaleTimeString('en-GB', {
                hour12: false
            });

            // Set the current time in the Start Time input
            $('#startTime').val(currentTime);


            // AJAX request to mark attendance
            $.ajax({
                url: "{{ route('Manager-attendance-in') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    start_time: currentTime,
                    designation: $('#designation').val(),
                    employee_attendance_date: $('input[name="employee_attendance_date"]').val()
                },
                success: function(response) {
                    // Show success message or handle response
                    alert('Attendance marked successfully.');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
        });


        $('#markoutButton').click(function() {
            // Get the current time
            let currentTime = new Date().toLocaleTimeString('en-GB', {
                hour12: false
            });

            // Set the current time in the Start Time input
            $('#end_time').val(currentTime);

            // AJAX request to mark attendance
            $.ajax({
                url: "{{ route('Manager.attendance.out') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    end_time: currentTime,
                    employee_attendance_date: $('input[name="employee_attendance_date"]').val()
                },
                success: function(response) {
                    // Handle success response
                    alert(response.success); // Show success message
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    let errorResponse = JSON.parse(xhr.responseText);
                    // Set the error message and show the alert
                    $('#errorMessage').text(errorResponse.error);
                    $('#errorAlert').removeClass('d-none'); // Show the alert box
                }
            });
        });

    });
</script>