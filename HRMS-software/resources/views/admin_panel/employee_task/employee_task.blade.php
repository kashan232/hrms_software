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
                        <div class="card-header">
                            <h4 class="card-title">Employee Task List</h4>

                            <select id="tasktypefilter" class="form-select w-auto">
                                <option value="">All</option>
                                <option value="Complete">Complete</option>
                                <option value="Incomplete">Incomplete</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Project Name <br> Task Category</th>
                                            <th>Start Date <br> End Date</th>
                                            <th>Emp Department <br>Emp Designation</th>
                                            <th>Assign Person <br>Priority</th>
                                            <th>Description</th>
                                            <th>Completion Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_task as $task)
                                        <tr data-type="{{ $task->status }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $task->project_name }} <br> {{ $task->task_category }}</td>
                                            <td>{{ $task->start_date }} <br> {{ $task->end_date }} </td>
                                            <td>{{ $task->department }} <br> {{ $task->designation }} </td>
                                            <td><strong>{{ $task->task_assign_person }}</strong> <br> {{ $task->task_priority }} </td>
                                            <td>{{ $task->description }}</td>
                                            <td>
                                                @if ($task->status == 'Complete')
                                                <button class="btn btn-success"><i class="fas fa-check-circle"></i></button>
                                                @else ($task->status == 'Incomplete')
                                                <button class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
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

        </div>
    </div>
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')

<script>
    // JavaScript to handle filtering
    document.getElementById('tasktypefilter').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase(); // Get the selected filter value in lowercase
        const rows = document.querySelectorAll('#example5 tbody tr'); // Select all table rows

        rows.forEach(row => {
            const type = row.getAttribute('data-type')?.toLowerCase(); // Get the data-type attribute in lowercase
            if (!filterValue || (type && type.includes(filterValue))) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });
</script>