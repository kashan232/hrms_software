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
                            <h4 class="card-title">Jobs Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="jobs_report_hr" class="new-added-form" method="GET">
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
                                    <tbody id="jobs_report_append_hr">

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

@include('hr_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('#jobs_report_hr').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var date_from = $('input[name="date_from"]').val();
            var date_to = $('input[name="date_to"]').val();

            // Use AJAX to fetch data based on the selected date range
            $.ajax({
                url: '{{ route("get-jobs-report") }}', // Replace with your actual server-side endpoint URL
                method: 'GET',
                data: {
                    date_from: date_from,
                    date_to: date_to
                },
                success: function(response) {
                    // Assuming you have a <tbody> element with id="jobs_report_append_hr" to display the data
                    var jobsReportTable = $('#jobs_report_append_hr');

                    // Clear existing rows
                    jobsReportTable.empty();

                    // Append new rows based on the response
                    response.jobs.forEach(function(job, index) { // Changed 'jobss' to 'jobs'
                        jobsReportTable.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + job.usertype + '</td>' +
                            '<td>' + job.date + '</td>' +
                            '<td>' + job.designation + '</td>' +
                            '<td>' + job.job_description + '</td>' +
                            '<td>' + job.education + '</td>' +
                            '<td>' + job.skills + '</td>' +
                            '<td>' + job.experience + '</td>' +
                            '<td>' + job.status + '</td>' +
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
