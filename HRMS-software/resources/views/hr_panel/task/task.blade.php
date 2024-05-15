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
                        @if (session()->has('task-added'))
                            <div class="alert alert-success solid alert-square">
                                <strong>Success!</strong> {{ session('task-added') }}.
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Task</h4>
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
                                            <th>Project Name</th>
                                            <th>Task Category</th>
                                            <th>Start Date <br> End Date</th>
                                            <th>Emp Department <br>Emp Designation</th>
                                            <th>Task Assign Person</th>
                                            <th>Task Priority</th>
                                            <th>Description</th>
                                            <th>Completion Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_task as $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->project_name }}</td>
                                                <td>{{ $task->task_category }}</td>
                                                <td>{{ $task->start_date }} <br> {{ $task->end_date }} </td>
                                                <td>{{ $task->department }} <br> {{ $task->designation }} </td>
                                                <td>{{ $task->task_assign_person }}</td>
                                                <td>{{ $task->task_priority }}</td>
                                                <td>{{ $task->description }}</td>
                                                <td>
                                                    <div class="button--group">
                                                        <button type="button" class="btn btn-primary">
                                                            {{ $task->status }} </button>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                      </div>
                                                </td> --}}
                                                <td>
                                                    <div class="button--group">
                                                        <button type="button" class="btn btn-primary edittaskBtn"
                                                            data-toggle="modal" data-modal_title="Edit task"
                                                            data-has_status="1" data-target="#edittask">
                                                            <i class="la la-pencil"></i></button>
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Task</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-task') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <select name="project_name" id="projectName" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_project as $project)
                                            <option value="{{ $project->project_name }}"
                                                data-category="{{ $project->project_category }}">
                                                {{ $project->project_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>Project Category</label>
                                    <input type="text" name="task_category" id="taskCategory" class="form-control"
                                        required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Task Start Date</label>
                                            <input type="date" name="start_date" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Task End Date</label>
                                            <input type="date" name="end_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Employee Department</label>
                                            <select name="department" id="editDepartmentName" class="form-control"
                                                required>
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_department as $department)
                                                    <option value="{{ $department->department }}">
                                                        {{ $department->department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                    </div>
                                    <label>Task Assign Person</label>
                                    <select name="task_assign_person" id="editprojectName" class="form-control"
                                        onchange="populateEmployeeID()">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_employee as $employee)
                                            <option value="{{ $employee->first_name }} {{ $employee->last_name }}">
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- emp_id --}}

                                    <label>Task Priority</label>
                                    <select name="task_priority" id="" class="form-control" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Highest">Highest</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                        <option value="Lowest">Lowest</option>
                                    </select>
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" required></textarea>
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
                                    project</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="" method="POST">
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
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route('get-designations') }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append(
                                '<option value="' + value + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
            }
        });
    });
</script>
<script>
    function populateEmployeeID() {
        // Get the selected employee's name
        var employeeName = document.getElementById("editprojectName").value;

        // Loop through all employees to find the matching one
        @foreach ($all_employee as $employee)
            var fullName = "{{ $employee->first_name }} {{ $employee->last_name }}";
            if (fullName === employeeName) {
                // If the names match, populate the employee ID field
                document.getElementById("emp_id").value = "{{ $employee->id }}";
                break; // Stop the loop
            }
        @endforeach
    }
</script>
{{-- <script>
    // Function to load employees based on both department and designation
function loadEmployees(department, designation) {
    if (department && designation) {
        $.ajax({
            url: '{{ route('get-employees') }}',
            type: 'GET',
            data: {
                department: department,
                designation: designation
            },
            success: function(data) {
                $('select[name="task_assign_person"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="task_assign_person"]').append(
                        '<option value="' + value.first_name + ' ' + value.last_name + '">' + value.first_name + ' ' + value.last_name + '</option>'
                    );
                });
            }
        });
    } else {
        $('select[name="task_assign_person"]').empty();
    }
}
</script> --}}

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('#addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    // JavaScript/jQuery code to dynamically update task category based on project name
    $(document).ready(function() {
        $('#projectName').change(function() {
            var projectName = $(this).val();
            var projectCategory = '';
            // Iterate through the options to find the selected project's category
            $('#projectName option').each(function() {
                if ($(this).val() === projectName) {
                    projectCategory = $(this).data('category');
                    return false; // Exit the loop once the category is found
                }
            });
            $('#taskCategory').val(projectCategory);
        });
    });
</script>

{{-- <script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('.editdepartmentBtn').click(function() {
            $('#editbtn').modal('show');
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        // Edit category button click event
        $('.editdepartmentBtn').click(function() {
            // Extract department ID and name from data attributes
            var departmentId = $(this).data('department-id');
            var departmentName = $(this).data('department-name');
            // Set the extracted values in the modal fields
            $('#editdepartmentId').val(departmentId);
            $('#editdepartmentName').val(departmentName);
        });
    });
</script> --}}
