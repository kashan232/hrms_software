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

        <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('update-hiring') }}" method="post">
        @csrf
        @method('PUT') <!-- Use PUT for update -->
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Hiring</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="job_id" id="job_id"> <!-- Hidden field for job ID -->

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="edit_date">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" id="edit_designation">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Job Description</label>
                    <input type="text" name="job_description" class="form-control" id="edit_job_description">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Education</label>
                    <input type="text" name="education" class="form-control" id="edit_education">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Skills</label>
                    <input type="text" name="skills" class="form-control" id="edit_skills">
                </div>
                <div class="mb-3 col-md-6">
                    <label>Experience</label>
                    <input type="text" name="experience" class="form-control" id="edit_experience">
                </div>
                <div class="mb-3 col-md-6">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" id="edit_status">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                            <h4 class="card-title">All Jobs</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('add-hiring') }}" style="color: white;">
                                        <i class="las la-plus"></i>Add New </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session()->has('delete-message'))
                            <div class="alert alert-danger solid alert-square">
                                <strong>Success!</strong> {{ session('delete-message') }}.
                            </div>
                            @endif

                            {{-- <div class="alert alert-dark solid alert-square"><strong>Error!</strong>
                                 You successfully read this important alert message.</div> --}}

                            <div class="table-responsive">
                                <table id="example5" class="display table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>Sno#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Designation</th>
                                            <th>Job description</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>Experience</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_hiring as $hiring)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hiring->usertype }}</td>
                                            <td>{{ $hiring->date }}</td>
                                            <td>{{ $hiring->designation }}</td>
                                            <td>{{ $hiring->job_description }}</td>
                                            <td>{{ $hiring->education }}</td>
                                            <td>{{ $hiring->skills }}</td>
                                            <td>{{ $hiring->experience }}</td>
                                            <td>{{ $hiring->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-id="{{ $hiring->id }}"
                                                    data-date="{{ $hiring->date }}"
                                                    data-designation="{{ $hiring->designation }}"
                                                    data-job_description="{{ $hiring->job_description }}"
                                                    data-education="{{ $hiring->education }}"
                                                    data-skills="{{ $hiring->skills }}"
                                                    data-experience="{{ $hiring->experience }}"
                                                    data-status="{{ $hiring->status }}">
                                                    <i class="la la-pencil"></i>
                                                </button>
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
    $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id');
    var date = button.data('date');
    var designation = button.data('designation');
    var job_description = button.data('job_description');
    var education = button.data('education');
    var skills = button.data('skills');
    var experience = button.data('experience');
    var status = button.data('status');

    var modal = $(this);
    modal.find('#job_id').val(id);
    modal.find('#edit_date').val(date);
    modal.find('#edit_designation').val(designation);
    modal.find('#edit_job_description').val(job_description);
    modal.find('#edit_education').val(education);
    modal.find('#edit_skills').val(skills);
    modal.find('#edit_experience').val(experience);
    modal.find('#edit_status').val(status);
});

</script>