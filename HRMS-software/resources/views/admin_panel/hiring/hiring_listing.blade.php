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
                            <h4 class="card-title">All Hiring</h4>
                        </div>
                        <div class="card-body">

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
                                            <th>Eductaion</th>
                                            <th>Skills</th>
                                            <th>Experience paid</th>
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

@include('admin_panel.include.footer_include')