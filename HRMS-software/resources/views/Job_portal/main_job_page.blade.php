@include('Job_portal.layouts.head_include')
<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="/job_portal_assets/assets/img/hero/h2_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                            <div class="hero__caption">
                                <h1>Find the most exciting startup jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach($Departments as $Department)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="{{ route('job-listing', ['id' => $Department->id]) }}">{{ $Department->department }}</a></h5>
                            <span>{{ $Department->job_boards_count }} Jobs Available</span>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="#" class="border-btn2">Browse All Sectors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Online CV Area Start -->
    <div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="/job_portal_assets/assets/img/gallery/cv_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera1">FEATURED TOURS Packages</p>
                        <p class="pera2"> Make a Difference with Your Online Resume!</p>
                        <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Recent Job</span>
                        <h2>Featured Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="/job_portal_assets/assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="/job_portal_assets/assets/img/icon/job-list2.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="/job_portal_assets/assets/img/icon/job-list3.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.html"><img src="/job_portal_assets/assets/img/icon/job-list4.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150" data-background="/job_portal_assets/assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Search a job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Apply for job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Get your job</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
</main>
<footer>
    <!-- Footer Start-->
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-12 col-lg-12 ">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">HRMS</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

@include('Job_portal.layouts.footer_include')