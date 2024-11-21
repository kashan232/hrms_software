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
                        @if (session()->has('promotion-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('promotion-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Create Employee Promotion</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-hr-promotion') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Select Employee</label>
                                            <select name="employee_name" id="employee_name" class="form-control" onchange="updateCurrentPosition()">
                                                <option value="" data-position="">Select an employee...</option>
                                                @foreach($Employees as $Employee)
                                                <option value="{{ $Employee->first_name }}" data-position="{{ $Employee->designation }}">
                                                    {{ $Employee->first_name }} {{ $Employee->last_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="curent_position">Current Position</label>
                                            <input type="text" class="form-control" id="curent_position" name="curent_position" placeholder="Current Position" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_position">New Position</label>
                                            <input type="text" class="form-control" id="new_position" name="new_position" placeholder="Enter job title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>New Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_department as $department)
                                                    <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">New Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_salary">New Salary</label>
                                            <input type="text" class="form-control" id="new_salary" name="new_salary" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Effective Date</label>
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter salary" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobDescription">Job Description</label>
                                            <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" placeholder="Enter job description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="additionalNotes">Additional Notes</label>
                                            <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3" placeholder="Enter any additional notes"></textarea>
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
    });
</script>
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = "password";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });
</script>
<script>
    function updateCurrentPosition() {
        var selectedEmployee = document.getElementById('employee_name');
        var currentPosition = selectedEmployee.options[selectedEmployee.selectedIndex].getAttribute('data-position');
        document.getElementById('curent_position').value = currentPosition;
    }
</script>