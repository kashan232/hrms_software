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

                                                    <button type="button" class="btn btn-danger btn-sm" style="margin-left: 5px;">
                                                        <a href="{{ route('delete-manager-task', ['id' => $task->id]) }}" style="color: white; text-decoration: none;">
                                                            <i class="la la-trash"></i> 
                                                        </a>
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Task</span></h5>
                            <!-- Adjusted close button with custom styling -->
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
                                    <!-- Task Assign Person Select Box -->
                                    <label>Task Assign Person</label>
                                    <select name="task_assign_person" id="taskAssignPerson" class="form-control">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($all_employee as $employee)
                                        <option value="{{ $employee->first_name }} {{ $employee->last_name }}" data-department="{{ $employee->department }}" data-designation="{{ $employee->designation }}">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </option>
                                        @endforeach
                                    </select>


                                    <!-- Employee Department and Designation Input Fields -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Employee Department</label>
                                            <input type="text" name="department" id="editDepartmentName" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Designation</label>
                                            <input type="text" name="designation" id="editDesignationname" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <label>Task Priority</label>
                                    <select name="task_priority" id="" class="form-control" required>
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

@include('manager_panel.include.footer_include')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectBox = document.getElementById('taskAssignPerson');

        // Create an input box for search
        const searchInput = document.createElement('input');
        searchInput.setAttribute('type', 'text');
        searchInput.setAttribute('id', 'searchInput');
        searchInput.classList.add('form-control');

        // Insert the search input above the select box
        selectBox.parentElement.insertBefore(searchInput, selectBox);

        // Filter the select options based on the search input
        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            const options = selectBox.getElementsByTagName('option');

            // Loop through all options and hide those that don't match the search term
            Array.from(options).forEach(option => {
                if (option.text.toLowerCase().indexOf(filter) > -1) {
                    option.style.display = ''; // Show the option
                } else {
                    option.style.display = 'none'; // Hide the option
                }
            });
        });

        // Reset the search when the dropdown is closed (optional)
        selectBox.addEventListener('blur', function() {
            searchInput.value = ''; // Clear the search input when focus is lost
        });
    });

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