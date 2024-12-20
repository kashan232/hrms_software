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
                        <div class="card-header">
                            <h4 class="card-title">Task Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form id="task_report_hr" class="new-added-form" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Projects</label>
                                            <select name="project_name" id="project_name" class="form-control">
                                                @foreach($Projects as $Project)
                                                    <option value="{{ $Project->project_name }}">{{ $Project->project_name }}</option>
                                                @endforeach
                                            </select>
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
    <button id="generateTaskPdf" class="btn btn-dark ml-3 mb-3" style="font-size: 15px">Generate PDF</button>
    <div class="table-responsive">
        <table id="example5" class="display table-responsive-lg">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Project Name</th>
                    <th>Task Category</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Emp Department</th>
                    <th>Emp Designation</th>
                    <th>Task Assign Person</th>
                    <th>Task Priority</th>
                    <th>Description</th>
                    <th>Completion Status</th>
                </tr>
            </thead>
            <tbody id="task_report_append_hr">
            </tbody>
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

@include('manager_panel.include.footer_include')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>

<script>
    $(document).ready(function() {
        $('#generateTaskPdf').on('click', function() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();

            // Title and Project Name
            pdf.setFontSize(16);
            pdf.text('Task Report', 105, 20, { align: 'center' });

            const projectName = $('#project_name').val() || 'All Projects';
            pdf.setFontSize(12);
            pdf.text(`Project: ${projectName}`, 14, 30);

            // Table Headers
            const headers = [
                ["Sno", "Project Name", "Task Category", "Start Date", "End Date", "Emp Department", 
                 "Emp Designation", "Task Assign Person", "Task Priority", "Description", "Completion Status"]
            ];

            const data = [];

            // Collect Data from Table
            $('#task_report_append_hr tr').each(function(index, row) {
                const rowData = [];
                $(row).find('td').each(function() {
                    rowData.push($(this).text());
                });
                data.push(rowData);
            });

            // Generate Table in PDF
            pdf.autoTable({
                head: headers,
                body: data,
                startY: 40,
                margin: { left: 14, right: 14 },
            });

            // Save the PDF
            pdf.save('Task_Report.pdf');
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#task_report_hr').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var project_name = $('#project_name').val(); // Corrected selector

            // Use AJAX to fetch data based on the selected project
            $.ajax({
                url: '{{ route("get-task-report-manager") }}', // Replace with your actual server-side endpoint URL
                method: 'GET',
                data: {
                    project_name: project_name,
                },
                success: function(response) {
                    // Assuming you have a <tbody> element with id="task_report_append_hr" to display the data
                    var tasksReportTable = $('#task_report_append_hr');

                    // Clear existing rows
                    tasksReportTable.empty();

                    // Append new rows based on the response
                    response.tasks.forEach(function(task, index) {
                        tasksReportTable.append(
                            '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + task.project_name + '</td>' +
                            '<td>' + task.task_category + '</td>' +
                            '<td>' + task.start_date + '</td>' +
                            '<td>' + task.end_date + '</td>' +
                            '<td>' + task.department + '</td>' +
                            '<td>' + task.designation + '</td>' +
                            '<td>' + task.task_assign_person + '</td>' +
                            '<td>' + task.task_priority + '</td>' +
                            '<td>' + task.description + '</td>' +
                            '<td>' + task.status + '</td>' +
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

