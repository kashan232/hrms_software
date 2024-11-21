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
@include('employee_panel.include.header_include')
<!-- Main wrapper start -->
<div id="main-wrapper">
    @include('employee_panel.include.navbar_include')
    @include('employee_panel.include.sidebar_include')
    <!-- Content body start -->
    <div class="content-body">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="profile-card">
                        <div class="avatar text-center">
                            @if($all_employee->emp_pic)
                            <img src="/employe_profile/{{ $all_employee->emp_pic }}" alt="Profile Picture" style="width: 100%; height:100%; border-radius: 50%;">
                            @else
                            <i class="fas fa-user-circle fa-9x"></i>
                            @endif
                        </div>
                        <div class="info">
                            <h3 class="text-center">{{ $all_employee->first_name }}</h3>
                            <p class="text-center text-muted">{{ $all_employee->designation }}</p>
                            <hr>
                            <p><strong>Email:</strong> {{ $all_employee->email }}</p>
                            <p><strong>Phone:</strong> {{ $all_employee->phone }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3 mb-3 profile-card">
                            <form action="{{ route('employee-profile-picture') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="profile-card">
                                    <div class="col-md-12 mt-3">
                                        <label>Profile Picture</label>
                                        <input type="file" name="profile_picture" class="form-control" required>
                                    </div>
                                    <button class="btn btn-success mt-2 mb-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="profile-card">
                        <div class="info" style="margin-left: 40px;">
                            <h3 class="text-center mb-4">Employee Details</h3>
                            <hr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>First Name:</strong></td>
                                        <td>{{ $all_employee->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Name:</strong></td>
                                        <td>{{ $all_employee->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td>{{ $all_employee->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Joining Date:</strong></td>
                                        <td>{{ $all_employee->joining_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone:</strong></td>
                                        <td>{{ $all_employee->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Department:</strong></td>
                                        <td>{{ $all_employee->department }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Designation:</strong></td>
                                        <td>{{ $all_employee->designation }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Username:</strong></td>
                                        <td>{{ $all_employee->username }}</td>
                                    </tr>
                                    <!-- Add more employee details here -->
                                </tbody>
                            </table>
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
@include('employee_panel.include.footer_include')