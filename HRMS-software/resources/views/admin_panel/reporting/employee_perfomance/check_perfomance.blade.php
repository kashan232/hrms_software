@include('admin_panel.include.header_include')
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('admin_panel.include.navbar_include')


    @include('admin_panel.include.sidebar_include')
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
                            <h4 class="card-title">Track Employee Performance Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form class="new-added-form" method="GET" action="{{ route('get-report-employee-performance') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label>Department</label>
                                            <select name="department" id="department" class="form-control" required>
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($Departments as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Designation</label>
                                            <select name="designation" id="designation" class="form-control" required>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label>Employee</label>
                                            <select name="employee" id="single-select" required>
                                                <option value="" selected disabled>Select Employee</option>
                                            </select>
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
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')

<script src="https://jobie.dexignzone.com/laravel/demo/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="https://jobie.dexignzone.com/laravel/demo/js/plugins-init/select2-init.js" type="text/javascript"></script>

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

        // Handle designation change
        $('select[name="designation"]').on('change', function() {
            var designation = $(this).val();
            var department = $('select[name="department"]').val(); // Get the department value
            // alert(department);
            if (designation && department) {
                $.ajax({
                    url: '{{ route("get-employees") }}',
                    type: 'GET',
                    data: {
                        designation: designation,
                        department: department
                    }, // Send both designation and department
                    success: function(data) {
                        $('select[name="employee"]').empty().append('<option value="" selected disabled>Select Employee</option>');
                        $.each(data, function(key, value) {
                            $('select[name="employee"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="employee"]').empty();
            }
        });

    });
</script>