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
                            <h4 class="card-title">Resignations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Date | Last WorkDay</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($EmployeeResignations as $Resignation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $Resignation->employeeName }}</td>
                                            <td>{{ $Resignation->department }}</td>
                                            <td>{{ $Resignation->designation }}</td>
                                            <td>{{ $Resignation->resignationDate }} <br> {{ $Resignation->lastWorkingDay }}</td>
                                            <td>{{ $Resignation->resignationReason }}</td>
                                            <td>
                                                @if($Resignation->status == 'Approve')
                                                <button type="button" class="btn btn-success">
                                                    Approved
                                                </button>
                                                @elseif($Resignation->status == 'Reject')
                                                <button type="button" class="btn btn-danger">
                                                    Rejected
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-primary" onclick="updateResignationStatus({{ $Resignation->id }}, 'Approve')">
                                                    Approve
                                                </button>
                                                <button type="button" class="btn btn-danger" onclick="updateResignationStatus({{ $Resignation->id }}, 'Reject')">
                                                    Reject
                                                </button>
                                                @endif
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
    function updateResignationStatus(resignationId, status) {
        $.ajax({
            url: '/update-resignation-status', // Define the route in your web.php
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
                id: resignationId,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    // Update the status button to reflect the new status
                    location.reload(); // Reload the page to show the updated status
                } else {
                    alert('Something went wrong. Please try again.');
                }
            }
        });
    }
</script>