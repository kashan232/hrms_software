<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="/vendor/global/global.min.js" type="text/javascript"></script>
<script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="/vendor/chart.js/Chart.bundle.min.js" type="text/javascript"></script>
<script src="/vendor/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<script src="/vendor/peity/jquery.peity.min.js" type="text/javascript"></script>
<script src="/js/dashboard/dashboard-1.js" type="text/javascript"></script>
<script src="/js/custom.min.js" type="text/javascript"></script>
<script src="/js/deznav-init.js" type="text/javascript"></script>
<script src="/js/demo.js" type="text/javascript"></script>
<script src="/js/styleSwitcher.js" type="text/javascript"></script>
<script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
<script>
    function carouselReview() {
        /*  testimonial one function by = owl.carousel.js */
        function checkDirection() {
            var htmlClassName = document.getElementsByTagName('html')[0].getAttribute('class');
            if (htmlClassName == 'rtl') {
                return true;
            } else {
                return false;

            }
        }
        jQuery('.testimonial-one').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 15,
            nav: false,
            dots: false,
            left: true,
            rtl: checkDirection(),
            navText: ['', ''],
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 2
                },
                991: {
                    items: 2
                },

                1200: {
                    items: 2
                },
                1600: {
                    items: 2
                }
            }
        })
        jQuery('.testimonial-two').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 15,
            nav: false,
            dots: true,
            left: true,
            rtl: checkDirection(),
            navText: ['', ''],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                991: {
                    items: 3
                },

                1200: {
                    items: 3
                },
                1600: {
                    items: 4
                }
            }
        })
    }
    jQuery(window).on('load', function() {
        setTimeout(function() {
            carouselReview();
        }, 1000);
    });
</script>

</body>
</html>