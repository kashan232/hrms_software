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
                        @if (session()->has('expense-updt'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('expense-updt') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Edit Expense</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('update-expense',['id'=> $expense->id ]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ $expense->date }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control" value="{{ $expense->description }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Vendor</label>
                                            <input type="text" name="vendor" class="form-control" value="{{ $expense->vendor }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Amount</label>
                                            <input type="number" id="amount" name="amount" class="form-control" value="{{ $expense->amount }}" step="0.01" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Tax</label>
                                            <input type="number" id="tax" name="tax" class="form-control" value="{{ $expense->tax }}" step="0.01" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Total Paid</label>
                                            <input type="number" id="total_paid" name="total_paid" class="form-control" value="{{ $expense->total_paid }}" step="0.01" readonly>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control" value="{{ $expense->status }}">
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
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('hr_panel.include.footer_include')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const amountInput = document.getElementById("amount");
        const taxInput = document.getElementById("tax");
        const totalPaidInput = document.getElementById("total_paid");

        function calculateTotal() {
            const amount = parseInt(amountInput.value) || 0;
            const tax = parseInt(taxInput.value) || 0;
            totalPaidInput.value = amount + tax;
        }

        // Add event listeners
        amountInput.addEventListener("input", calculateTotal);
        taxInput.addEventListener("input", calculateTotal);
    });


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