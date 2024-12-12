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
                        @if (session()->has('manager-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('manager-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Create Offer Letter</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-hr-offer-letter') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="candidateName">Candidate Name</label>
                                            <select id="candidateName" class="form-control" name="candidateName" onchange="syncInputWithSelect()">
                                                <option value="">Select Candidate</option>
                                                @foreach ($hiredCandidates as $candidate)
                                                <option value="{{ $candidate->first_name }} {{ $candidate->last_name }}">{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control mt-2" id="candidateNameInput" name="candidateNameInput" placeholder="Or type candidate's name" oninput="clearSelect()">
                                        </div>
                                        <div class="form-group">
                                            <label for="jobTitle">Job Title</label>
                                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_department as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <select name="designation" id="designation" class="form-control"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="startDate">Start Date</label>
                                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobDescription">Job Description</label>
                                            <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" placeholder="Enter job description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="additionalNotes">Additional Notes</label>
                                            <textarea class="form-control" id="additionalNotes" name="additionalNotes" rows="3" placeholder="Enter any additional notes"></textarea>
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
                        $('select[name="designation"]').append('<option value="">None</option>'); // Add "None" option
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation"]').empty();
                $('select[name="designation"]').append('<option value="">None</option>'); // Add "None" option when no department is selected
            }
        });
    });
</script>
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = "password";
            document.getElementById("togglePassword").innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    });

    function syncInputWithSelect() {
        const selectElement = document.getElementById('candidateName');
        const inputElement = document.getElementById('candidateNameInput');

        if (selectElement.value) {
            inputElement.value = selectElement.value;
        }
    }

    function clearSelect() {
        const selectElement = document.getElementById('candidateName');
        const inputElement = document.getElementById('candidateNameInput');

        if (inputElement.value.trim()) {
            selectElement.value = "";
        }
    }
</script>