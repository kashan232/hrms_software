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
                        <div class="card-header">
                            <h4 class="card-title">All Jobs</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-job-board') }}" style="color: white;">
                                        <i class="las la-plus"></i>Add New </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                            <div class="alert alert-danger solid alert-square">
                                <strong>Success!</strong> {{ session('delete-message') }}.
                            </div>
                            @endif

                            {{-- <div class="alert alert-dark solid alert-square"><strong>Error!</strong>
                                 You successfully read this important alert message.</div> --}}

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Job Title</th>
                                            <th>CLose Date</th>
                                            <th>Vacancies</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_job_boards as $all_job_board)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $all_job_board->department }}</td>
                                            <td>{{ $all_job_board->designation }}</td>
                                            <td>{{ $all_job_board->job_title }}</td>
                                            <td>{{ $all_job_board->closing_date }}</td>
                                            <td>{{ $all_job_board->vacancies }}</td>
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
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK Technologies</a>
                2024</p>
        </div>
    </div> <!--**********************************
            Footer end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('hr_panel.include.footer_include')