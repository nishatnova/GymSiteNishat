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
                <a class="navbar-brand" href="{{route('home')}}">
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
                            <a href="{{route('list.gymclass')}}" class="nav-link">
                                Class Schedule
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('list.trainers')}}" class="nav-link">
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
                        @if(Auth::check())
                            {{-- If the user is logged in, display the user's name and logout option --}}
                            <div class="optional-item">
                                <a href="" class="optional-item-cart color-ffffff">{{ Auth::user()->name }}</a>
                            </div>
                            <div class="optional-item">
                                <a class="optional-item-cart color-ffffff" href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                    @csrf
                                </form>
                            </div>
                        @else
                            {{-- If the user is not logged in, display the login icon --}}
                            <div class="optional-item">
                                <a class="optional-item-cart color-ffffff" href="{{ route('login') }}">
                                    <i class="flaticon-user"></i>
                                </a>
                            </div>
                        @endif

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
