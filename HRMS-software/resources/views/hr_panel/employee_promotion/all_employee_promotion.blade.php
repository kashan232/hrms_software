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
                            <h4 class="card-title">All Promoted Employees</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Employee Name | Current Position</th>
                                            <th>New Position</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>New Salary <br> Date</th>
                                            <th>Description</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($EmployeePromotions as $EmployeePromotion)
                                        <tr>
                                            <td>{{ $EmployeePromotion->employee_name }} <br> {{ $EmployeePromotion->curent_position }} </td>
                                            <td>{{ $EmployeePromotion->new_position }} </td>
                                            <td>{{ $EmployeePromotion->department }} </td>
                                            <td>{{ $EmployeePromotion->designation }} </td>
                                            <td>{{ $EmployeePromotion->new_salary }} <br> {{ $EmployeePromotion->date }} </td>
                                            <td>{{ $EmployeePromotion->jobDescription }}</td>
                                            <td>{{ $EmployeePromotion->additionalNotes }} </td>
                                            <td>
                                                <div class="button--group">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href="#"  style="color: white;">
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