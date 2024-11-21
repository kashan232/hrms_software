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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Project </th>
                                            <th>Task </th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Priority</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employeetasks as $task)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $task->project_name }}</td>
                                            <td>{{ $task->task_category }}</td>
                                            <td>{{ $task->start_date }}</td>
                                            <td>{{ $task->end_date }} </td>
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
                                                    <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                @if($task->status == 'Complete')
                                                <button class="btn btn-success btn-sm" disabled>Performed</button>
                                                @elseif(strtotime($task->end_date) < strtotime(now()))
                                                <input type="radio" name="status" value="Complete" disabled> Complete<br>
                                                <input type="radio" name="status" value="Incomplete" disabled> Incomplete<br>
                                                @else
                                                <input type="radio" name="status" value="Complete" onclick="showCompletionModal('{{ $task->id }}')"> Complete<br>
                                                <input type="radio" name="status" value="Incomplete" onclick="updateStatus('{{ $task->id }}', 'Incomplete')"> Incomplete<br>
                                                @endif
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

            <!-- Completion Modal -->
            <div id="completionModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Completion Description</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 20px; border:none;" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="completionForm">
                                @csrf
                                <input type="hidden" name="task_id" id="task_id">
                                <div class="form-group">
                                    <label for="employee_description">Description</label>
                                    <textarea name="employee_description" id="employee_description" class="form-control" rows="4"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="submitCompletionForm()">Submit</button>
                            </form>
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
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed & Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a> 2024</p>
        </div>
    </div>
    --}}
    <!--**********************************
            Footer end
    ***********************************-->
</div>
<!--**********************************
        Main wrapper end
***********************************-->

@include('employee_panel.include.footer_include')
<script>
    function showCompletionModal(taskId) {
        $('#task_id').val(taskId);
        $('#completionModal').modal('show');
    }

    function submitCompletionForm() {
        const taskId = $('#task_id').val();
        const description = $('#employee_description').val();
        const status = 'Complete';

        $.ajax({
            url: "{{ route('update-status') }}",
            method: "POST",
            data: {
                task_id: taskId,
                status: status,
                employee_description: description,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#completionModal').modal('hide');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while updating the status.');
            }
        });
    }

    function updateStatus(taskId, status) {
        $.ajax({
            url: "{{ route('update-status') }}",
            method: "POST",
            data: {
                task_id: taskId,
                status: status,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while updating the status.');
            }
        });
    }
</script>
