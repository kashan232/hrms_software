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
                            <h4 class="card-title">HR</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-hr') }}" style="color: white;">
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


                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Department <br> Designation <br> Join Date</th>
                                            <th>First Name <br> Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_hr as $hr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hr->department }} <br>{{ $hr->designation }} <br> {{ $hr->joining_date }} </td>
                                            <td>{{ $hr->first_name }} <br> {{ $hr->last_name }} </td>
                                            <td>{{ $hr->phone }}</td>
                                            <td>{{ $hr->email }}</td>
                                            <td>{{ $hr->user_name }} </td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="{{ route('edit-hr', ['id' => $hr->id]) }}"  style="color: white;">
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
    <!--**********************************
            Content body end
        ***********************************-->

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')