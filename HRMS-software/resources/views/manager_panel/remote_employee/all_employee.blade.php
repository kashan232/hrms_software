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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Manager Assign Employees</h4>
                            <!-- Filter Dropdown -->
                            <select id="employeeTypeFilter" class="form-select w-auto">
                                <option value="">All Employees</option>
                                <option value="Onsite">Onsite</option>
                                <option value="Remote">Remote</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Name | Email | Address | Gender</th>
                                            <th>Joined Date | Phone</th>
                                            <th>Department | Designation</th>
                                            <th>Status</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_employee as $employee)
                                        <tr data-type="{{ $employee->employee_status }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->first_name }} {{ $employee->last_name }} <br>{{ $employee->email }} <br>{{ $employee->address }} <br>{{ $employee->employee_gender }} </td>
                                            <td>{{ $employee->joining_date }} <br> {{ $employee->phone }} </td>
                                            <td>{{ $employee->department }} <br> {{ $employee->designation }}</td>
                                            <td>{{ $employee->employee_status }}</td>
                                            <td>{{ $employee->decided_salary }}</td>
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

<script>
    // JavaScript to handle filtering
    document.getElementById('employeeTypeFilter').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#example5 tbody tr');

        rows.forEach(row => {
            const type = row.getAttribute('data-type').toLowerCase();
            if (!filterValue || type === filterValue) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });
</script>
