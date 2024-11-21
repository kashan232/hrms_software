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
                        @if (session()->has('success-message-updte'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('success-message-updte') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Edit HR</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
                                    <a href="{{ route('all-hr') }}" style="color: white;">
                                        All HR </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('update-hr', ['id' => $hrdetails->id]) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_department as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control" required></select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                value="{{ $hrdetails->first_name }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ $hrdetails->last_name }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control"
                                                value="{{ $hrdetails->phone }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $hrdetails->email }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Joining Date</label>
                                            <input type="date" name="joining_date" class="form-control" value="{{ $hrdetails->joining_date }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Decided Salary</label>
                                            <input type="number" name="decided_salary" class="form-control" value="{{ $hrdetails->decided_salary }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Hr Status</label>
                                            <select name="hr_status" class="form-control">
                                                <option value="Onsite">Onsite</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ $hrdetails->address }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Gender</label>
                                            <Select name="hr_gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </Select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="user_name" class="form-control"
                                                value="{{ $hrdetails->user_name }}">
                                        </div>


                                        <div class="mb-3 col-md-12">
                                            <label>Leave Types and Quotas</label>
                                            <div id="leaveContainer">
                                                @if($hrdetails->leaveEntries->count())
                                                @foreach ($hrdetails->leaveEntries as $leaveEntry)
                                                <div class="leave-entry row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Leave Type</label>
                                                        <select name="leave_type_ids[]" class="form-control">
                                                            <option value="" disabled>Select Leave Type</option>
                                                            @foreach ($leave_types as $leave_type)
                                                            <option value="{{ $leave_type->leave_type }}"
                                                                {{ $leave_type->leave_type == $leaveEntry->leave_type_id ? 'selected' : '' }}>
                                                                {{ $leave_type->leave_type }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label>Number Of Leaves</label>
                                                        <input type="number" name="leave_quotas[]" class="form-control" placeholder="Enter leave quota" value="{{ $leaveEntry->leave_quota }}">
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No leave entries available.</p>
                                                @endif
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