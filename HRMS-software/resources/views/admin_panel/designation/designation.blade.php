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
                                            <th>Designation</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_designation as $designation)
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
                                                            <i class="la la-pencil"></i>Edit </button>
                                                        {{-- <button type="button" class="btn btn-danger"
                                                        data-question="Are you sure to delete this designation?">
                                                        <i class="la la-trash"></i>Delete </button> --}}
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
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--********************************** --}}
    {{-- Footer end
        ***********************************--> --}}


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
        $('.editdesignationBtn').click(function() {
            $('#editdesignation').modal('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Edit category button click event
        $('.editdesignationBtn').click(function() {
            // Extract department ID and name from data attributes
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
