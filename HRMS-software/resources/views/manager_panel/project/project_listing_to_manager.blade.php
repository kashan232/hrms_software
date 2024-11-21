@include('manager_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
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
                        <div class="card-header">
                            <h4 class="card-title">Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Assigned By</th>
                                            <th>Project</th>
                                            <th>Category</th>
                                            <th>Start Date <br> End Date</th>
                                            <th>Priority</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_project as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->usertype }} <br>{{ $project->user_name }}</td>
                                            <td>{{ $project->project_name }}</td>
                                            <td>{{ $project->project_category }}</td>
                                            <td>{{ $project->project_start_date }} <br>{{ $project->project_end_date }}</td>
                                            <td>
                                                {{ $project->priority }}
                                                @php
                                                    $progress = 0;
                                                    $color = '';
                                                    switch($project->priority) {
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

            <!--Edit Modal -->
            <div  id="editbtn" class="modal fade" tabindex="-1" aria-labelledby="editdepartmentLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editdepartmentLabel"><span class="type"></span> <span>Edit project</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="hidden" id="editdepartmentId" name="department_id" class="form-control" required>
                                    <input type="text" id="editdepartmentName" name="department_name" class="form-control" required>
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
            <p>Copyright © Designed &amp; Developed by <a manageref="http://dexignzone.com/" target="_blank">AK Technologies</a>
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
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('#addNewButton').click(function(){
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function(){
        $('.editdepartmentBtn').click(function(){
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


