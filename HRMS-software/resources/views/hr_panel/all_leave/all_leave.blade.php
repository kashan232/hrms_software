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
                            <h4 class="card-title">All Leaves</h4>

                            <div class="d-flex">
                                <!-- Filter Dropdown -->
                                <select id="leaveStatusFilter" class="form-select w-auto me-3">
                                    <option value="">All Status</option>
                                    <option value="Approve">Approved</option>
                                    <option value="Reject">Rejected</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>

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
                                            <th>Leave From <br> Leave To</th>
                                            <th>Start Time | End Time</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_leaves as $leaves)
                                            <tr data-status="{{ $leaves->leave_approve }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $leaves->Employee }}</td>
                                                <td>{{ $leaves->department }} <br> {{ $leaves->designation }}</td>
                                                <td>{{ $leaves->leave_type }}</td>
                                                <td>{{ $leaves->leave_from_date }} <br> {{ $leaves->leave_to_date }} </td>
                                                <td>{{ $leaves->star_time }} <br>
                                                    {{ $leaves->end_time }}
                                                </td>
                                                <td>{{ $leaves->leave_reason }}</td>
                                                <td>
                                                    @if($leaves->leave_approve == 'Approve')
                                                        <button type="button" class="btn btn-success">
                                                            Approved
                                                        </button>
                                                    @elseif($leaves->leave_approve == 'Reject')
                                                        <button type="button" class="btn btn-danger">
                                                            Rejected
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-primary">
                                                            Pending
                                                        </button>
                                                    @endif
                                                </td>
                                                
                                                {{-- <td>
                                                    <div class="button--group">
                                                        <button type="button" class="btn btn-primary editleaveBtn" data-toggle="modal"
                                                            data-modal_title="Edit Department" data-has_status="1"
                                                            data-target="#editdepartment" data-department-id="{{ $LeaveTypes->id }}" data-department-name="{{ $LeaveTypes->leave_type }}">
                                                            <i class="la la-pencil"></i>Edit </button>
                                                   </div>
                                                </td> --}}
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
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('hr_panel.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('#addNewButton').click(function(){
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('.editleaveBtn').click(function(){
            $('#editbtn').modal('show');
        });
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


<script>
    // JavaScript to filter table rows based on leave status
    document.getElementById('leaveStatusFilter').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#example5 tbody tr');

        rows.forEach(row => {
            const status = row.getAttribute('data-status').toLowerCase();
            if (!filterValue || status === filterValue) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });
</script>

