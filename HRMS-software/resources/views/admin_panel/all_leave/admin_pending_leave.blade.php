@include('admin_panel.include.header_include')
<div id="main-wrapper">
    @include('admin_panel.include.navbar_include')
    @include('admin_panel.include.sidebar_include')

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Leaves</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Employee</th>
                                            <th>Department <br> Designation</th>
                                            <th>Leave Type</th>
                                            <th>Leave Start Date <br> Leave End Date</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pending_leaves as $leave)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $leave->Employee }}</td>
                                            <td>{{ $leave->department }} <br> {{ $leave->designation }}</td>
                                            <td>{{ $leave->leave_type }}</td>
                                            <td>{{ $leave->leave_from_date }} <br> {{ $leave->leave_to_date }} </td>
                                            <td>{{ $leave->leave_reason }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">
                                                    Pending
                                                </button>
                                            </td>
                                            <td>
                                                <input type="radio" name="leave_approve{{ $leave->id }}" value="Approve" onclick="updateLeaveApprove('{{ $leave->id }}', 'Approve')"> Approve<br>
                                                <input type="radio" name="leave_approve{{ $leave->id }}" value="Reject" onclick="updateLeaveApprove('{{ $leave->id }}', 'Reject')"> Reject<br>
                                                <input type="radio" name="leave_approve{{ $leave->id }}" value="Pending" onclick="updateLeaveApprove('{{ $leave->id }}', 'Pending')" checked> Pending
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
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed & Developed by <a href="#" target="_blank">AK Technologies</a> 2024</p>
        </div>
    </div>
</div>
@include('admin_panel.include.footer_include')

<script>
    $(document).ready(function() {
        // JavaScript/jQuery code to trigger modal
        $('#addNewButton').click(function(){
            $('#cuModal').modal('show');
        });

        $('.editleaveBtn').click(function(){
            $('#editbtn').modal('show');
        });

        // Edit category button click event
        $('.editleaveBtn').click(function() {
            // Extract department ID and name from data attributes
            var departmentId = $(this).data('department-id');
            var departmentName = $(this).data('department-name');
            // Set the extracted values in the modal fields
            $('#editleaveid').val(departmentId);
            $('#editleavetype').val(departmentName);
        });

        // Add event listener to radio buttons
        $('input[type="radio"]').change(function() {
            var leaveId = $(this).data('leave-id');
            var status = $(this).val();
            updateLeaveApprove(leaveId, status);
        });
    });

    function updateLeaveApprove(leaveId, status) {
        $.ajax({
            type: "POST",
            url: "{{ route('admin-update-leave-approve') }}",
            data: {
                leave_id: leaveId,
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the page or perform any other action if needed
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        $('input[type="radio"]').change(function() {
            var leaveId = $(this).attr('name').replace('leave_approve', '');
            var status = $(this).val();
            updateLeaveApprove(leaveId, status);
        });
    });
</script>