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
    <div class="content-body ">
        <!-- row -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        @if (session()->has('error'))
                        <div class="alert alert-danger solid alert-square">
                            <strong>Opps!</strong> {{ session('error') }}.
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success solid alert-square">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('manager-updte-change-Password') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Old Password</label>
                                            <div class="input-group">
                                                <input type="password" name="old_password" class="form-control" required>
                                                <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">New Password</label>
                                            <div class="input-group">
                                                <input type="password" name="new_password" class="form-control" required>
                                                <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Retype New Password</label>
                                            <div class="input-group">
                                                <input type="password" name="retype_new_password" class="form-control" required>
                                                <button class="btn btn-outline-secondary" type="button" id="toggleRetypeNewPassword">
                                                    <i class="fas fa-eye-slash"></i>
                                                </button>
                                            </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('button[id^="toggle"]').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.querySelector('i').classList.remove('fa-eye-slash');
                    this.querySelector('i').classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    this.querySelector('i').classList.remove('fa-eye');
                    this.querySelector('i').classList.add('fa-eye-slash');
                }
            });
        });
    });
</script>