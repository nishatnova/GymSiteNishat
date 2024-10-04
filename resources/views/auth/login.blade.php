<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/plugins.css">
    <!-- Icon Plugins CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/iconplugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/responsive.css">

    <!-- Title -->
    <title>Golan - Login</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('/')}}website/assets/images/favicon.png">
</head>
<body>

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('/')}}website/assets/images/logos/small-white-logo.png" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('/')}}website/assets/images/logos/logo.png" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link active">
                                Home
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Class Schedule
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Trainers
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                    </ul>

                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item">
                            <div class="search-btn">
                                <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                    <i class='flaticon-loupe'></i>
                                </a>
                            </div>
                        </div>

                        <div class="optional-item">
                            <a class="optional-item-cart color-ffffff" href="{{ route('login') }}">
                                <i class="flaticon-user"></i>
                            </a>
                        </div>

                    </div>

                    <div class="mobile-nav">
                        <div class="mobile-other d-flex align-items-center">
                            <div class="optional-item">
                                <div class="search-btn">
                                    <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                        <i class='flaticon-loupe'></i>
                                    </a>
                                </div>
                            </div>


                            <div class="optional-item">
                                <div class="side-menu">
                                    <a class="#" href="#sidebarmodal" data-bs-toggle="modal" data-bs-target="#sidebarmodal">
                                        <i class="ri-menu-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Modal Start -->
<div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-search-form">
                    <input type="search" class="search-field" placeholder="Search...">
                    <button type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->


<!-- User Area -->
<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title"> Login</h3>
                        <form method="POST" action="{{ route('login') }}" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label for="email">Email<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="email" name="email" type="email" class="form-control" required data-error="Email" placeholder="Please Enter Your Email"/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="password" name="password" class="form-control" type="password" required placeholder="Please Enter Your Password"/>

                                    </div>
                                </div>

                                <div class="col-lg-12 form-condition">
                                    <div class="agree-label">
                                        <input type="checkbox" id="chb1">
                                        <label for="chb1">
                                            Remember Me <a class="forget" href="#">Forgot My Password?</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn border-radius-5">
                                        Login Now
                                    </button>
                                </div>

                                <div class="col-lg-12 col-md-12 agree-label mt-4">
                                    <p> <a class="forget" href="{{ route('register') }}">Don't Have Any Account? Register</a> </p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User Area End -->

<!-- Footer Area -->
<div class="footer-area">
    <div class="container ptb-100">
        <div class="newsletter-area">
            <div class="section-title text-center">
                <span>JOIN THE COMMUNITY</span>
                <h2 class="m-auto">Subscribe Our Newsletter</h2>
            </div>
            <form class="newsletter-form" data-toggle="validator" method="POST">
                <input type="email" class="form-control" placeholder="Enter Your Email Address" name="EMAIL" required autocomplete="off">
                <button class="subscribe-btn" type="submit">
                    Subscribe Now  <i class="flaticon-paper-plane"></i>
                </button>
                <div id="validator-newsletter" class="form-result"></div>
            </form>
        </div>
        <ul class="newsletter-social">
            <li>
                <a href="https://www.facebook.com/" target="_blank">
                    <i class='flaticon-facebook'></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/" target="_blank">
                    <i class='flaticon-instagram'></i>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/" target="_blank">
                    <i class='flaticon-twitter' ></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/" target="_blank">
                    <i class='flaticon-linkedin'></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <ul class="copyright-list">
                        <li>
                            <a href="about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="team.html">
                                Team
                            </a>
                        </li>
                        <li>
                            <a href="classes.html">
                                Classes
                            </a>
                        </li>
                        <li>
                            <a href="blog-1.html">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="copy-right-text">
                        <p>© Golan is Proudly Owned by <a href="https://1.envato.market/ZdJ7QQ" target="_blank">HiboTheme</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->

<!-- Jquery Min JS -->
<script src="{{asset('/')}}website/assets/js/jquery.min.js"></script>
<!-- Plugins JS -->
<script src="{{asset('/')}}website/assets/js/plugins.js"></script>
<!-- Custom  JS -->
<script src="{{asset('/')}}website/assets/js/custom.js"></script>
</body>

</html>
