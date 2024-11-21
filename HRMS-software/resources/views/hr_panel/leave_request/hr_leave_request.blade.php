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
                        @if (session()->has('Leave-req-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('Leave-req-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Leave Request</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New Department">
                                    <i class="las la-plus"></i>Add New
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>LeaveType</th>
                                            <th>From | To</th>
                                            <th>Start Time | End Time</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LeaveRequests as $LeaveRequest)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $LeaveRequest->leave_type }}</td>
                                            <td>{{ $LeaveRequest->leave_from_date }} <br>
                                                {{ $LeaveRequest->leave_to_date }}
                                            </td>
                                            <td>{{ $LeaveRequest->star_time }} <br>
                                                {{ $LeaveRequest->end_time }}
                                            </td>
                                            <td>{{ $LeaveRequest->leave_reason }}</td>
                                            {{-- <td>
                                                    @if ($LeaveRequest->leave_approve == 'Approve')
                                                        <i class="fas fa-check-circle text-success" style="font-size: 20px;"></i>
                                                    @else
                                                        <i class="fas fa-times-circle text-danger" style="font-size: 20px;"></i>
                                                    @endif
                                                </td> --}}
                                            <td>
                                                @if ($LeaveRequest->leave_approve == 'Approve')
                                                <button type="button" class="btn btn-success">
                                                    Approved
                                                </button>
                                                @elseif($LeaveRequest->leave_approve == 'Reject')
                                                <button type="button" class="btn btn-danger">
                                                    Rejected
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-primary">
                                                    Pending
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Create Modal -->
            <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="type"></span> <span>Add Leave Request</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('hr-store-leaverequest') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="leaveTypeSelect">Select Leave type</label>
                                            <select name="leave_type" id="leaveTypeSelect" class="form-control" required>
                                                <option selected disabled>Select One</option>
                                                @foreach ($LeaveTypes as $LeaveType)
                                                <option value="{{ $LeaveType->leave_type }}">{{ $LeaveType->leave_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label for="leaveBalance">Leave Balance</label>
                                            <input type="text" id="leaveBalance" class="form-control" name="leave_balance" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label for="take_leave">Leave Days Requested</label>
                                            <input type="number" id="take_leave" class="form-control" name="take_leave" required>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label>Leave From Date</label>
                                            <input type="date" name="leave_from_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label>Leave to Date</label>
                                            <input type="date" name="leave_to_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label>Start time</label>
                                            <input type="time" name="star_time" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6">
                                        <div class="form-group">
                                            <label>End time</label>
                                            <input type="time" name="end_time" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Leave Reason</label>
                                            <textarea name="leave_reason" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Edit Modal -->
            {{-- <div id="editbtn" class="modal fade" tabindex="-1" aria-labelledby="editleaveLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editleaveLabel"><span class="type"></span> <span>Edit Leave
                                    Type</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('update-leavetype') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Leave Type</label>
                    <input type="hidden" id="editleaveid" name="leave_type_id" class="form-control"
                        required>
                    <input type="text" id="editleavetype" name="leave_type" class="form-control"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}
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

@include('hr_panel.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('#addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });

    $(document).ready(function() {
        // Add event listener for when the leave type changes
        $('select[name="leave_type"]').on('change', function() {
            let leaveType = $(this).val(); // Get the selected leave type

            // Check if a leave type is selected
            if (leaveType) {
                // Make an AJAX request to get the leave balance for the selected leave type
                $.ajax({
                    url: '{{ route("get-leave-balance-hr") }}', // Adjust the route to your correct route
                    type: 'GET',
                    data: {
                        leave_type: leaveType,
                        emp_id: '{{ $employee_details->id }}' // Send HR ID instead of employee ID
                    },
                    success: function(response) {
                        // Optionally update the leave balance input or any other UI element
                        $('#leaveBalance').val(response.leave_balance);
                    },
                    error: function(xhr, status, error) {
                        // If there's an error, alert the error message
                        alert('Error fetching leave balance: ' + xhr.responseText);
                    }
                });
            } else {
                alert('Please select a valid leave type.');
            }
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