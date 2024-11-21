@include('Job_portal.layouts.head_include')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="/job_portal_assets/assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Job Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $jobBoard->job_title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $jobBoard->department }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $jobDetails->location }}</li>
                                    <li>Vacancies: {{ $jobBoard->vacancies }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{ $jobDetails->job_description }}</p>
                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <ul>
                                @foreach(explode("\n", $jobDetails->required_skills) as $skill)
                                <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                            <ul>
                                @foreach(explode("\n", $jobDetails->educational_requirement) as $requirement)
                                <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="post-details2 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Important Notes</h4>
                            </div>
                            <ul>
                                @foreach(explode("\n", $jobDetails->important_notes) as $notes)
                                <li>{{ $notes }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date: <span>{{ $jobBoard->created_at->format('d M Y') }}</span></li>
                            <li>Location: <span>{{ $jobDetails->location }}</span></li>
                            <li>Vacancy: <span>{{ $jobBoard->vacancies }}</span></li>
                            <li>Job nature: <span>{{ $jobDetails->job_type }}</span></li>
                            <li>Last date: <span>{{ $jobBoard->closing_date }}</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="{{ route('apply-job', ['id' => $jobBoard->id]) }}" class="btn">Apply Now</a>
                        </div>

                        <!-- Share Job Link Section -->
                        <div class="share-job-link mt-4 position-relative">
                            <label for="job-link" class="font-weight-bold text-primary">Share Job Link:</label>
                            <div class="input-group">
                                <input type="text" id="job-link" class="form-control bg-light border-secondary pr-5" value="{{ url()->current() }}" readonly>
                                <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="copyJobLink()">
                                    <i class="fas fa-copy text-secondary"></i>
                                </span>
                            </div>
                            <small id="copy-message" class="form-text text-success mt-1" style="display: none;">Link copied successfully!</small>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>
<footer>
    <!-- Footer Start-->
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="footer-copy-right">
                            <p>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">HRMS</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
@include('Job_portal.layouts.footer_include')
<!-- Script to Copy Link -->
<script>
    function copyJobLink() {
        var copyText = document.getElementById("job-link");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the input field
        document.execCommand("copy");

        // Display confirmation message
        var copyMessage = document.getElementById("copy-message");
        copyMessage.style.display = "block";

        // Hide the confirmation message after a few seconds
        setTimeout(function() {
            copyMessage.style.display = "none";
        }, 2000);
    }
</script>