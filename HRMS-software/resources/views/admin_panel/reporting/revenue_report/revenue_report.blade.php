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
                        <button id="generatePdf" class="btn btn-dark ml-3 mb-3" style="font-size: 15px">Generate PDF</button>

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
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>

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


<script>
    $(document).ready(function() {
        $('#generatePdf').on('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const pdf = new jsPDF();

            // Title and Date Range
            pdf.setFontSize(16);
            pdf.text('Revenue Report', 105, 20, {
                align: 'center'
            });
            const dateFrom = $('input[name="date_from"]').val() || 'Not Selected';
            const dateTo = $('input[name="date_to"]').val() || 'Not Selected';
            pdf.setFontSize(12);
            pdf.text(`Date From: ${dateFrom}`, 14, 30);
            pdf.text(`Date To: ${dateTo}`, 14, 40);

            // Table Headers
            const headers = [
                ["Sno#", "Date", "Description", "Customer", "Amount", "Tax", "Total Paid", "Status"]
            ];
            const data = [];

            // Collect Data from Table
            $('#Revenue_report_append tr').each(function(index, row) {
                const rowData = [];
                $(row).find('td').each(function() {
                    rowData.push($(this).text());
                });
                data.push(rowData);
            });

            // Table with autoTable
            pdf.autoTable({
                head: headers,
                body: data,
                startY: 50,
                margin: {
                    left: 14,
                    right: 14
                },
            });

            // Totals
            const totalAmount = $('#totalAmount').text();
            const totalTax = $('#totalTax').text();
            const totalPaid = $('#totalPaid').text();

            const finalY = pdf.lastAutoTable.finalY || 50; // Position after table
            pdf.text(`Total Amount: ${totalAmount}`, 14, finalY + 10);
            pdf.text(`Total Tax: ${totalTax}`, 14, finalY + 20);
            pdf.text(`Total Paid: ${totalPaid}`, 14, finalY + 30);

            // Save PDF
            pdf.save('Revenue_report.pdf');
        });
    });
</script>