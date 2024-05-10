@include('employee_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('employee_panel.include.navbar_include')


    @include('employee_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">CMR Management</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-4 light">
                                <li class="nav-item">
                                    <a href="#skills-tab" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Skills</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#insurance-tab" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#training-tab" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Training</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#experience-tab" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#salaries-tab" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Salaries and Fines</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#suggestions-tab" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Suggestions and Complaints</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="skills-tab" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Skills</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-skills') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Skills</th>
                                                            <th>Level</th>
                                                            <th>Experience</th>
                                                            <th>Certification</th>
                                                            <th>Institution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="insurance-tab" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Insurance</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-insurance') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Insurance</th>
                                                            <th>Coverage</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="training-tab" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Training</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-training') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Training</th>
                                                            <th>Purpose</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Results</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="experience-tab" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Experience</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-experience') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Organization</th>
                                                            <th>Designation</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Total Experience</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="salaries-tab" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Salaries</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-salaires') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Month</th>
                                                            <th>Salaries</th>
                                                            <th>Other Income</th>
                                                            <th>Fines</th>
                                                            <th>Total Salaries</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="suggestions-tab" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Suggestions</h4>
                                                <div>
                                                    <a href="{{ route('employee-cmr-add-suggestion') }}">
                                                        <button id="addNewButtonSkills" type="button" class="btn btn-primary" data-modal_title="Add New Department">
                                                            <i class="las la-plus"></i>Add New
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Subject</th>
                                                            <th>Complains</th>
                                                            <th>Rerence</th>
                                                            <th>Status</th>
                                                            <th>Solution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

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
            <!--Create Modal -->
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div>
     <!--********************************** --}}
    {{-- Footer end
        ***********************************--> --}}


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('employee_panel.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('#addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('.editleaveBtn').click(function() {
            $('#editbtn').modal('show');
        });
    });

    $('#employeeSelect').on('change', function() {
        var department = $(this).find(':selected').data('department');
        var designation = $(this).find(':selected').data('designation');

        $('#department').val(department);
        $('#designation').val(designation);
    });
</script>


<script>
    $(document).ready(function() {
        // Edit category button click event
        $('.editleaveBtn').click(function() {
            // Extract department ID and name from data attributes
            var departmentId = $(this).data('department-id');
            var departmentName = $(this).data('department-name');
            // Set the extracted values in the modal fields
            $('#editleaveid').val(departmentId);
            $('#editleavetype').val(departmentName);
        });
    });
</script>