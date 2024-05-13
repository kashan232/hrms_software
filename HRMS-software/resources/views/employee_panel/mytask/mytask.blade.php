@include('employee_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('employee_panel.include.navbar_include')


    @include('employee_panel.include.sidebar_include')
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
                            <h4 class="card-title">My Task</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add Completion Status">
                                    <i class="las la-plus"></i>Add Completion Status
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
                                            <th>Task Priority</th>
                                            <th>Description</th>
                                            <th>Completion Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employeetasks as $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->project_name }}</td>
                                                <td>{{ $task->task_category }}</td>
                                                <td>{{ $task->start_date }} <br> {{ $task->end_date }} </td>
                                                <td>
                                                    {{ $task->task_priority }}
                                                    @php
                                                        $progress = 0;
                                                        $color = '';
                                                        switch ($task->task_priority) {
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
                                                        <div class="progress-bar {{ $color }}" role="progressbar"
                                                            style="width: {{ $progress }}%;"
                                                            aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <span>{{ $progress }}%</span>
                                                </td>
                                                <td>{{ $task->description }}</td>
                                                <td>
                                                    <div class="button--group">
                                                        <button type="button" class="btn btn-primary">
                                                            {{ $task->status }} </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if(strtotime($task->end_date) < strtotime(now()))
                                                        <input type="radio" name="status" value="Complete" disabled>
                                                        Complete<br>
                                                        <input type="radio" name="status" value="Incomplete" disabled>
                                                        Incomplete<br>
                                                    @else
                                                        <input type="radio" name="status" value="Complete" onclick="updateStatus('{{ $task->id }}', 'Complete')">
                                                        Complete<br>
                                                        <input type="radio" name="status" value="Incomplete" onclick="updateStatus('{{ $task->id }}', 'Incomplete')">
                                                        Incomplete<br>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <div class="button--group">
                                                        <button type="button" class="btn btn-primary edittaskBtn"
                                                            data-toggle="modal" data-modal_title="Edit task"
                                                            data-has_status="1" data-target="#edittask">
                                                            <i class="la la-pencil"></i></button>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <!--Create Modal -->
            <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="type"></span> <span>Add Completion Status</span></h5>
                            <!-- Adjusted close button with custom styling -->
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                        </div>
                        <form action="{{ route('store-mytask') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Completion Status</label>
                                            <input type="text" name="status" id="status" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            {{-- <!--Edit Modal -->
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
            </div> --}}
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

@include('employee_panel.include.footer_include')
<script>
    function updateStatus(taskId, status) {
        // Send AJAX request to update task status
        $.ajax({
            url: "{{ route('update-status') }}",
            method: "POST",
            data: {
                task_id: taskId,
                status: status,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the page after 3 seconds
                setTimeout(function() {
                    location.reload();
                }, 1000); // 1 seconds delay
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    }
</script>








