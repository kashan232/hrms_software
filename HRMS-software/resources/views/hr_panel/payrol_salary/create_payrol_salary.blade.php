@include('hr_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                        @if (session()->has('success'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Create Salary</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="basic-form">
                                <form id="salaryForm" action="{{ route('post-create-salary') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="employeeName" class="form-label">Employee Name:</label>
                                            <select name="employee_id" id="employeeName" class="form-control" onchange="updateEmployeeDetails()" required>
                                                <option>Select Employee</option>
                                                @foreach($employees as $employee)
                                                <option value="{{ $employee->id }} {{ $employee->first_name }}" data-department="{{ $employee->department }}" data-designation="{{ $employee->designation }}" data-salary="{{ $employee->decided_salary }}">
                                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="department" class="form-label">Department:</label>
                                            <input type="text" id="department" name="department" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="designation" class="form-label">Designation:</label>
                                            <input type="text" id="designation" name="designation" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="month" class="form-label">Salary Month:</label>
                                            <input type="month" id="month" name="salary_month" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="paidDate" class="form-label">Salary Paid Date:</label>
                                            <input type="date" id="paidDate" name="salary_paid_date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="basicSalary" class="form-label">Basic Salary:</label>
                                            <input type="text" id="basicSalary" name="basic_salary" readonly class="form-control" oninput="calculateNetSalary()">
                                        </div>
                                    </div>

                                    <hr>

                                    <h3>Allowances:</h3>
                                    <br>
                                    <div id="allowanceContainer" class="row">
                                        <!-- Default allowances -->
                                        <div class="allowance mb-3 col-md-6">
                                            <label for="houseAllowance" class="form-label">House Allowance:</label>
                                            <input type="text" id="houseAllowance" name="allowanceName[]" class="form-control" placeholder="Amount" oninput="calculateNetSalary()">
                                            <input type="hidden" name="allowanceDescription[]" value="House Allowance">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="additionalAllowance" class="form-label">Add Additional Allowance:</label>
                                            <select id="additionalAllowance" class="form-control" onchange="addAllowance()">
                                                <option value="">Select Allowance</option>
                                                <option value="Medical Allowance">Medical Allowance</option>
                                                <option value="Conveyance Allowance">Conveyance Allowance</option>
                                                <option value="Special Allowance">Special Allowance</option>
                                                <option value="Leave Travel Allowance">Leave Travel Allowance</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="totalAllowances" class="form-label">Total Allowances:</label>
                                            <input type="text" id="totalAllowances" name="total_allowances" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <hr>

                                    <h3>Deductions</h3>
                                    <br>
                                    <div id="deductionContainer" class="row">
                                        <!-- Default Deduction -->
                                        <div class="deduction mb-3 col-md-6">
                                            <label for="standardDeduction" class="form-label">Standard Deduction:</label>
                                            <input type="text" id="standardDeduction" name="deductionName[]" class="form-control" placeholder="Amount" oninput="calculateTotalDeductions()">
                                            <input type="hidden" name="deductionDescription[]" value="Standard Deduction">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="additionalDeduction" class="form-label">Add Additional Deduction:</label>
                                            <select id="additionalDeduction" class="form-control" onchange="addDeduction()">
                                                <option value="">Select Deduction</option>
                                                <option value="Professional Tax">Professional Tax</option>
                                                <option value="Provident Fund">Provident Fund</option>
                                                <option value="Income Tax">Income Tax</option>
                                                <option value="Employee State Insurance">Employee State Insurance</option>
                                                <option value="Loan Repayment">Loan Repayment</option>
                                                <option value="Gratuity">Gratuity</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="totalDeductions" class="form-label">Total Deductions:</label>
                                            <input type="text" id="totalDeductions" name="total_deductions" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="netSalary" class="form-label">Net Salary:</label>
                                            <input type="text" id="netSalary" name="net_salary" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

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
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK
                    Technologies</a>
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
<script>
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route("get-designations") }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
            }
        });
    });
</script>
<script>
    function updateEmployeeDetails() {
        var employeeSelect = document.getElementById('employeeName');
        var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
        var department = selectedOption.getAttribute('data-department');
        var designation = selectedOption.getAttribute('data-designation');
        var salary = selectedOption.getAttribute('data-salary');

        document.getElementById('department').value = department;
        document.getElementById('designation').value = designation;
        document.getElementById('basicSalary').value = salary;
    }
</script>
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = "password";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });
</script>

<script>
    function addAllowance() {
        const select = document.getElementById('additionalAllowance');
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption.value) {
            const container = document.getElementById('allowanceContainer');
            const allowanceDiv = document.createElement('div');
            allowanceDiv.classList.add('allowance', 'mb-3', 'col-md-6');

            const label = document.createElement('label');
            label.className = 'form-label';
            label.textContent = selectedOption.text + ':';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'allowanceName[]';
            input.className = 'form-control';
            input.placeholder = 'Amount';
            input.oninput = calculateNetSalary;

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'allowanceDescription[]';
            hiddenInput.value = selectedOption.value;

            allowanceDiv.appendChild(label);
            allowanceDiv.appendChild(input);
            allowanceDiv.appendChild(hiddenInput);

            container.appendChild(allowanceDiv);

            // Reset the select menu
            select.selectedIndex = 0;

            calculateNetSalary();
        }
    }

    function addDeduction() {
        const select = document.getElementById('additionalDeduction');
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption.value) {
            const container = document.getElementById('deductionContainer');
            const deductionDiv = document.createElement('div');
            deductionDiv.classList.add('deduction', 'mb-3', 'col-md-6');

            const label = document.createElement('label');
            label.className = 'form-label';
            label.textContent = selectedOption.text + ':';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'deductionName[]';
            input.className = 'form-control';
            input.placeholder = 'Amount';
            input.oninput = calculateTotalDeductions;

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'deductionDescription[]';
            hiddenInput.value = selectedOption.value;

            deductionDiv.appendChild(label);
            deductionDiv.appendChild(input);
            deductionDiv.appendChild(hiddenInput);

            container.appendChild(deductionDiv);

            // Reset the select menu
            select.selectedIndex = 0;

            calculateTotalDeductions();
        }
    }

    function calculateTotalDeductions() {
        const deductionInputs = document.querySelectorAll('input[name="deductionName[]"]');
        let totalDeductions = 0;
        deductionInputs.forEach(input => {
            const value = parseFloat(input.value) || 0;
            totalDeductions += value;
        });
        document.getElementById('totalDeductions').value = Math.round(totalDeductions); // Display total deductions without decimal places
        calculateNetSalary(); // Recalculate net salary after updating deductions
    }

    function calculateNetSalary() {
        const basicSalary = parseFloat(document.getElementById('basicSalary').value) || 0;
        const allowanceInputs = document.querySelectorAll('input[name="allowanceName[]"]');
        let totalAllowances = 0;
        allowanceInputs.forEach(input => {
            const value = parseFloat(input.value) || 0;
            totalAllowances += value;
        });
        const totalDeductions = parseFloat(document.getElementById('totalDeductions').value) || 0;
        const netSalary = Math.round(basicSalary + totalAllowances - totalDeductions);
        document.getElementById('netSalary').value = netSalary; // Display net salary without decimal places

        // Calculate and set the total allowances without decimal places
        document.getElementById('totalAllowances').value = Math.round(totalAllowances);
    }
</script>