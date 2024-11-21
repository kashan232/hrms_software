@include('hr_panel.include.header_include')
<div id="main-wrapper">

    @include('hr_panel.include.navbar_include')

    @include('hr_panel.include.sidebar_include')
    <div class="content-body">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Application Details</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <!-- Application Post -->
                                <tr>
                                    <th colspan="2" class="table-active bg-primary text-white">Application Post</th>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td>{{ $job_application->application_post }}</td>
                                </tr>

                                <!-- Personal Information -->
                                <tr>
                                    <th colspan="2" class="table-active bg-primary text-white">Personal Information</th>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $job_application->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $job_application->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $job_application->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $job_application->phone }}</td>
                                </tr>
                                <tr>
                                    <th>LinkedIn Profile</th>
                                    <td><a href="{{ $job_application->linkedin }}" target="_blank">{{ $job_application->linkedin }}</a></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $job_application->address }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $job_application->city }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $job_application->country }}</td>
                                </tr>

                                <!-- Education -->
                                <tr>
                                    <th colspan="2" class="table-active bg-primary text-white">Education</th>
                                </tr>
                                <tr>
                                    <th>Latest Degree</th>
                                    <td>{{ $job_application->degree }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $job_application->degree_start_date }}</td>
                                </tr>
                                <tr>
                                    <th>Institution</th>
                                    <td>{{ $job_application->institution }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $job_application->institution_city }}</td>
                                </tr>
                                <tr>
                                    <th>CGPA</th>
                                    <td>{{ $job_application->cgpa }}</td>
                                </tr>

                                <!-- Previous Experience -->
                                <tr>
                                    <th colspan="2" class="table-active bg-primary text-white">Previous Experience</th>
                                </tr>
                                <tr>
                                    <th>Latest Employer</th>
                                    <td>{{ $job_application->latest_employer }}</td>
                                </tr>
                                <tr>
                                    <th>Employee Business Industry</th>
                                    <td>{{ $job_application->business_industry }}</td>
                                </tr>
                                <tr>
                                    <th>Designation</th>
                                    <td>{{ $job_application->designation }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $job_application->experience_start_date }}</td>
                                </tr>
                                <tr>
                                    <th>Responsibilities</th>
                                    <td>{{ $job_application->responsibilities }}</td>
                                </tr>
                                <tr>
                                    <th>Skills</th>
                                    <td>{{ $job_application->skills }}</td>
                                </tr>
                                <tr>
                                    <th>Latest Salary</th>
                                    <td>{{ $job_application->latest_salary }}</td>
                                </tr>
                                <tr>
                                    <th>Expected Salary</th>
                                    <td>{{ $job_application->expected_salary }}</td>
                                </tr>
                            </table>
                            <div class="section">
                                <h3>Resume</h3>
                                <a href="/job_resume/{{ $job_application->resume }}" class="btn btn-primary" download>Download Resume</a>

                                <div class="info-group">
                                    @if(pathinfo($job_application->resume, PATHINFO_EXTENSION) === 'pdf')
                                    <!-- Display PDF files directly -->
                                    <iframe src="/job_resume/{{ $job_application->resume }}" style="width: 100%; height: 600px;" frameborder="0"></iframe>
                                    @elseif(pathinfo($job_application->resume, PATHINFO_EXTENSION) === 'docx')
                                    <!-- Display DOCX files via Google Docs Viewer -->
                                    <iframe src="https://docs.google.com/gview?url={{ asset('job_resume/' . $job_application->resume) }}&embedded=true" style="width: 100%; height: 600px;" frameborder="0"></iframe>
                                    @else
                                    <p>Resume format not supported for viewing.</p>
                                    @endif
                                </div>
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
    // JavaScript/jQuery code to trigger modal
    $(document).ready(function() {
        $('.addNewButton').click(function() {
            $('#cuModal').modal('show');
        });
    });
</script>

<script>
    function setApplicationId(id) {
        document.getElementById('application_id').value = id;
    }
</script>