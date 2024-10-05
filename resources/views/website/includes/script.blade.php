<!-- Jquery Min JS -->

<script src="{{asset('/')}}website/assets/js/jquery.min.js"></script>
<!-- Plugins JS -->
<script src="{{asset('/')}}website/assets/js/plugins.js"></script>
<!-- Custom  JS -->
<script src="{{asset('/')}}website/assets/js/custom.js"></script>
<script src="{{asset('/')}}website/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        // Initialize Hero Slider
        $('.hero-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            dots: true,
            thumbs: true, // Enable thumbnails if necessary
            thumbsPrerendered: true,
            autoplay: true,
            autoplayTimeout: 5000, // Change autoplay speed if required
            animateOut: 'fadeOut',
        });


        $(".classes-slider").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 1 // Single item on mobile
                },
                768: {
                    items: 2 // Two items on tablets
                },
                1024: {
                    items: 3 // Three items on desktop
                }
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        maxTilt: 20,
        speed: 400,
        scale: 1.1
    });
</script>

