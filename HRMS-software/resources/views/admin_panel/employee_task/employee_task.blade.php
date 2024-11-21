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
                                            <tr>
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
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    {{-- <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK Technologies</a>
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

