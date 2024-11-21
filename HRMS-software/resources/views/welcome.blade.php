<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <meta name="description" content="Marshall - Ultimate Coming Soon Template by pixiefy">
    <meta name="author" content="pixiefy">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="welcome_page/../../../../../fonts.googleapis.com/css8034.css?family=Open+Sans:300,400,800%7CWork+Sans:500,900" rel="stylesheet">
    <!-- All CSS -->
    <link rel="stylesheet" type="text/css" href="welcome_page/css/normalize.css" />
    <link rel="stylesheet" href="welcome_page/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="welcome_page/css/animate.css">
    <link rel="stylesheet" href="welcome_page/css/style.css" />
    <link rel="stylesheet" href="welcome_page/style.css">
    <link rel="stylesheet" href="welcome_page/css/responsive.css">
    <script src="welcome_page/js/modernizr.custom.js"></script>

</head>

<body id="mrs-bg-header" class="mrs-v28">

    <!-- Page Loader Start -->
    <div class="marshall-loading-screen">
        <div class="marshall-loading-icon">
            <div class="marshall-loading-inner">
                <div class="marshall-load" data-name=""></div>
            </div>
        </div>
    </div><!-- End .loading-screen -->

    <canvas id="mrs-star-canvas" class="mrs-canvas"></canvas>
    <div class="marshall-container">
        <div class="marshall-col-6 marshall-middle-6 marshall-col-content">
            <div class="marshall-logo fadeIn fast">
                <img src="welcome_page/images/hrms_white.png" style="max-width: 200px!important;" alt="Marshall Logo">
            </div>
            <div class="marshall-content jquery-center">
                <p class="short_description">We're working in our new website, stay tuned!</p>
                <h1 class="fadeIn medium fat_title">Coming Soon</h1>
                <div class="marshall-button-group fadeIn slow">
                    @if (Route::has('login'))
                    @auth
                        <div class="morph-button morph-button-modal morph-button-modal-2 marshall-morph-modal morph-button-fixed">
                            <button type="button"><a href="{{ url('/home') }}" >Dashboard</a></button>
                        </div>
                    @else
                        <div class="morph-button morph-button-modal morph-button-modal-2 marshall-morph-modal morph-button-fixed">
                            <button type="button"><a href="{{ route('login') }}">Login</a></button>
                        </div>
                    @endauth
                    @endif

                </div>
            </div>
        </div>
        <div class="footer-copyright position_footer align-left">
            <p>&copy; HRMS 2024, All right reserved</p>
        </div>
    </div>
    <script type="text/javascript" src="welcome_page/js/jquery-3.1.1.min.js"></script>
    <script src="welcome_page/js/classie.js"></script>
    <script src="welcome_page/js/uiMorphingButton_fixed.js"></script>
    <script src="welcome_page/js/form-init.js"></script>
    <script src="welcome_page/js/jquery.ajaxchimp.min.js"></script>
    <script type="text/javascript" src="welcome_page/js/v28/TweenLite.min.js"></script>
    <script type="text/javascript" src="welcome_page/js/v28/EasePack.min.js"></script>
    <script type="text/javascript" src="welcome_page/js/v28/rAF.js"></script>
    <script type="text/javascript" src="welcome_page/js/v28/star.js"></script>
    <script type="text/javascript" src="welcome_page/js/main.js"></script>

</body>

</html>