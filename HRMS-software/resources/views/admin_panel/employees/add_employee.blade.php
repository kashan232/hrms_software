@include('admin_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                        @if (session()->has('Employee-added'))
                            <div class="alert alert-success solid alert-square">
                                <strong>Success!</strong> {{ session('Employee-added') }}.
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Add Employee</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
                                    <a href="{{ route('all-employee') }}" style="color: white;">
                                    All Employee </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-employee') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" id="passwordInput" name="password" class="form-control">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Joining Date</label>
                                            <input type="date" name="joining_date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_department as $department)
                                                    <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label>Decided Salary</label>
                                            <input type="text" name="decided_salary" class="form-control">
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label>Reporting Manager </label>
                                            <Select name="reporting_manager" class="form-control">
                                                @foreach($all_managers as $all_manager)
                                                    <option value="{{ $all_manager->id }}">{{ $all_manager->first_name }}&nbsp;{{ $all_manager->last_name }}</option>
                                                @endforeach
                                            </Select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label> Employee Status</label>
                                            <Select name="employee_status" class="form-control">
                                                <option value="Onsite">Onsite</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </Select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Gender</label>
                                            <Select name="employee_gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </Select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Number Of Leave Allow</label>
                                            <input type="text" name="number_of_leaves" class="form-control">
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

@include('admin_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route("get-designations") }}',
                    type: 'GET',
                    data: { department: department },
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
