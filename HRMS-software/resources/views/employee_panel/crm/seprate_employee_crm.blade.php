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
                                    <a href="#skills-tab" class="nav-link {{ $activeTab == 'skills' ? 'active' : '' }}" data-bs-toggle="tab">Skills</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#insurance-tab" class="nav-link {{ $activeTab == 'insurance' ? 'active' : '' }}" data-bs-toggle="tab">Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#training-tab" class="nav-link {{ $activeTab == 'training' ? 'active' : '' }}" data-bs-toggle="tab">Training</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#experience-tab" class="nav-link {{ $activeTab == 'experience' ? 'active' : '' }}" data-bs-toggle="tab">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#salaries-tab" class="nav-link {{ $activeTab == 'salaries' ? 'active' : '' }}" data-bs-toggle="tab">Salaries</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#suggestions-tab" class="nav-link {{ $activeTab == 'suggestions' ? 'active' : '' }}" data-bs-toggle="tab">Suggestions</a>
                                </li>
                            </ul>


                            <div class="tab-content">
                                <div class="tab-pane fade {{ $activeTab == 'skills' ? 'show active' : '' }}" id="skills-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Skills</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Skills</th>
                                                            <th>Level</th>
                                                            <th>Experience</th>
                                                            <th>Certification</th>
                                                            <th>Institution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($CRMSkills as $CRMSkill)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMSkill->employee_name }} <br> {{ $CRMSkill->department }} <br> {{ $CRMSkill->designation }}</td>
                                                            <td>{{ $CRMSkill->Skills }}</td>
                                                            <td>{{ $CRMSkill->Level }}</td>
                                                            <td>{{ $CRMSkill->Experience }}</td>
                                                            <td>{{ $CRMSkill->Certification }}</td>
                                                            <td>{{ $CRMSkill->Institution }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $activeTab == 'insurance' ? 'show active' : '' }}" id="insurance-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Insurance</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Insurance</th>
                                                            <th>Coverage</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($CRMInsurances as $CRMInsurance)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMInsurance->employee_name }} <br> {{ $CRMInsurance->department }} <br> {{ $CRMInsurance->designation }}</td>
                                                            <td>{{ $CRMInsurance->Insurance }}</td>
                                                            <td>{{ $CRMInsurance->Coverage }}</td>
                                                            <td>{{ $CRMInsurance->Start_Date }}</td>
                                                            <td>{{ $CRMInsurance->End_Date }}</td>
                                                            <td>{{ $CRMInsurance->Amount }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $activeTab == 'training' ? 'show active' : '' }}" id="training-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Training</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Training</th>
                                                            <th>Purpose</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Results</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($CRMTraininges as $CRMTraininges)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMTraininges->employee_name }} <br> {{ $CRMTraininges->department }} <br> {{ $CRMTraininges->designation }}</td>
                                                            <td>{{ $CRMTraininges->Training }}</td>
                                                            <td>{{ $CRMTraininges->Purpose }}</td>
                                                            <td>{{ $CRMTraininges->Start_Date }}</td>
                                                            <td>{{ $CRMTraininges->End_Date }}</td>
                                                            <td>{{ $CRMTraininges->Results }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $activeTab == 'experience' ? 'show active' : '' }}" id="experience-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Experience</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Organization</th>
                                                            <th>Designation</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Total Experience</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($CRMExperiences as $CRMExperience)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMExperience->employee_name }} <br> {{ $CRMExperience->emp_department }} <br> {{ $CRMExperience->emp_designation }}</td>
                                                            <td>{{ $CRMExperience->Organization }}</td>
                                                            <td>{{ $CRMExperience->Designation }}</td>
                                                            <td>{{ $CRMExperience->Start_Date }}</td>
                                                            <td>{{ $CRMExperience->End_Date }}</td>
                                                            <td>{{ $CRMExperience->Total_Experience }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $activeTab == 'salaries' ? 'show active' : '' }}" id="salaries-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Salaries</h4>

                                            </div>
                                            <div class="table-responsive">
                                                <table id="example5" class="display table-responsive-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Month</th>
                                                            <th>Salaries</th>
                                                            <th>Other Income</th>
                                                            <th>Fines</th>
                                                            <th>Total Salaries</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($CRMSalaires as $CRMSalaire)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMSalaire->employee_name }} <br> {{ $CRMSalaire->department }} <br> {{ $CRMSalaire->designation }}</td>
                                                            <td>{{ $CRMSalaire->Month }}</td>
                                                            <td>{{ $CRMSalaire->Salaries }}</td>
                                                            <td>{{ $CRMSalaire->Other_Income }}</td>
                                                            <td>{{ $CRMSalaire->Fines }}</td>
                                                            <td>{{ $CRMSalaire->Total_Salaries }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $activeTab == 'suggestions' ? 'show active' : '' }}" id="suggestions-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Suggestions</h4>
                                                <div>
                                                    <a href="{{ route('seprate-employee-cmr-add-suggestion') }}">
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
                                                            <th>Employee | Department | Designation</th>
                                                            <th>Subject</th>
                                                            <th>Complains</th>
                                                            <th>Reference</th>
                                                            <th>Status</th>
                                                            <th>Solution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($CRMSuggestions as $CRMSuggestion)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $CRMSuggestion->employee_name }} <br> {{ $CRMSuggestion->department }} <br> {{ $CRMSuggestion->designation }}</td>
                                                            <td>{{ $CRMSuggestion->Subject }}</td>
                                                            <td>{{ $CRMSuggestion->Complains }}</td>
                                                            <td>{{ $CRMSuggestion->Reference }}</td>
                                                            <td>{{ $CRMSuggestion->Status }}</td>
                                                            <td>{{ $CRMSuggestion->Solution }}</td>
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
                </div>
            </div>
            <!--Create Modal -->
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('employee_panel.include.footer_include')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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