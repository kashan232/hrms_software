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
                            <h4 class="card-title">Leave Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="hr_leave_report" class="new-added-form" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label for="hr">HR</label>
                                            <select name="hr" id="hr" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($hrs as $hr)
                                                <option value="{{ $hr->first_name . ' ' . $hr->last_name }}" data-id="{{ $hr->designation }}">{{ $hr->first_name . ' ' . $hr->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="designation">Designation</label>
                                            <input type="text" name="designation" id="designation" class="form-control" readonly>
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
                        <button class="btn btn-dark ml-3 mb-3" id="generatePDF" style="font-size: 15px">
                                Generate PDF
                            </button>

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Leave Type</th>
                                            <th>Leave From</th>
                                            <th>Leave To</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="hr_leave_report_append">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<script>
    $(document).ready(function() {
        $('#hr').on('change', function() {
            // Get the selected option's data-id attribute value
            var selectedDesignation = $(this).find('option:selected').data('id');

            // Set the designation input field's value to the selected designation
            $('#designation').val(selectedDesignation);
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#hr_leave_report').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var hr = $('select[name="hr"]').val();
            var designation = $('input[name="designation"]').val();

            // Use AJAX to fetch data based on the selected filters
            $.ajax({
                url: '{{ route("get-hr-leave-report") }}', // Replace with your actual server-side endpoint URL
                method: 'GET',
                data: {
                    hr: hr,
                    designation: designation
                },
                success: function(response) {
                    // Assuming you have a <tbody> element with id="hr_leave_report_append" to display the data
                    var LeaveReportTable = $('#hr_leave_report_append');
                    // Clear existing rows
                    LeaveReportTable.empty();
                    // Append new rows based on the response
                    response.LeaveRequests.forEach(function(Leave, index) {
                        LeaveReportTable.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + Leave.Employee + '</td>' +
                            '<td>' + Leave.department + '</td>' +
                            '<td>' + Leave.designation + '</td>' +
                            '<td>' + Leave.leave_type + '</td>' +
                            '<td>' + Leave.leave_from_date + '</td>' +
                            '<td>' + Leave.leave_to_date + '</td>' +
                            '<td>' + Leave.leave_reason + '</td>' +
                            '<td>' + Leave.leave_approve + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>


<script>
    document.getElementById('generatePDF').addEventListener('click', function() {
        const { jsPDF } = window.jspdf; // Use jsPDF from the library
        const doc = new jsPDF();

        // Add a title
        doc.setFontSize(16);
        doc.text('Leave Report', 14, 20);

        // Define table columns and data
        const table = document.getElementById('example5');
        const headers = [];
        const body = [];

        // Get table headers
        const ths = table.querySelectorAll('thead tr th');
        ths.forEach((th) => headers.push(th.textContent.trim()));

        // Get table body rows
        const trs = table.querySelectorAll('tbody tr');
        trs.forEach((tr) => {
            const row = [];
            const tds = tr.querySelectorAll('td');
            tds.forEach((td) => row.push(td.textContent.trim()));
            body.push(row);
        });

        // Generate the table
        doc.autoTable({
            head: [headers],
            body: body,
            startY: 30,
        });

        // Save the PDF
        doc.save('HrLeave_Report.pdf');
    });
</script>
