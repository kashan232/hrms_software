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
                        @if (session()->has('designation-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('designation-added') }}.
                        </div>
                        @endif
                        @if (session()->has('designation-update'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('designation-update') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Designation</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
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
                                            <th>Designation</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_designation as $designation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $designation->designation }}</td>
                                            <td>{{ $designation->department }}</td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button"
                                                        class="btn btn-primary editdesignationBtn"
                                                        data-toggle="modal" data-modal_title="Edit designation"
                                                        data-has_status="1" data-target="#editdesignation"
                                                        data-designation-id="{{ $designation->id }}"
                                                        data-designation-name="{{ $designation->designation }}"
                                                        data-department-name="{{ $designation->department }}">
                                                        <i class="la la-pencil"></i> </button>
                                                    <form id="deleteForm-{{ $designation->id }}" action="{{ route('delete-designation', ['id' => $designation->id]) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <!-- To simulate a DELETE request -->

                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $designation->id }})">
                                                            <i class="la la-trash"></i> 
                                                        </button>
                                                    </form>
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Designation</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-designation') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="department" id="" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_department as $department)
                                        <option value="{{ $department->department }}">
                                            {{ $department->department }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" required>
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
            <div id="editdesignation" class="modal fade" tabindex="-1" aria-labelledby="editdesignationLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editdesignationLabel"><span class="type"></span> <span>Edit
                                    Designation</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('update-designation') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" id="editdesignationId" name="designation_id"
                                        class="form-control" required>

                                    <label>Department</label>
                                    <select name="department" id="editDepartmentName" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_department as $department)
                                        <option value="{{ $department->department }}">
                                            {{ $department->department }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" id="editdesignationName" name="designation"
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

    function confirmDelete(designationId) {
        const confirmation = confirm("Are you sure you want to delete this designation?");
        
        if (confirmation) {
            document.getElementById('deleteForm-' + designationId).submit();
        }
    }

     // JavaScript/jQuery code to trigger modal
     $(document).ready(function() {
        $('.editdesignationBtn').click(function() {
            $('#editdesignation').modal('show');
        });
    });

</script>
<script>
    $(document).ready(function() {
        // Attach event listener with delegation for dynamically loaded content
        $(document).on('click', '.editdesignationBtn', function() {
            // Show the edit modal
            $('#editdesignation').modal('show'); // Make sure your modal ID is correct

            // Extract designation ID, department name, and designation name from data attributes
            var designationId = $(this).data('designation-id');
            var departmentName = $(this).data('department-name');
            var designationName = $(this).data('designation-name');

            // Set the extracted values in the modal fields
            $('#editdesignationId').val(designationId);
            $('#editDepartmentName').val(departmentName);
            $('#editdesignationName').val(designationName);
        });
    });
</script>