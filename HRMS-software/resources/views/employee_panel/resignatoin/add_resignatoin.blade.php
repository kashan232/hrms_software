@include('employee_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('employee_panel.include.navbar_include')


    @include('employee_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('resignation-added'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('resignation-added') }}.
                        </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Resignation Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-resignation-create') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="employeeName">Employee Name</label>
                                            <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter your name" value="{{ $Employee->first_name. ' ' .$Employee->last_name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" id="department" name="department" placeholder="Enter your department" value="{{ $Employee->department }}"  readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your Designation" value="{{ $Employee->designation }}"  readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="resignationDate">Date of Resignation</label>
                                            <input type="date" class="form-control" id="resignationDate" name="resignationDate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastWorkingDay">Last Working Day</label>
                                            <input type="date" class="form-control" id="lastWorkingDay" name="lastWorkingDay" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="resignationReason">Reason for Resignation</label>
                                            <textarea class="form-control" id="resignationReason" name="resignationReason" rows="3" placeholder="Enter the reason for resignation" required></textarea>
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

@include('employee_panel.include.footer_include')
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
</script>