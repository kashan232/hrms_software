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
                            <h4 class="card-title">Leave Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="Leave_report" class="new-added-form" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($Departments as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Employee</label>
                                            <select name="employee" id="employee" class="form-control">
                                                <option value="" selected disabled>Select Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Leave Type</th>
                                            <th>Leave From</th>
                                            <th>Leave To</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Leave_report_append">
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
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK
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

@include('admin_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route("get-designations") }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
            }
        });

        // Handle designation change
        $('select[name="designation"]').on('change', function() {
            var designation = $(this).val();
            var department = $('select[name="department"]').val(); // Get the department value
            // alert(department);
            if (designation && department) {
                $.ajax({
                    url: '{{ route("get-employees") }}',
                    type: 'GET',
                    data: {
                        designation: designation,
                        department: department
                    }, // Send both designation and department
                    success: function(data) {
                        $('select[name="employee"]').empty().append('<option value="" selected disabled>Select Employee</option>');
                        $.each(data, function(key, value) {
                            $('select[name="employee"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="employee"]').empty();
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#Leave_report').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var department = $('select[name="department"]').val();
            var designation = $('select[name="designation"]').val();
            var employee = $('select[name="employee"]').val();
            console.log(department, designation, employee);

            // Use AJAX to fetch data based on the selected filters
            $.ajax({
                url: '{{ route("get-leave-report") }}', // Replace with your actual server-side endpoint URL
                method: 'GET',
                data: {
                    department: department,
                    designation: designation,
                    employee: employee
                },
                success: function(response) {
                    // Assuming you have a <tbody> element with id="Leave_report_append" to display the data
                    var LeaveReportTable = $('#Leave_report_append');
                    // Clear existing rows
                    LeaveReportTable.empty();
                    // Append new rows based on the response
                    response.LeaveRequests.forEach(function(Leave, index) {
                        LeaveReportTable.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + Leave.Employee + '</td>' +
                            '<td>' + Leave.department + '</td>' +
                            '<td>' + Leave.designation + '</td>' +
                            '<td>' + Leave.leave_type + '</td>' +
                            '<td>' + Leave.leave_from_date + '</td>' +
                            '<td>' + Leave.leave_to_date + '</td>' +
                            '<td>' + Leave.leave_reason + '</td>' +
                            '<td>' + Leave.leave_approve + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>