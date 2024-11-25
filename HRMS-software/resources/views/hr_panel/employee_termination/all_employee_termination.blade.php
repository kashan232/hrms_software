@include('hr_panel.include.header_include')
<div id="main-wrapper">
    @include('hr_panel.include.navbar_include')
    @include('hr_panel.include.sidebar_include')

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Employee Termination</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" id="editEmployeeName" name="employee_name" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Current Position</label>
                            <input type="text" id="editCurrentPosition" name="curent_position" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Termination Reason</label>
                            <textarea id="editTerminationReason" name="termination_reason" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Termination Date</label>
                            <input type="date" id="editTerminationDate" name="termination_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Severance Package</label>
                            <input type="text" id="editSeverancePackage" name="severance_package" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Final Comments</label>
                            <textarea id="editFinalComments" name="final_comments" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="button--group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Body -->
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Employee Terminations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Employee Name <br> Current Position</th>
                                            <th>Termination Reason</th>
                                            <th>Termination Date</th>
                                            <th>Severance Package</th>
                                            <th>Final Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($EmployeeTerminations as $termination)
                                        <tr>
                                            <td>{{ $termination->employee_name }} <br> {{ $termination->curent_position }}</td>
                                            <td>{{ $termination->termination_reason }}</td>
                                            <td>{{ $termination->termination_date }}</td>
                                            <td>{{ $termination->severance_package }}</td>
                                            <td>{{ $termination->final_comments }}</td>
                                            <td>
                                                <div class="button--group d-flex">


                                                    <button type="button" class="btn btn-primary" onclick="showEditModal({{ json_encode($termination) }})">
                                                        <i class="la la-pencil"></i> </button>
                                                        &nbsp;
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $termination->id }})">
                                                        <i class="la la-trash"></i>
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
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div>
</div>

@include('hr_panel.include.footer_include')

<script>
    function showEditModal(termination) {
        // Populate modal fields
        $('#editEmployeeName').val(termination.employee_name);
        $('#editCurrentPosition').val(termination.curent_position);
        $('#editTerminationReason').val(termination.termination_reason);
        $('#editTerminationDate').val(termination.termination_date);
        $('#editSeverancePackage').val(termination.severance_package);
        $('#editFinalComments').val(termination.final_comments);

        // Set form action URL
        $('#editForm').attr('action', '/employee-terminations/' + termination.id);

        // Show modal
        $('#editModal').modal('show');
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this termination?')) {
            $.ajax({
                url: '/employee-terminations/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Termination deleted successfully');
                    location.reload();
                },
                error: function(response) {
                    alert('Error deleting termination');
                }
            });
        }
    }
</script>