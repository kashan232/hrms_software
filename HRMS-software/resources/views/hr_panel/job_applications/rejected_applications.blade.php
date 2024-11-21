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
                            <h4 class="card-title">Rejected Applications</h4>
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
                                            <th>Job</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($RejectApplications as $RejectApplications)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($RejectApplications->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $RejectApplications->application_post }}</td>
                                            <td>{{ $RejectApplications->first_name }}</td>
                                            <td>{{ $RejectApplications->last_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger addNewButton btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationId('{{ $RejectApplications->id }}')">
                                                    Rejected
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('view-applications', ['id' => $RejectApplications->id]) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
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