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
                            <h4 class="card-title">Final Interview Applications</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Date</th>
                                            <th>Job</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Hired</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($interviewApplications as $interviewApplication)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($interviewApplication->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $interviewApplication->application_post }}</td>
                                            <td>{{ $interviewApplication->first_name }}</td>
                                            <td>{{ $interviewApplication->last_name }}</td>
                                            <td>{{ $interviewApplication->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success addNewButton btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationId('{{ $interviewApplication->id }}')">
                                                    Intervied
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('view-applications', ['id' => $interviewApplication->id]) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Checkbox for marking as hired -->
<input type="checkbox" class="mark-as-hired-checkbox" data-application-id="{{ $interviewApplication->id }}">

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

@include('hr_panel.include.footer_include')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to all checkboxes with the class `mark-as-hired-checkbox`
        document.querySelectorAll('.mark-as-hired-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const applicationId = this.getAttribute('data-application-id');
                const isChecked = this.checked;

                // Make AJAX call to update the status
                fetch(`/update-interview-status/${applicationId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    body: JSON.stringify({
                        hired: isChecked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Interview status updated successfully.');
                        // Optionally, you can add visual feedback here
                    } else {
                        console.error('Failed to update interview status.');
                    }
                })
                .catch(error => {
                    console.error('Error updating interview status:', error);
                });
            });
        });
    });
</script>
