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
                            <h4 class="card-title">Generate Salary</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary">
                                    <a href="{{ route('create-salary') }}" style="color: white;">
                                        <i class="las la-plus"></i>Add New </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Name <br> Department <br>Designation </th>
                                            <th>Month | Paid Date</th>
                                            <th>Allowances</th>
                                            <th>Deductions</th>
                                            <th>Basic Salary <br> Allowances <br> Deductions</th>
                                            <th>Net Salary</th>
                                            <th>Generate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salaries as $salary)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $salary->employee_name }} <br>{{ $salary->department }} <br> {{ $salary->designation }}</td>
                                            <td>{{ \Carbon\Carbon::parse($salary->salary_month)->format('F Y') }} <br> {{ \Carbon\Carbon::parse($salary->salary_paid_date)->format('d-m-Y') }}</td>
                                            <td>
                                                @php
                                                $allowances = json_decode($salary->allowances, true);
                                                @endphp
                                                @foreach ($allowances as $allowance)
                                                {{ $allowance['name'] }}: {{ $allowance['amount'] }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @php
                                                $deductions = json_decode($salary->deductions, true);
                                                @endphp
                                                @foreach ($deductions as $deduction)
                                                {{ $deduction['name'] }}: {{ $deduction['amount'] }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $salary->basic_salary }} <br> {{ $salary->total_allowances }} <br> {{ $salary->total_deductions }}</td>
                                            <td>{{ $salary->net_salary }}</td>
                                            <td>
                                                <a href="{{ route('salary-print', $salary->id) }}" class="btn btn-success">Print</a>
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