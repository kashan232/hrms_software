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
                        @if (session()->has('manager-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('manager-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Add Manager</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('hr-store-manager') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" name="designation" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Joining Date</label>
                                            <input type="date" name="joining_date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Decided Salary</label>
                                            <input type="number" name="decided_salary" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Manager Status</label>
                                            <select name="manager_status" class="form-control">
                                                <option value="Onsite">Onsite</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Gender</label>
                                            <Select name="manager_gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </Select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="user_name" class="form-control">
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
                                            <label>Leave Types and Quotas</label>
                                            <div id="leaveContainer">
                                                <div class="leave-entry row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Leave Type</label>
                                                        <select name="leave_type_ids[]" class="form-control">
                                                            <option value="" selected disabled>Select Leave Type</option>
                                                            @foreach ($leave_types as $leave_type)
                                                            <option value="{{ $leave_type->leave_type }}">{{ $leave_type->leave_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label>Number Of Leaves</label>
                                                        <input type="number" name="leave_quotas[]" class="form-control" placeholder="Enter leave quota">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="addMoreLeave" class="btn btn-secondary">Add More Leave Type</button>
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

    document.getElementById('addMoreLeave').addEventListener('click', function() {
        var leaveContainer = document.getElementById('leaveContainer');
        var leaveEntry = document.createElement('div');
        leaveEntry.classList.add('leave-entry', 'row');

        leaveEntry.innerHTML = `
            <div class="col-md-6 mb-3">
                <label>Leave Type</label>
                <select name="leave_type_ids[]" class="form-control">
                    <option value="" selected disabled>Select Leave Type</option>
                    @foreach ($leave_types as $leave_type)
                    <option value="{{ $leave_type->leave_type }}">{{ $leave_type->leave_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Number Of Leaves</label>
                <input type="number" name="leave_quotas[]" class="form-control" placeholder="Enter leave quota">
            </div>
        `;
        leaveContainer.appendChild(leaveEntry);
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