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

    <!--Create Modal -->
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="type"></span> <span>Application Status</span></h5>
            </div>
            <form action="{{ route('store-job-applications') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <input type="hidden" name="application_id" id="application_id" readonly>
                    <br>
                        <label>Status</label>
                        <select name="application_status" id="application_status" class="form-control">
                            <option value="Approve">Approve</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea name="application_remarks" id="application_remarks" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
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
                            <h4 class="card-title">Applications</h4>
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
                                            <th>Application Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approvedApplications as $job_application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($job_application->created_at)->format('Y-m-d') }}</td>
                                            <td>{{ $job_application->application_post }}</td>
                                            <td>{{ $job_application->first_name }}</td>
                                            <td>{{ $job_application->last_name }}</td>
                                            <td>
                                                <form action="#" method="POST" class="update-form">
                                                    @csrf
                                                    <input type="hidden" name="application_id" value="{{ $job_application->id }}">
                                                    <button type="button" class="btn btn-primary addNewButton btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationId('{{ $job_application->id }}')">
                                                        Update
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('view-applications', ['id' => $job_application->id]) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
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