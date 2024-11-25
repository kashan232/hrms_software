@include('manager_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<style>
    .button--group {
        display: inline-block;
    }

    .button--group button {
        display: inline-block;
        margin-right: 5px;
        /* Optional: Adds spacing between buttons */
    }
</style>
<div id="main-wrapper">

    @include('manager_panel.include.navbar_include')


    @include('manager_panel.include.sidebar_include')
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

                        @if (session()->has('success'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title">Task</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New Department">
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
                                                    <button type="button" class="btn btn-primary">{{ $task->status }}</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="button--group" style="display: inline-flex; align-items: center;">
                                                    <button type="button" class="btn btn-primary btn-sm edittaskBtn"
                                                        data-task-id="{{ $task->id }}"
                                                        data-project-name="{{ $task->project_name }}"
                                                        data-task-category="{{ $task->task_category }}"
                                                        data-start-date="{{ $task->start_date }}"
                                                        data-end-date="{{ $task->end_date }}"
                                                        data-department="{{ $task->department }}"
                                                        data-designation="{{ $task->designation }}"
                                                        data-task-assign-person="{{ $task->task_assign_person }}"
                                                        data-task-priority="{{ $task->task_priority }}"
                                                        data-description="{{ $task->description }}"
                                                        data-toggle="modal" data-target="#edittask">
                                                        <i class="la la-pencil"></i>
                                                    </button>


                                                    <form id="deleteForm-{{ $task->id }}" action="{{ route('delete-manager-task', ['id' => $task->id]) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <!-- To send a DELETE request -->

                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $task->id }})">
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Task</span></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
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
                                        <option value="{{ $project->project_name }}" data-category="{{ $project->project_category }}">
                                            {{ $project->project_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Project Category</label>
                                    <input type="text" name="task_category" id="taskCategory" class="form-control" required>
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
                                    <label>Task Assign Person</label>
                                    <select name="task_assign_person" id="taskAssignPerson" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_employee as $employee)
                                        <option value="{{ $employee->first_name }} {{ $employee->last_name }}"
                                            data-department="{{ $employee->department }}"
                                            data-designation="{{ $employee->designation }}">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Employee Department</label>
                                            <input type="text" name="department" id="department" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Designation</label>
                                            <input type="text" name="designation" id="designation" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <label>Task Priority</label>
                                    <select name="task_priority" class="form-control" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Highest">Highest</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
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



            <div id="cuModaledit" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="type"></span> <span>Edit Task</span></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('manager-update-task') }}" method="POST">
                            @csrf
                            <input type="hidden" name="task_id" id="editTaskId">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <select name="project_name" id="editProjectName" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_project as $project)
                                        <option value="{{ $project->project_name }}" data-category="{{ $project->project_category }}">
                                            {{ $project->project_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Project Category</label>
                                    <input type="text" name="task_category" id="editTaskCategory" class="form-control" required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Task Start Date</label>
                                            <input type="date" name="start_date" id="editStartDate" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Task End Date</label>
                                            <input type="date" name="end_date" id="editEndDate" class="form-control" required>
                                        </div>
                                    </div>

                                    <label>Task Assign Person</label>
                                    <select name="task_assign_person" id="editTaskAssignPerson" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_employee as $employee)
                                        <option value="{{ $employee->first_name }} {{ $employee->last_name }}" data-department="{{ $employee->department }}" data-designation="{{ $employee->designation }}">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Employee Department</label>
                                            <input type="text" name="department" id="editDepartment" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Designation</label>
                                            <input type="text" name="designation" id="editDesignation" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <label>Task Priority</label>
                                    <select name="task_priority" id="editTaskPriority" class="form-control" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Highest">Highest</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                    <label>Description</label>
                                    <textarea name="description" id="editDescription" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('manager_panel.include.footer_include')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const taskAssignPerson = document.getElementById('taskAssignPerson');
        const departmentField = document.getElementById('department');
        const designationField = document.getElementById('designation');


        // Update department and designation on selection
        taskAssignPerson.addEventListener('change', function() {
            const selectedOption = taskAssignPerson.options[taskAssignPerson.selectedIndex];

            // Fetch department and designation data from the selected option
            const department = selectedOption.getAttribute('data-department');
            const designation = selectedOption.getAttribute('data-designation');

            // Set the fetched data to input fields
            departmentField.value = department || '';
            designationField.value = designation || '';
        });
    });

    function confirmDelete(taskId) {
        // Confirmation prompt before delete
        const confirmation = confirm("Are you sure you want to delete this Task?");

        if (confirmation) {
            // If user confirms, submit the delete form
            document.getElementById('deleteForm-' + taskId).submit();
        }
    }

    $(document).ready(function() {
        // Fill the edit form with existing data when the edit button is clicked
        $('.edittaskBtn').on('click', function() {
            var taskId = $(this).data('task-id');
            var projectName = $(this).data('project-name');
            var taskCategory = $(this).data('task-category');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var department = $(this).data('department');
            var designation = $(this).data('designation');
            var taskAssignPerson = $(this).data('task-assign-person');
            var taskPriority = $(this).data('task-priority');
            var description = $(this).data('description');

            $('#editTaskId').val(taskId);
            $('#editProjectName').val(projectName);
            $('#editTaskCategory').val(taskCategory);
            $('#editStartDate').val(startDate);
            $('#editEndDate').val(endDate);
            $('#editDepartment').val(department);
            $('#editDesignation').val(designation);
            $('#editTaskAssignPerson').val(taskAssignPerson);
            $('#editTaskPriority').val(taskPriority);
            $('#editDescription').val(description);
        });

        // Update department and designation when a new task assign person is selected
        $('#editTaskAssignPerson').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var department = selectedOption.data('department');
            var designation = selectedOption.data('designation');

            $('#editDepartment').val(department);
            $('#editDesignation').val(designation);
        });
    });

    $(document).ready(function() {
        // alert('ok');
        $('#editProjectName').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');

            // Get the department and designation from the selected option
            var department = selectedOption.attr('data-department');
            var designation = selectedOption.attr('data-designation');

            // Set the department and designation to the input fields
            $('#editDepartmentName').val(department);
            $('#editDesignationname').val(designation);
        });
    });
</script>


<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('#addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });

    $(document).ready(function() {
        $('.edittaskBtn').click(function() {
            $('#cuModaledit').modal('show');
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