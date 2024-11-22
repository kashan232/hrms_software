@include('hr_panel.include.header_include')
<div id="main-wrapper">
    @include('hr_panel.include.navbar_include')
    @include('hr_panel.include.sidebar_include')
    <div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span class="type"></span> <span>Application Status</span></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1rem; border:none;">
                                <i class="las la-times"></i>
                            </button>
                </div>
                <form action="{{ route('store-job-applications') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="application_id" id="application_id" readonly>
                            <br>
                            <label>Status</label>
                            <select name="application_status" id="application_status" class="form-control">
                                <option value="Approved">Approve</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea name="application_remarks" id="application_remarks" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
                            <h4 class="card-title">Job Applications </h4>
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
                                            <th>Status</th>
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
                                                <span class="btn btn-primary btn-sm">Recevied</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('view-applications', ['id' => $job_application->id]) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <form action="#" method="POST" class="update-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="application_id" value="{{ $job_application->id }}">
                                                    <button type="button" class="btn btn-primary addNewButton btn-sm" data-toggle="modal" data-target="#cuModal" onclick="setApplicationId('{{ $job_application->id }}')">
                                                    <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
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