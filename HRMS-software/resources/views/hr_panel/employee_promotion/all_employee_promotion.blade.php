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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Employee Promotion</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields -->
                        <div class="form-group">
                            <label>New Salary</label>
                            <input type="text" id="editNewSalary" name="new_salary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" id="editDate" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="editDescription" name="jobDescription" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="editNotes" name="additionalNotes" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Promoted Employees</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Employee Name <br> Current Position <br>New Position</th>
                                            <th>Department <br>Designation</th>
                                            <th>New Salary <br> Date</th>
                                            <th>Description</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($EmployeePromotions as $EmployeePromotion)
                                        <tr>
                                            <td>{{ $EmployeePromotion->employee_name }} <br> {{ $EmployeePromotion->curent_position }} <br>{{ $EmployeePromotion->new_position }}</td>
                                            <td>{{ $EmployeePromotion->department }} <br>{{ $EmployeePromotion->designation }}</td>
                                            <td>{{ $EmployeePromotion->new_salary }} <br> {{ $EmployeePromotion->date }} </td>
                                            <td>{{ $EmployeePromotion->jobDescription }}</td>
                                            <td>{{ $EmployeePromotion->additionalNotes }} </td>
                                            <td>
                                                <button type="button" class="btn btn-primary action-btn" onclick="showEditModal({{ json_encode($EmployeePromotion) }})">
                                                    <i class="la la-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger action-btn" onclick="confirmDelete({{ $EmployeePromotion->id }})">
                                                    <i class="la la-trash"></i>
                                                </button>
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
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
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
    function showEditModal(promotion) {
        // Populate modal fields with data from the selected promotion
        $('#editEmployeeName').val(promotion.employee_name);
        $('#editCurrentPosition').val(promotion.curent_position);
        $('#editNewPosition').val(promotion.new_position);
        $('#editDepartment').val(promotion.department);
        $('#editDesignation').val(promotion.designation);
        $('#editNewSalary').val(promotion.new_salary);
        $('#editDate').val(promotion.date);
        $('#editDescription').val(promotion.jobDescription);
        $('#editNotes').val(promotion.additionalNotes);

        // Set form action URL with the ID
        $('#editForm').attr('action', '/employee-promotions/' + promotion.id);

        // Show the modal
        $('#editModal').modal('show');
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this promotion?')) {
            $.ajax({
                url: '/employee-promotions/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Promotion deleted successfully');
                    location.reload();
                },
                error: function(response) {
                    alert('Error deleting promotion');
                }
            });
        }
    }
</script>