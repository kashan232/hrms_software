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
                            <h4 class="card-title">All Jobs</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('manager-add-hiring') }}" style="color: white;">
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
                                            <th>Date</th>
                                            <th>Designation</th>
                                            <th>Job Description</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>Experience</th>
                                            <th>Status</th>
                                            <th>Hired By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_hiring as $hiring)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hiring->date }}</td>
                                            <td>{{ $hiring->designation }}</td>
                                            <td>{{ $hiring->job_description }}</td>
                                            <td>{{ $hiring->education }}</td>
                                            <td>{{ $hiring->skills }}</td>
                                            <td>{{ $hiring->experience }}</td>
                                            <td>{{ $hiring->status }}</td>
                                            <td>{{ $hiring->usertype }}</td>
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

@include('manager_panel.include.footer_include')