@include('hr_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div id="main-wrapper">
    @include('hr_panel.include.navbar_include')
    @include('hr_panel.include.sidebar_include')

    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('expense-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('expense-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Add Expense</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
                                    <a href="{{ route('all-expense') }}" style="color: white;">
                                        All Expense </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-expense') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Vendor</label>
                                            <input type="text" name="vendor" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control" step="0.01" oninput="calculateTotal()" onkeypress="validateNumericInput(event)">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Tax</label>
                                            <input type="number" name="tax" class="form-control" step="0.01" oninput="calculateTotal()" onkeypress="validateNumericInput(event)">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Total Paid</label>
                                            <input type="number" name="total_paid" class="form-control" step="0.01" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('hr_panel.include.footer_include')
<script>
    function calculateTotal() {
        const amount = parseFloat(document.querySelector('input[name="amount"]').value) || 0;
        const tax = parseFloat(document.querySelector('input[name="tax"]').value) || 0;
        const totalPaid = Math.round(amount + tax);  // Rounds to the nearest integer
        
        document.querySelector('input[name="total_paid"]').value = totalPaid;
    }

    // Attach calculateTotal to the input events of Amount and Tax fields
    document.querySelector('input[name="amount"]').addEventListener('input', calculateTotal);
    document.querySelector('input[name="tax"]').addEventListener('input', calculateTotal);
</script>


<script>
    function validateNumericInput(event) {
        const key = event.key;
        if (!/[0-9.]/.test(key) && key !== "Backspace" && key !== "ArrowLeft" && key !== "ArrowRight") {
            event.preventDefault();
        }
    }
</script>
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