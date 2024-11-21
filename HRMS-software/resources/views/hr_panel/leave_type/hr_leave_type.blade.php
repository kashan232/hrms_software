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
                        @if (session()->has('Leave-Type-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('Leave-Type-added') }}.
                        </div>
                        @endif
                        @if (session()->has('delete-message'))
                        <div class="alert alert-danger solid alert-square">
                            <strong>Success!</strong> {{ session('delete-message') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Leave Type</h4>
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
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll"
                                                        required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Leave Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($LeaveTypes as $LeaveTypes)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheckBox2" required="">
                                                    <label class="custom-control-label"
                                                        for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $LeaveTypes->leave_type }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary editleaveBtn"
                                                        data-toggle="modal" data-modal_title="Edit Department"
                                                        data-has_status="1" data-target="#editdepartment"
                                                        data-department-id="{{ $LeaveTypes->id }}"
                                                        data-department-name="{{ $LeaveTypes->leave_type }}">
                                                        <i class="la la-pencil"></i> </button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <a href="{{ route('delete-leavetype', ['id' => $LeaveTypes->id]) }}" style="color: white;">
                                                            <i class="la la-trash"></i> </a>
                                                    </button>
                                                </div>
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Leave Type</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-leavetype') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Leave Type</label>
                                    <input type="text" name="leave_type" class="form-control" required>
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
            <div id="editbtn" class="modal fade" tabindex="-1" aria-labelledby="editleaveLabel" aria-hidden="true">
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
            </div>
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
</script>

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('.editleaveBtn').click(function() {
            $('#editbtn').modal('show');
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Attach event listener with delegation
        $(document).on('click', '.editleaveBtn', function() {
            // Show the edit modal
            $('#editbtn').modal('show');

            var departmentId = $(this).data('department-id');
            var departmentName = $(this).data('department-name');

            // Set the extracted values in the modal fields
            $('#editleaveid').val(departmentId);
            $('#editleavetype').val(departmentName);
        });
    });
</script>