@include('Job_portal.layouts.head_include')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="/job_portal_assets/assets/img/hero/h3_about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>39, 782 Jobs found</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            @foreach($JobBoards as $JobBoard)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#" class="company-img-card">
                                            <h1 style="width: 100px; text-align: center; padding: 20px 0; border: 2px solid #1f2b7bcc;">
                                                {{ $loop->iteration }}
                                            </h1>
                                        </a>
                                    </div>
                                    <div class="job-tittle job-tittle2 pl-3">
                                        <a href="#">
                                            <h4>{{ $JobBoard->job_title }}</h4>
                                        </a>
                                        <ul>
                                            <li>{{ $JobBoard->department }}</li>
                                            <li>{{ $JobBoard->designation }}</li>
                                            <li>
                                                <span class="text-danger font-weight-bold">Last Date: </span>{{ $JobBoard->closing_date }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="{{ route('job-details', ['id' => $JobBoard->id]) }}">Apply Now</a>
                                    <span class="font-weight-bold">Vacancies: {{ $JobBoard->vacancies }}</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
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