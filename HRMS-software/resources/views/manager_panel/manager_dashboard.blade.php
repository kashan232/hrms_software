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
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('project-listing-to-manager') }}">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.25 5.75H28.5V2.25C28.5 1.78587 28.3156 1.34075 27.9874 1.01256C27.6593 0.684374 27.2141 0.5 26.75 0.5C26.2859 0.5 25.8407 0.684374 25.5126 1.01256C25.1844 1.34075 25 1.78587 25 2.25V5.75H11V2.25C11 1.78587 10.8156 1.34075 10.4874 1.01256C10.1592 0.684374 9.71413 0.5 9.25 0.5C8.78587 0.5 8.34075 0.684374 8.01256 1.01256C7.68437 1.34075 7.5 1.78587 7.5 2.25V5.75H5.75C4.35761 5.75 3.02226 6.30312 2.03769 7.28769C1.05312 8.27226 0.5 9.60761 0.5 11V12.75H35.5V11C35.5 9.60761 34.9469 8.27226 33.9623 7.28769C32.9777 6.30312 31.6424 5.75 30.25 5.75Z" fill="white" />
                                            <path d="M0.5 30.25C0.5 31.6424 1.05312 32.9777 2.03769 33.9623C3.02226 34.9469 4.35761 35.5 5.75 35.5H30.25C31.6424 35.5 32.9777 34.9469 33.9623 33.9623C34.9469 32.9777 35.5 31.6424 35.5 30.25V16.25H0.5V30.25Z" fill="white" />
                                        </svg>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Projects</p>
                                        <span class="fs-48 text-white font-w600">{{ $all_project }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('manager-task') }}">
                        <div class="card bg-info overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z" fill="white" />
                                            <path d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5756 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z" fill="white" />
                                            <path d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z" fill="white" />
                                        </svg>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Task</p>
                                        <span class="fs-48 text-white font-w600">{{ $taskCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="{{ route('manager-all-expense') }}">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1811 22.0083C15.065 21.9063 14.7968 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4868 0.0410156 21.001 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9384 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.554 24.0553 28.5232 24.3626C35.7277 26.641 40.9507 32.0853 41.8276 38.538C41.9483 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50672 41.9591 3.14818 41.9591C2.2787 41.9591 1.4518 41.5824 0.881242 40.9263C0.31068 40.2701 0.0523763 39.3989 0.172318 38.5437C1.05145 32.0851 6.27444 26.641 13.4777 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1811 22.0083Z" fill="white" />
                                        </svg>

                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Expense</p>
                                        <span class="fs-48 text-white font-w600">{{ $expenseCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- // new cards --}}
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="#">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.25 5.75H28.5V2.25C28.5 1.78587 28.3156 1.34075 27.9874 1.01256C27.6593 0.684374 27.2141 0.5 26.75 0.5C26.2859 0.5 25.8407 0.684374 25.5126 1.01256C25.1844 1.34075 25 1.78587 25 2.25V5.75H11V2.25C11 1.78587 10.8156 1.34075 10.4874 1.01256C10.1592 0.684374 9.71413 0.5 9.25 0.5C8.78587 0.5 8.34075 0.684374 8.01256 1.01256C7.68437 1.34075 7.5 1.78587 7.5 2.25V5.75H5.75C4.35761 5.75 3.02226 6.30312 2.03769 7.28769C1.05312 8.27226 0.5 9.60761 0.5 11V12.75H35.5V11C35.5 9.60761 34.9469 8.27226 33.9623 7.28769C32.9777 6.30312 31.6424 5.75 30.25 5.75Z" fill="white" />
                                            <path d="M0.5 30.25C0.5 31.6424 1.05312 32.9777 2.03769 33.9623C3.02226 34.9469 4.35761 35.5 5.75 35.5H30.25C31.6424 35.5 32.9777 34.9469 33.9623 33.9623C34.9469 32.9777 35.5 31.6424 35.5 30.25V16.25H0.5V30.25Z" fill="white" />
                                        </svg>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Revenue</p>
                                        <span class="fs-48 text-white font-w600">{{ $revenueCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                    <a href="#">
                        <div class="card bg-info overflow-hidden">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z" fill="white" />
                                            <path d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5756 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z" fill="white" />
                                            <path d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z" fill="white" />
                                        </svg>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Employee</p>
                                        <span class="fs-48 text-white font-w600">{{ $employee }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xxl-4 col-sm-6">
                    <a href="#">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="p-2 me-3 feature-icon rounded">
                                        <svg width="36" height="36" viewBox="0 0 42 42" fill="none" xmlns="">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1811 22.0083C15.065 21.9063 14.7968 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4868 0.0410156 21.001 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9384 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.554 24.0553 28.5232 24.3626C35.7277 26.641 40.9507 32.0853 41.8276 38.538C41.9483 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50672 41.9591 3.14818 41.9591C2.2787 41.9591 1.4518 41.5824 0.881242 40.9263C0.31068 40.2701 0.0523763 39.3989 0.172318 38.5437C1.05145 32.0851 6.27444 26.641 13.4777 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1811 22.0083Z" fill="white" />
                                        </svg>
                                    </span>
                                    <div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">Remote Employee</p>
                                        <span class="fs-48 text-white font-w600">{{ $remoteEmployeeCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card d-flex flex-xl-column flex-sm-column flex-md-row flex-column">
                                <div class="card-body text-center profile-bx">
                                    <div class="profile-image mb-4">
                                        <img src="images/avatar/1.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <h4 class="fs-22 text-black mb-1">Oda Dink</h4>
                                    <p class="mb-4">Programmer</p>
                                    <div class="row">
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut"
                                                    data-peity='{ "fill": ["rgb(255, 142, 38)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                                                <small class="text-black">66%</small>
                                            </div>
                                            <span class="d-block">PHP</span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut"
                                                    data-peity='{ "fill": ["rgb(62, 168, 52)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/9</span>
                                                <small class="text-black">31%</small>
                                            </div>
                                            <span class="d-block">Vue</span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <div class="d-inline-block mb-2 relative donut-chart-sale">
                                                <span class="donut"
                                                    data-peity='{ "fill": ["rgb(34, 172, 147)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/9</span>
                                                <small class="text-black">7%</small>
                                            </div>
                                            <span class="d-block">Laravel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0 flex-wrap">
                                    <h4 class="fs-20 text-black me-4 mb-2">Vacancy Stats</h4>
                                    <div class="form-check custom-checkbox mb-3">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox1"
                                            required>
                                        <label class="form-check-label" for="customCheckBox1">Application Sent</label>
                                    </div>
                                    <div class="form-check custom-checkbox mb-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck1" required>
                                        <label class="form-check-label" for="customCheck1">Interviews</label>
                                    </div>
                                    <div class="form-check custom-checkbox mb-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck2" required>
                                        <label class="form-check-label" for="customCheck2">Rejected</label>
                                    </div>
                                    <select class="form-control style-1 default-select mt-3 mt-sm-0">
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Daily</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart" class="Vacancy-chart"></canvas>
                                    <div class="d-flex flex-wrap align-items-center justify-content-center mt-3">
                                        <div class="fs-14 text-black me-4">
                                            <svg class="me-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" rx="9.5" fill="#4E36E2" />
                                            </svg>
                                            Application Sent
                                        </div>
                                        <div class="fs-14 text-black me-4">
                                            <svg class="me-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" rx="9.5" fill="#1BD084" />
                                            </svg>
                                            Interviews
                                        </div>
                                        <div class="fs-14 text-black">
                                            <svg class="me-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" rx="9.5" fill="#FF424D" />
                                            </svg>
                                            Rejected
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">AK Technologies</a>
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