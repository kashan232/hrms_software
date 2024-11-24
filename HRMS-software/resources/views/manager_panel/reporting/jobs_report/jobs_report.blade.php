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
    <div class="content-body">
        <div class="container">
            <div class="row">
                <!-- Jobs Report Form -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jobs Report</h4>
                        </div>
                        <div class="card-body">
                            <form id="jobs_report_manager" class="new-added-form" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="date_from">Date From</label>
                                        <input type="date" id="date_from" class="form-control" name="date_from">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="date_to">Date To</label>
                                        <input type="date" id="date_to" class="form-control" name="date_to">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Jobs Report Table -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button id="generatePdf" class="btn btn-dark ml-3 mb-3" style="font-size: 15px">Generate PDF</button>
                            <div class="table-responsive">
                                <table id="jobs_report_table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Designation</th>
                                            <th>Job Description</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>Experience</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jobs_report_append_manager"></tbody>
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
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('manager_panel.include.footer_include')

<!-- JS Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle Jobs Report Form Submission
        $('#jobs_report_manager').on('submit', function (e) {
            e.preventDefault();

            const date_from = $('#date_from').val();
            const date_to = $('#date_to').val();

            // AJAX Request to Fetch Data
            $.ajax({
                url: '{{ route("get-jobs-report") }}', // Update with the correct route
                method: 'GET',
                data: { date_from, date_to },
                success: function (response) {
                    const jobsReportTable = $('#jobs_report_append_manager');
                    jobsReportTable.empty(); // Clear existing rows

                    // Append rows dynamically based on response
                    response.jobs.forEach((job, index) => {
                        jobsReportTable.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${job.usertype}</td>
                                <td>${job.date}</td>
                                <td>${job.designation}</td>
                                <td>${job.job_description}</td>
                                <td>${job.education}</td>
                                <td>${job.skills}</td>
                                <td>${job.experience}</td>
                                <td>${job.status}</td>
                            </tr>
                        `);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        // Generate PDF
        $('#generatePdf').on('click', function () {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();

            // Title and Date Range
            pdf.setFontSize(16);
            pdf.text('Jobs Report', 105, 20, { align: 'center' });
            const dateFrom = $('#date_from').val() || 'Not Selected';
            const dateTo = $('#date_to').val() || 'Not Selected';
            pdf.setFontSize(12);
            pdf.text(`Date From: ${dateFrom}`, 14, 30);
            pdf.text(`Date To: ${dateTo}`, 14, 40);

            // Table Headers
            const headers = [["Sno#", "User", "Date", "Designation", "Job Description", "Education", "Skills", "Experience", "Status"]];
            const data = [];

            // Collect Data from Table
            $('#jobs_report_append_manager tr').each(function (index, row) {
                const rowData = [];
                $(row).find('td').each(function () {
                    rowData.push($(this).text());
                });
                data.push(rowData);
            });

            // Add Table to PDF
            pdf.autoTable({
                head: headers,
                body: data,
                startY: 50,
                margin: { left: 14, right: 14 },
            });

            // Save PDF
            pdf.save('Jobs_Report.pdf');
        });
    });
</script>
