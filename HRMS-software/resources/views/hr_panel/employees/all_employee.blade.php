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
                            <h4 class="card-title">Employees</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('hr-add-employee') }}" style="color: white;">
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
                                            <th>Name | Email | Address | Gender</th>
                                            <th>Joined Date</th>
                                            <th>Phone</th>
                                            <th>Department | Designation</th>
                                            <th>Salary | Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_employee as $employee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->first_name }} {{ $employee->last_name }} <br>{{ $employee->email }} <br>{{ $employee->address }} <br>{{ $employee->employee_gender }} </td>
                                            <td>{{ $employee->joining_date }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->department }} <br> {{ $employee->designation }}</td>
                                            <td>{{ $employee->decided_salary }} <br><span class="font-weight-bold">{{ $employee->create_by }}</span></td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="{{ route('hr-edit-employee', ['id' => $employee->id]) }}"  style="color: white;">
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