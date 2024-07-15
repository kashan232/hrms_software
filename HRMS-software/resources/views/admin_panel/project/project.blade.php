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
                        @if (session()->has('project-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('project-added') }}.
                        </div>
                        @endif

                        @if (session()->has('success'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title">Project</h4>
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
                                            <th>Project Name <br> Deadline </th>
                                            <th>Project Category</th>
                                            <th>Start Date <br> End Date</th>
                                            <th>Budget</th>
                                            <th>Priority</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_project as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->project_name }} <br> {{ $project->project_deadline }} </td>
                                            <td>{{ $project->project_category }}</td>
                                            <td>{{ $project->project_start_date }}
                                                <br>{{ $project->project_end_date }}
                                            </td>
                                            <td>{{ $project->budget }}</td>
                                            <td>
                                                {{ $project->priority }}
                                                @php
                                                $progress = 0;
                                                $color = '';
                                                switch ($project->priority) {
                                                case 'Highest':
                                                $progress = 100;
                                                $color = 'bg-success';
                                                break;
                                                case 'Medium':
                                                $progress = 75;
                                                $color = 'bg-info';
                                                break;
                                                case 'Low':
                                                $progress = 50;
                                                $color = 'bg-warning';
                                                break;
                                                case 'Lowest':
                                                $progress = 25;
                                                $color = 'bg-danger';
                                                break;
                                                }
                                                @endphp
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span>{{ $progress }}%</span>
                                            </td>
                                            <td>{{ $project->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">
                                                    Pending</button>
                                            </td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary editprojectBtn" data-project-id="{{ $project->id }}" data-project-name="{{ $project->project_name }}" data-project-deadline="{{ $project->project_deadline }}" data-project-category="{{ $project->project_category }}" data-project-start-date="{{ $project->project_start_date }}" data-project-end-date="{{ $project->project_end_date }}" data-project-budget="{{ $project->budget }}" data-project-priority="{{ $project->priority }}" data-project-description="{{ $project->description }}" data-bs-toggle="modal" data-bs-target="#cuModaledit">
                                                        <i class="la la-pencil"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <a href="{{ route('delete-project', ['id' => $project->id]) }}"  style="color: white;">
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
                            <h5 class="modal-title"><span class="type"></span> <span>Add Project</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-project') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" class="form-control" required>
                                    <label>Project Deadline</label>
                                    <input type="date" name="project_deadline" class="form-control" required>
                                    <label>Project Category</label>
                                    <input type="text" name="project_category" class="form-control" required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Project Start Date</label>
                                            <input type="date" name="project_start_date" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Project End Date</label>
                                            <input type="date" name="project_end_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Budget</label>
                                            <input type="number" name="budget" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Priority</label>
                                            <select name="priority" id="" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                <option value="Highest">Highest</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                                <option value="Lowest">Lowest</option>
                                            </select>
                                        </div>
                                    </div>
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
                            <h5 class="modal-title"><span class="type"></span> <span>Edit Project</span></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form id="editProjectForm" action="{{ route('update-project') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_id" id="editProjectId">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" id="editProjectName" class="form-control" required>
                                    <label>Project Deadline</label>
                                    <input type="date" name="project_deadline" id="editProjectDeadline" class="form-control" required>
                                    <label>Project Category</label>
                                    <input type="text" name="project_category" id="editProjectCategory" class="form-control" required>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Project Start Date</label>
                                            <input type="date" name="project_start_date" id="editProjectStartDate" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Project End Date</label>
                                            <input type="date" name="project_end_date" id="editProjectEndDate" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Budget</label>
                                            <input type="number" name="budget" id="editProjectBudget" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Priority</label>
                                            <select name="priority" id="editProjectPriority" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                <option value="Highest">Highest</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                                <option value="Lowest">Lowest</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label>Description</label>
                                    <textarea name="description" id="editProjectDescription" class="form-control" required></textarea>
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

@include('admin_panel.include.footer_include')
<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('#addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });

    $(document).ready(function() {
        $('#edit_button').click(function() {
            $('#cuModaledit').modal('show');
        });
    });

    $(document).ready(function() {
        $('.editprojectBtn').on('click', function() {
            var project = $(this).data();

            $('#editProjectId').val(project.projectId);
            $('#editProjectName').val(project.projectName);
            $('#editProjectDeadline').val(project.projectDeadline);
            $('#editProjectCategory').val(project.projectCategory);
            $('#editProjectStartDate').val(project.projectStartDate);
            $('#editProjectEndDate').val(project.projectEndDate);
            $('#editProjectBudget').val(project.projectBudget);
            $('#editProjectPriority').val(project.projectPriority);
            $('#editProjectDescription').val(project.projectDescription);

            $('#cuModaledit').modal('show');
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
</script>