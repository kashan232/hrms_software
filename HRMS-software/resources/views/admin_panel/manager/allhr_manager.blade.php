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
                        {{-- @if (session()->has('hr-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('hr-added') }}.
                    </div>
                    @endif --}}
                    <div class="card-header">
                        <h4 class="card-title">Manager</h4>
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
                                        <th>Designation</th>
                                        <th>First Name <br> Last Name</th>
                                        <th>Phone | Email</th>
                                        <th>Created</th>
                                        <th>User Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_manager as $manager)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $manager->designation }} </td>
                                        <td>{{ $manager->first_name }} <br> {{ $manager->last_name }} </td>
                                        <td>{{ $manager->phone }} <br> {{ $manager->email }}</td>
                                        <td>{{ $manager->created_by }} </td>
                                        <td>{{ $manager->user_name }} </td>
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