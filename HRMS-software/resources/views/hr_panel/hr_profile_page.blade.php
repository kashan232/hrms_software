<style>
    body {
        background-color: #f8f9fa;
    }
    .profile-card {
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }
    .profile-card .avatar {
        width: 150px;
        height: 150px;
        margin: auto;
        margin-top: 20px;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .profile-card .avatar i {
        font-size: 80px;
        color: #007bff;
        margin-top: 35px;
    }
    .profile-card .info {
        padding: 20px;
    }
    .profile-card .info p {
        margin-bottom: 10px;
    }
</style>
@include('hr_panel.include.header_include')
<!-- Main wrapper start -->
<div id="main-wrapper">
    @include('hr_panel.include.navbar_include')
    @include('hr_panel.include.sidebar_include')
    <!-- Content body start -->
    <div class="content-body">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="avatar text-center">
                            <i class="fas fa-user-circle fa-9x"></i>
                        </div>
                        <div class="info">
                            <h3 class="text-center">{{ $all_hr->first_name }}</h3>
                            <p class="text-center text-muted">{{ $all_hr->designation }}</p>
                            <hr>
                            <p><strong>Email:</strong> {{ $all_hr->email }}</p>
                            <p><strong>Phone:</strong> {{ $all_hr->phone }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-card">
                        <div class="info" style="margin-left: 40px;">
                            <h3 class="text-center mb-4">HR Details</h3>
                            <hr>
                            <p><strong>First Name:</strong> <span style="margin-left: 40px;">{{ $all_hr->first_name }}</span></p>
                            <p><strong>Last Name:</strong> <span style="margin-left: 40px;">{{ $all_hr->last_name }}</span></p>
                            <p><strong>Email:</strong> <span style="margin-left: 40px;">{{ $all_hr->email }}</span></p>
                            <p><strong>Phone:</strong> <span style="margin-left: 40px;">{{ $all_hr->phone }}</span></p>
                            <p><strong>Designation:</strong> <span style="margin-left: 40px;">{{ $all_hr->designation }}</span></p>
                            <p><strong>Username:</strong> <span style="margin-left: 40px;">{{ $all_hr->user_name }}</span></p>
                            <!-- Add more employee details here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content body end -->
    <!-- Footer start -->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK Technologies</a> 2024</p>
        </div>
    </div>
    <!-- Footer end -->
</div>
<!-- Main wrapper end -->
@include('hr_panel.include.footer_include')
