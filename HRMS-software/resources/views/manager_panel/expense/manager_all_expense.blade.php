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
    <!-- Edit Expense Modal -->

    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span class="type"></span> <span>Add Leave Request</span></h5>
                    <!-- Adjusted close button with custom styling -->
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form id="editExpenseForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>

                        <div class="form-group">
                            <label for="vendor">Vendor</label>
                            <input type="text" class="form-control" id="vendor" name="vendor" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" oninput="calculateTotal()">
                        </div>

                        <div class="form-group">
                            <label>Tax</label>
                            <input type="text" name="tax" id="tax" class="form-control" oninput="calculateTotal()">
                        </div>

                        <div class="form-group">
                            <label>Total Paid</label>
                            <input type="text" name="total_paid" id="total_paid" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" id="status" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="receipt">Receipt</label>
                            <input type="file" class="form-control" id="receipt" name="receipt">
                        </div>
                        <input type="hidden" id="expense_id" name="expense_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Expense</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Expense</h4>
                            <div>
                                <button type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('manager-add-expense') }}" style="color: white;">
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
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th>Tax</th>
                                            <th>Total paid</th>
                                            <th>Status</th>
                                            <th>Expense By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_expense as $expense)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>{{ $expense->vendor }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->tax }}</td>
                                            <td>{{ $expense->total_paid }}</td>
                                            <td>{{ $expense->status }}</td>
                                            <td>{{ $expense->usertype }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-primary btn-md editbtn"
                                                        data-id="{{ $expense->id }}"
                                                        data-date="{{ $expense->date }}"
                                                        data-description="{{ $expense->description }}"
                                                        data-vendor="{{ $expense->vendor }}"
                                                        data-amount="{{ $expense->amount }}"
                                                        data-tax="{{ $expense->tax }}"
                                                        data-total_paid="{{ $expense->total_paid }}"
                                                        data-status="{{ $expense->status }}">
                                                        <i class="la la-pencil"></i>
                                                    </button>
                                                    &nbsp;
                                                    <form action="{{ route('manager-delete-expense', $expense->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Are you sure you want to delete this expense?');">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    </form>
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

@include('manager_panel.include.footer_include')
<script>
    $(document).ready(function() {
        // Attach event handler for dynamically generated edit buttons
        $(document).on('click', '.editbtn', function() {
            // Show the modal
            $('#cuModal').modal('show');

            // Get data from the button
            const id = $(this).data('id');
            const date = $(this).data('date');
            const description = $(this).data('description');
            const vendor = $(this).data('vendor');
            const amount = $(this).data('amount');
            const tax = $(this).data('tax');
            const total_paid = $(this).data('total_paid');
            const status = $(this).data('status');

            // Populate the modal fields
            $('#expense_id').val(id);
            $('#date').val(date);
            $('#description').val(description);
            $('#vendor').val(vendor);
            $('#amount').val(amount);
            $('#tax').val(tax);
            $('#total_paid').val(total_paid);
            $('#status').val(status);

            // Set form action URL for update
            $('#editExpenseForm').attr('action', '/manager-update-expense/' + id); // Update with the correct route
        });
    });
</script>

<script>
    function calculateTotal() {
        // Get values of amount and tax
        const amount = parseFloat(document.getElementById('amount').value) || 0;
        const tax = parseFloat(document.getElementById('tax').value) || 0;

        // Calculate total paid and remove decimals
        const totalPaid = Math.floor(amount + tax);

        // Display the result in total_paid field
        document.getElementById('total_paid').value = totalPaid;
    }
</script>