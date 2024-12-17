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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('update-hiring') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Hiring</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" id="edit_date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" id="edit_designation" name="designation" required>
                        </div>
                        <div class="form-group">
                            <label>Job Description</label>
                            <textarea class="form-control" id="edit_job_description" name="job_description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Education</label>
                            <input type="text" class="form-control" id="edit_education" name="education" required>
                        </div>
                        <div class="form-group">
                            <label>Skills</label>
                            <input type="text" class="form-control" id="edit_skills" name="skills" required>
                        </div>
                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" class="form-control" id="edit_experience" name="experience" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="Onsite">Onsite</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
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
                                    <a href="{{ route('manager-add-hiring') }}" style="color: white;">
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
                                            <th>Date</th>
                                            <th>Designation</th>
                                            <th>Job Description</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>Experience</th>
                                            <th>Status</th>
                                            <th>Hired By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_hiring as $hiring)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hiring->date }}</td>
                                            <td>{{ $hiring->designation }}</td>
                                            <td>{{ $hiring->job_description }}</td>
                                            <td>{{ $hiring->education }}</td>
                                            <td>{{ $hiring->skills }}</td>
                                            <td>{{ $hiring->experience }}</td>
                                            <td>{{ $hiring->status }}</td>
                                            <td>{{ $hiring->usertype }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <button class="btn btn-primary btn-sm d-flex align-items-center editBtn"
                                                        data-id="{{ $hiring->id }}"
                                                        data-date="{{ $hiring->date }}"
                                                        data-designation="{{ $hiring->designation }}"
                                                        data-job_description="{{ $hiring->job_description }}"
                                                        data-education="{{ $hiring->education }}"
                                                        data-skills="{{ $hiring->skills }}"
                                                        data-experience="{{ $hiring->experience }}"
                                                        data-status="{{ $hiring->status }}"
                                                        data-usertype="{{ $hiring->usertype }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal">
                                                        <i class="la la-pencil"></i>
                                                    </button>

                                                    <form id="deleteForm-{{ $hiring->id }}" action="{{ route('delete-hiring', ['id' => $hiring->id]) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <!-- To simulate a DELETE request -->

                                                        <button type="button" class="btn btn-danger btn-sm d-flex align-items-center" title="Delete hiring" onclick="confirmDelete({{ $hiring->id }})">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                    </form>
                                                    
                                                </div>

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
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('manager_panel.include.footer_include')
<script>
    $('.editBtn').on('click', function() {
        $('#edit_id').val($(this).data('id'));
        $('#edit_date').val($(this).data('date'));
        $('#edit_designation').val($(this).data('designation'));
        $('#edit_job_description').val($(this).data('job_description'));
        $('#edit_education').val($(this).data('education'));
        $('#edit_skills').val($(this).data('skills'));
        $('#edit_experience').val($(this).data('experience'));
        $('#edit_status').val($(this).data('status'));
    });

    function confirmDelete(hiringID) {
        const confirmation = confirm("Are you sure you want to delete this hiring?");

        if (confirmation) {
            document.getElementById('deleteForm-' + hiringID).submit();
        }
    }

</script>