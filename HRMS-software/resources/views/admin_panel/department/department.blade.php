@include('admin_panel.include.header_include')
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
                        @if (session()->has('department-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('department-added') }}.
                        </div>
                        @endif
                        @if (session()->has('department-update'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('department-update') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Department</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New Department">
                                    <i class="las la-plus"></i>Add New
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                            <div class="alert alert-danger solid alert-square">
                                <strong>Success!</strong> {{ session('delete-message') }}.
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_department as $department)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $department->department }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary editdepartmentBtn"
                                                        data-toggle="modal" data-modal_title="Edit Department"
                                                        data-has_status="1" data-target="#editdepartment"
                                                        data-department-id="{{ $department->id }}"
                                                        data-department-name="{{ $department->department }}">
                                                        <i class="la la-pencil"></i> </button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <a href="{{ route('delete-department', ['id' => $department->id]) }}" style="color: white;">
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Department</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-department') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" name="department" class="form-control" required>
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
            <div id="editbtn" class="modal fade" tabindex="-1" aria-labelledby="editdepartmentLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editdepartmentLabel"><span class="type"></span> <span>Edit
                                    Department</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('update-department') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="hidden" id="editdepartmentId" name="department_id"
                                        class="form-control" required>
                                    <input type="text" id="editdepartmentName" name="department_name"
                                        class="form-control" required>
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
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')
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
        $('.editdepartmentBtn').click(function() {
            $('#editbtn').modal('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Attach event listener with delegation
        $(document).on('click', '.editdepartmentBtn', function() {
            // Show the edit modal
            $('#editbtn').modal('show');

            // Extract department ID and name from data attributes
            var departmentId = $(this).data('department-id');
            var departmentName = $(this).data('department-name');

            // Set the extracted values in the modal fields
            $('#editdepartmentId').val(departmentId);
            $('#editdepartmentName').val(departmentName);
        });
    });
</script>