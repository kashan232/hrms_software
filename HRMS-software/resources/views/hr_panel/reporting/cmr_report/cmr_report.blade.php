@include('hr_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('hr_panel.include.navbar_include')


    @include('hr_panel.include.sidebar_include')
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
                            <h4 class="card-title">CMR Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form class="cmr_report_hr" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($Departments as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label>Employee</label>
                                            <select name="employee" id="employee" class="form-control">
                                                <option value="" selected disabled>Select Employee</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label>CMR Type</label>
                                            <select id="cmrType" class="form-control">
                                                <option value="" selected disabled>Select CMR Type</option>
                                                <option value="skills">Skills</option>
                                                <option value="insurance">Insurance</option>
                                                <option value="training">Training</option>
                                                <option value="experience">Experience</option>
                                                <option value="salaries">Salaries</option>
                                                <option value="suggestion">Suggestion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Skills Table -->
                                <table id="skillsTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Skills</th>
                                            <th>Level</th>
                                            <th>Experience</th>
                                            <th>Certification</th>
                                            <th>Institution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="skills_report_append_hr">
                                    </tbody>
                                </table>

                                <!-- Insurance Table -->
                                <table id="insuranceTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Insurance</th>
                                            <th>Coverage</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="insurance_report_append_hr">
                                    </tbody>
                                </table>

                                <!-- Training Table -->
                                <table id="trainingTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Training</th>
                                            <th>Purpose</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Results</th>
                                        </tr>
                                    </thead>
                                    <tbody id="training_report_append_hr">
                                    </tbody>
                                </table>

                                <!-- Experience Table -->
                                <table id="experienceTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Organization</th>
                                            <th>Designation</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Total Experience</th>
                                        </tr>
                                    </thead>
                                    <tbody id="experience_report_append_hr">
                                    </tbody>
                                </table>

                                <!-- Salaries Table -->
                                <table id="salariesTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Month</th>
                                            <th>Salaries</th>
                                            <th>Other Income</th>
                                            <th>Fines</th>
                                            <th>Total Salaries</th>
                                        </tr>
                                    </thead>
                                    <tbody id="salaries_report_append_hr">
                                    </tbody>
                                </table>

                                <!-- Suggestion Table -->
                                <table id="suggestionTable" class="display table-responsive-lg cmrTable table table-bordered" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Subject</th>
                                            <th>Complains</th>
                                            <th>Reference</th>
                                            <th>Status</th>
                                            <th>Solution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="suggestion_report_append_hr">
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

@include('hr_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('#cmrType').on('change', function() {
            var selectedType = $(this).val();

            // Hide all tables
            $('.cmrTable').hide();

            // Clear previous table data
            $('.cmrTable tbody').empty();

            // Show the selected table and fetch data
            fetchCMRData(selectedType);
        });

        function fetchCMRData(type) {
            $.ajax({
                url: '{{ route("get-report-employee-cmr-hr") }}',
                method: 'GET',
                data: {
                    type: type
                },
                success: function(response) {
                    console.log(response); // For debugging

                    // Determine which table and tbody to show
                    var tableId = '#' + type + 'Table';
                    var tbodyId = '#' + type + '_report_append_hr';

                    $(tableId).show();

                    // Check if response data exists
                    if (response.data && response.data.length > 0) {
                        // Append data to the table body
                        response.data.forEach(function(item, index) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + item.employee_name + '</td>' +
                                '<td>' + item.department + '</td>' +
                                '<td>' + item.designation + '</td>';

                            if (type === 'skills') {
                                row += '<td>' + item.Skills + '</td>' +
                                    '<td>' + item.Level + '</td>' +
                                    '<td>' + item.Experience + '</td>' +
                                    '<td>' + item.Certification + '</td>' +
                                    '<td>' + item.Institution + '</td>';
                            } else if (type === 'insurance') {
                                row += '<td>' + item.Insurance + '</td>' +
                                    '<td>' + item.Coverage + '</td>' +
                                    '<td>' + item.Start_Date + '</td>' +
                                    '<td>' + item.End_Date + '</td>' +
                                    '<td>' + item.Amount + '</td>';
                            } else if (type === 'training') {
                                row += '<td>' + item.Training + '</td>' +
                                    '<td>' + item.Purpose + '</td>' +
                                    '<td>' + item.Start_Date + '</td>' +
                                    '<td>' + item.End_Date + '</td>' +
                                    '<td>' + item.Results + '</td>';
                            } else if (type === 'experience') {
                                row += '<td>' + item.organization + '</td>' +
                                    '<td>' + item.emp_designation + '</td>' +
                                    '<td>' + item.start_date + '</td>' +
                                    '<td>' + item.end_date + '</td>' +
                                    '<td>' + item.total_experience + '</td>';
                            } else if (type === 'salaries') {
                                row += '<td>' + item.Month + '</td>' +
                                    '<td>' + item.Salaries + '</td>' +
                                    '<td>' + item.Other_Income + '</td>' +
                                    '<td>' + item.Fines + '</td>' +
                                    '<td>' + item.Total_Salaries + '</td>';
                            } else if (type === 'suggestion') {
                                row += '<td>' + item.Subject + '</td>' +
                                    '<td>' + item.Complains + '</td>' +
                                    '<td>' + item.Reference + '</td>' +
                                    '<td>' + item.Status + '</td>' +
                                    '<td>' + item.Solution + '</td>';
                            }

                            row += '</tr>';
                            $(tbodyId).append(row);
                        });
                    } else {
                        console.error('No data found for the selected CMR type.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    });
</script>



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
                            $('select[name="employee"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="employee"]').empty();
            }
        });

    });
</script>