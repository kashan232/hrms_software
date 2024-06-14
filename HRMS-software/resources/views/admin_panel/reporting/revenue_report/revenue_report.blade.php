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
                            <h4 class="card-title">Revenue Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="Revenue_report" class="new-added-form" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Date From</label>
                                            <input type="date" class="form-control" name="date_from">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Date To</label>
                                            <input type="date" class="form-control" name="date_to">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Tax</th>
                                            <th>Total paid</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Revenue_report_append">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class="text-right"><strong>Total Amount:</strong></td>
                                            <td colspan="1" class="text-right" id="totalAmount">0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-right"><strong>Total Tax:</strong></td>
                                            <td colspan="1" class="text-right" id="totalTax">0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-right"><strong>Total Paid:</strong></td>
                                            <td colspan="1" class="text-right" id="totalPaid">0</td>
                                        </tr>
                                    </tfoot>
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
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK
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

@include('admin_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('#Revenue_report').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var date_from = $('input[name="date_from"]').val();
            var date_to = $('input[name="date_to"]').val();

            // Use AJAX to fetch data based on the selected date range
            $.ajax({
                url: '{{ route("get-revenue-report") }}', // Replace with your actual server-side endpoint URL
                method: 'GET',
                data: {
                    date_from: date_from,
                    date_to: date_to
                },
                success: function(response) {
                    // Assuming you have a <tbody> element with id="Revenue_report_append" to display the data
                    var RevenueReportTable = $('#Revenue_report_append');

                    // Clear existing rows
                    RevenueReportTable.empty();

                    // Initialize the totals
                    let totalAmount = 0;
                    let totalTax = 0;
                    let totalPaid = 0;

                    // Append new rows based on the response
                    response.Revenues.forEach(function(Revenue, index) {
                        RevenueReportTable.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + Revenue.date + '</td>' +
                            '<td>' + Revenue.description + '</td>' +
                            '<td>' + Revenue.Customer + '</td>' +
                            '<td>' + Revenue.amount + '</td>' +
                            '<td>' + Revenue.tax + '</td>' +
                            '<td>' + Revenue.total_paid + '</td>' +
                            '<td>' + Revenue.status + '</td>' +
                            '</tr>'
                        );

                        // Add to the totals
                        totalAmount += parseFloat(Revenue.amount);
                        totalTax += parseFloat(Revenue.tax);
                        totalPaid += parseFloat(Revenue.total_paid);
                    });

                    // Update the footer with the totals, removing decimals
                    $('#totalAmount').text(totalAmount.toFixed(0));
                    $('#totalTax').text(totalTax.toFixed(0));
                    $('#totalPaid').text(totalPaid.toFixed(0));
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
