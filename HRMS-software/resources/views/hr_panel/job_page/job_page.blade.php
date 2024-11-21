@include('hr_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                        @if (session()->has('hiring-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('hiring-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Create Job Board</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary" data-modal_title="Add New designation">
                                    <a href="{{ route('all-hiring') }}" style="color: white;">
                                        All Jobs </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-job-page') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Department</label>
                                            <input type="hidden" name="if_of_job" value="{{ $JobBoard->id }}" readonly>
                                            <input type="text" name="department" id="department" class="form-control" value="{{ $JobBoard->department }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Designation</label>
                                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $JobBoard->department }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Job Title</label>
                                            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ $JobBoard->job_title }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Required Skills</label>
                                            <textarea class="form-control" name="required_skills" id="requiredSkills" rows="3">{{ $JobBoardDetail->required_skills ?? '' }}</textarea>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Educational Requirement</label>
                                            <textarea class="form-control" name="educational_requirement" id="educational_requirement" rows="3" placeholder="Enter required skills">{{ $JobBoardDetail->educational_requirement ?? '' }}</textarea>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Job Description</label>
                                            <textarea class="form-control" name="job_description" id="job_description" rows="3" placeholder="Enter required skills">{{ $JobBoardDetail->job_description ?? '' }}</textarea>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="jobType">Job Type</label>
                                            <select class="form-control" name="job_type" id="jobType">
                                                <option value="permanent" {{ ($JobBoardDetail->job_type ?? '') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                                <option value="contract" {{ ($JobBoardDetail->job_type ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
                                                <option value="intern" {{ ($JobBoardDetail->job_type ?? '') == 'intern' ? 'selected' : '' }}>Intern</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="jobPosition">Job Position</label>
                                            <select class="form-control" name="job_position" id="jobPosition">
                                                <option value="onsite" {{ ($JobBoardDetail->job_position ?? '') == 'onsite' ? 'selected' : '' }}>Onsite</option>
                                                <option value="hybrid" {{ ($JobBoardDetail->job_position ?? '') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                                <option value="remote" {{ ($JobBoardDetail->job_position ?? '') == 'remote' ? 'selected' : '' }}>Remote</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" placeholder="Enter location" value="{{ $JobBoardDetail->location ?? '' }}">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="importantNotes">Important Notes</label>
                                            <textarea class="form-control" name="important_notes" id="importantNotes" rows="3" placeholder="Enter important notes">{{ $JobBoardDetail->important_notes ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

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
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">AK
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
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route("get-designations") }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
            }
        });
    });
</script>