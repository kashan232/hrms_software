@include('manager_panel.include.header_include')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    @include('manager_panel.include.navbar_include')


    @include('manager_panel.include.sidebar_include')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('revenue-added'))
                            <div class="alert alert-success solid alert-square">
                                <strong>Success!</strong> {{ session('revenue-added') }}.
                            </div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Add Revenue</h4>
                            <div>
                                <button id="addNewButton" type="button" class="btn btn-primary"
                                    data-modal_title="Add New designation">
                                    <a href="{{ route('all-revenue') }}" style="color: white;">
                                        All Revenue </a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-revenue') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Customer</label>
                                            <input type="text" name="Customer" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Tax</label>
                                            <input type="number" name="tax" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Total paid</label>
                                            <input type="number" name="total_paid" class="form-control">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control">
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

@include('manager_panel.include.footer_include')
<script>
    $(document).ready(function() {
        $('select[name="department"]').on('change', function() {
            var department = $(this).val();
            if (department) {
                $.ajax({
                    url: '{{ route('get-designations') }}',
                    type: 'GET',
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('select[name="designation"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="designation"]').append(
                                '<option value="' + value + '">' + value +
                                '</option>');
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
