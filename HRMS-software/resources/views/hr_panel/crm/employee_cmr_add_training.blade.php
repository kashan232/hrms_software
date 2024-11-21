@include('hr_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                            <h4 class="card-title">Add Training</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                            @if (session('Training-added'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Congratulations!</strong> {{ session('Training-added') }}.
                                    </div>
                                @endif
                                <form action="{{ route('store-employee-cmr-add-training') }}" method="post">
                                    @csrf
                                    <div class="row">
                                    <div class="mb-3 col-md-6">
                                            <label for="employeeName" class="form-label">Employee Name:</label>
                                            <select name="employee_id" id="employeeName" class="form-control" onchange="updateEmployeeDetails()" required>
                                                <option>Select Employee</option>
                                                @foreach($employees as $employee)
                                                <option value="{{ $employee->id }} {{ $employee->first_name }}" data-department="{{ $employee->department }}" data-designation="{{ $employee->designation }}">
                                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="department" class="form-label">Department:</label>
                                            <input type="text" id="department" name="department" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="designation" class="form-label">Designation:</label>
                                            <input type="text" id="designation" name="designation" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Training Name</label>
                                            <input type="text" name="Training" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Purpose</label>
                                            <input type="text" name="Purpose" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="Start_Date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">End Date</label>
                                            <input type="date" name="End_Date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Results</label>
                                            <input type="text" name="Results" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

@include('hr_panel.include.footer_include')

<script>
    function updateEmployeeDetails() {
        var employeeSelect = document.getElementById('employeeName');
        var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
        var department = selectedOption.getAttribute('data-department');
        var designation = selectedOption.getAttribute('data-designation');

        document.getElementById('department').value = department;
        document.getElementById('designation').value = designation;
    }
</script>