@include('manager_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div id="main-wrapper">
    @include('manager_panel.include.navbar_include')
    @include('manager_panel.include.sidebar_include')

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('revenue-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('revenue-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Add Task</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-task') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <select name="project_name" id="projectName" class="form-control mt-2 mb-2">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach ($all_project as $project)
                                            <option value="{{ $project->project_name }}"
                                                data-category="{{ $project->project_category }}">
                                                {{ $project->project_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label>Project Category</label>
                                        <input type="text" name="task_category" id="taskCategory" class="form-control mt-2 mb-2" readonly>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Task Start Date</label>
                                                <input type="date" name="start_date" class="form-control mt-2 mb-2" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Task End Date</label>
                                                <input type="date" name="end_date" class="form-control mt-2 mb-2" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Task Assign Person</label>
                                                <select name="task_assign_person" id="taskAssignPerson" class="form-control mt-2 mb-2">
                                                    <option value="" selected disabled>Select One</option>
                                                    @foreach ($all_employee as $employee)
                                                    <option value="{{ $employee->first_name }} {{ $employee->last_name }}"
                                                        data-department="{{ $employee->department }}"
                                                        data-designation="{{ $employee->designation }}">
                                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Employee Department</label>
                                                <input type="text" name="department" id="department" class="form-control mt-2 mb-2" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Designation</label>
                                                <input type="text" name="designation" id="designation" class="form-control mt-2 mb-2" readonly>
                                            </div>
                                        </div>

                                        <label>Task Priority</label>
                                        <select name="task_priority" class="form-control mt-2 mb-2" required>
                                            <option value="" selected disabled>Select One</option>
                                            <option value="Highest">Highest</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                        <label>Description</label>
                                        <textarea name="description" class="form-control mt-2 mb-2" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('manager_panel.include.footer_include')
<script src="https://jobie.dexignzone.com/laravel/demo/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://jobie.dexignzone.com/laravel/demo/js/plugins-init/select2-init.js" type="text/javascript"></script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get relevant DOM elements
        const projectName = document.getElementById('projectName');
        const taskCategory = document.getElementById('taskCategory');
        const taskAssignPerson = document.getElementById('taskAssignPerson');
        const departmentField = document.getElementById('department');
        const designationField = document.getElementById('designation');

        // Update task category based on project selection
        projectName.addEventListener('change', function() {
            const selectedOption = projectName.options[projectName.selectedIndex];
            taskCategory.value = selectedOption.getAttribute('data-category') || '';
        });

        // Update department and designation based on employee selection
        taskAssignPerson.addEventListener('change', function() {
            const selectedOption = taskAssignPerson.options[taskAssignPerson.selectedIndex];
            departmentField.value = selectedOption.getAttribute('data-department') || '';
            designationField.value = selectedOption.getAttribute('data-designation') || '';
        });
    });
</script>