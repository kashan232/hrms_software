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
                            <h4 class="card-title">Manager</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-manager') }}" style="color: white;">
                                        <i class="las la-plus"></i>Add Manager </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                            <div class="alert alert-danger solid alert-square">
                                <strong>Success!</strong> {{ session('delete-message') }}.
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department <br>Designation</th>
                                            <th>First Name <br> Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_manager as $manager)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $manager->department }} <br> {{ $manager->designation }} </td>
                                            <td>{{ $manager->first_name }} <br> {{ $manager->last_name }} </td>
                                            <td>{{ $manager->phone }}</td>
                                            <td>{{ $manager->email }}</td>
                                            <td>{{ $manager->user_name }} </td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="{{ route('edit-manager', ['id' => $manager->id]) }}"  style="color: white;">
                                                        <i class="la la-pencil"></i>  </a>
                                                    </button>
                                                </div>
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
