@extends('website.master')
@section('title', 'Home')

@section('body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Hero Slider Area -->
    <div class="hero-slider-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                        <div class="hero-content hero-content-mt">
                            <span>Real Time For Fitness</span>
                            <h1>People sharing Gym Gear and Tools</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus leo consectetur adipiscing elit ut elit </p>
                            <a href="about.html" class="default-btn border-radius-5">Learn More <i class="flaticon-right-arrow"></i></a>
                        </div>

                        <div class="hero-content hero-content-mt">
                            <span >Real Time For Fitness</span>
                            <h1 >A Reason of Your Health Join Today</h1>
                            <p >Lorem ipsum dolor sit amet consectetur adipiscing elit Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus leo consectetur adipiscing elit ut elit </p>
                            <a href="about.html" class="default-btn border-radius-5" >Learn More <i class="flaticon-right-arrow"></i></a>
                        </div>

                        <div class="hero-content hero-content-mt">
                            <span >Real Time For Fitness</span>
                            <h1 >Gym is The Best Place With Lots of Space</h1>
                            <p >Lorem ipsum dolor sit amet consectetur adipiscing elit Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus leo consectetur adipiscing elit ut elit </p>
                            <a href="about.html" class="default-btn border-radius-5">Learn More <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-img" data-tilt data-tilt-axis="x" data-aos="fade-up" data-aos-delay="900" data-aos-duration="900" data-aos-once="true">
                        <img src="{{asset('/')}}website/assets/images/home-two/home-two-img.png" alt="Hero" />
                    </div>
                </div>
            </div>
            <!-- End Sidebar Modal -->

            <!-- Start Carousel Thumbs -->
            <div class="thumbs-wrap">
                <div class="owl-thumbs hero-slider-thumb" data-slider-id="1">
                    <div class="owl-thumb-item">
                        <span>01</span>
                    </div>

                    <div class="owl-thumb-item">
                        <span>02</span>
                    </div>

                    <div class="owl-thumb-item">
                        <span>03</span>
                    </div>
                </div>
            </div>
            <!-- End Carousel Thumbs -->
        </div>
    </div>
    <!-- Hero Slider Area End -->

    <!-- About Area -->
    <div class="about-area pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="about-img pr-20" style="margin-top: 120px;" data-tilt data-tilt-axis="x">
                        <div class="img1" data-aos="fade-up" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">
                            <img src="{{asset('/')}}website/assets/images/about-img/about-img1.jpg" alt="About" />
                        </div>
                        <div class="img2" data-aos="fade-up" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">
                            <img src="{{asset('/')}}website/assets/images/about-img/about-img2.jpg" alt="About" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="about-content">
                        <div class="section-title">
                            <span  data-aos="fade-right" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">ABOUT US</span>
                            <h2 data-aos="fade-right" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">We Use Experience To Achieve The Physique You Deserve</h2>
                            <p data-aos="fade-right" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">
                                Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis pulvinar dapibus leo.Lorem ipsum dolor sit amet consectetur adipiscing elit dolor
                            </p>
                        </div>
                        <div class="about-list" data-aos="fade-right" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">
                            <ul>
                                <li><i class="flaticon-check"></i> Duis quis odio quis dui sagittis laoreet.</li>
                                <li><i class="flaticon-check"></i> Suspendisse tempus felis a libero mollis ultrices.</li>
                                <li><i class="flaticon-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                <li><i class="flaticon-check"></i> Suspendisse tempus felis a libero mollis ultrices.</li>
                                <li><i class="flaticon-check"></i> Proin sit amet diam et elit dictum sodales.</li>
                            </ul>
                        </div>
                        <a href="about.html" class="default-btn border-radius-5" data-aos="fade-right" data-aos-delay="80" data-aos-duration="900" data-aos-once="true">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Classes Area -->
    <div class="classes-area classes-area-bg1 pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>CLASSES WE PROVIDE</span>
                <h2 class="m-auto">We Offer Exclusive Services To Build Health With Professionals</h2>
            </div>
            <div class="classes-slider owl-carousel owl-theme">
                <div class="classes-item">
                    <div class="classes-content">
                        <div class="content">
                            <h2>01</h2>
                            <span>Boxing Training</span>
                        </div>
                        <h3><a href="class-details.html">Boxing For Men & Women</a></h3>
                    </div>
                    <div class="classes-images">
                        <a href="class-details.html"><img src="{{asset('/')}}website/assets/images/class-img/class-img1.jpg" alt="Classes Img"></a>
                    </div>
                </div>

                <div class="classes-item">
                    <div class="classes-images">
                        <a href="class-details.html"><img src="{{asset('/')}}website/assets/images/class-img/class-img2.jpg" alt="Classes Img"></a>
                    </div>
                    <div class="classes-content">
                        <div class="content">
                            <h2>02</h2>
                            <span>Fitness Training</span>
                        </div>
                        <h3><a href="class-details.html">Strength Training For Men</a></h3>
                    </div>
                </div>

                <div class="classes-item">
                    <div class="classes-content">
                        <div class="content">
                            <h2>03</h2>
                            <span>Cardio Training</span>
                        </div>
                        <h3><a href="class-details.html">Cardio Training For Women</a></h3>
                    </div>
                    <div class="classes-images">
                        <a href="class-details.html"><img src="{{asset('/')}}website/assets/images/class-img/class-img3.jpg" alt="Classes Img"></a>
                    </div>
                </div>

                <div class="classes-item">
                    <div class="classes-images">
                        <a href="class-details.html"><img src="{{asset('/')}}website/assets/images/class-img/class-img4.jpg" alt="Classes Img"></a>
                    </div>
                    <div class="classes-content">
                        <div class="content">
                            <h2>04</h2>
                            <span>Strategic Training</span>
                        </div>
                        <h3><a href="class-details.html">Cardio & Strategic Self Defense</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Classes Area End -->

    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>MEET OUR TEAM</span>
                <h2 class="m-auto">Our Team Of Expert Coaches</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-6">
                    <div class="team-item">
                        <a href="team.html">
                            <img src="{{asset('/')}}website/assets/images/team/team1.jpg" alt="Team" />
                        </a>
                        <ul class="team-social">
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
                        <div class="content">
                            <h3><a href="team.html">Frederick Gabriel</a></h3>
                            <span>Bodybuilding Trainer</span>
                        </div>
                        <div class="team-vector">
                            <img src="{{asset('/')}}website/assets/images/team/team-vector.png" alt="Vector" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="team-item">
                        <a href="team.html">
                            <img src="{{asset('/')}}website/assets/images/team/team2.jpg" alt="Team" />
                        </a>
                        <ul class="team-social">
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
                        <div class="content">
                            <h3><a href="team.html">Elizabeth Scarlett</a></h3>
                            <span>Yoga Trainer</span>
                        </div>
                        <div class="team-vector">
                            <img src="{{asset('/')}}website/assets/images/team/team-vector.png" alt="Vector" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="team-item">
                        <a href="team.html">
                            <img src="{{asset('/')}}website/assets/images/team/team3.jpg" alt="Team" />
                        </a>
                        <ul class="team-social">
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
                        <div class="content">
                            <h3><a href="team.html">Eleanor Penelope</a></h3>
                            <span>Cardio Training</span>
                        </div>
                        <div class="team-vector">
                            <img src="{{asset('/')}}website/assets/images/team/team-vector.png" alt="Vector" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Area End -->

    <!-- Timetable Area -->
    <div class="timetable-area timetable-area-bg ptb-100">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>TIMETABLE</span>
                <h2 class="m-auto">All Available Classes</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="timetable-table-area">
                        <div class="timetable-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gymClasses->chunk(2) as $chunk)
                                    <tr>
                                        @foreach($chunk as $gymClass)
                                        <td class="bg-color">
                                            <div class="tbody-content">
                                                <h3>{{ $gymClass->name }}</h3>
                                                <span>{{ \Carbon\Carbon::parse($gymClass->class_time)->format('j M Y') }} ({{ \Carbon\Carbon::parse($gymClass->class_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($gymClass->end_time)->format('h:i A') }})</span>
                                                <div class="content">
                                                    <h4><i class="flaticon-user"></i> {{ $gymClass->currentBookings() }}/{{ $gymClass->capacity }}</h4>
                                                    <form action="{{ route('bookings.create') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="gym_class_id" value="{{ $gymClass->id }}"/>
                                                    <button type="submit" class="plus-icon"><i class="flaticon-plus"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach

                                            @if($chunk->count() < 2)
                                                <td></td>
                                            @endif
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Timetable Area End -->

    <!-- Pricing Area -->
    <div class="pricing-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>OUR PRICING</span>
                <h2 class="m-auto">Our Team Of Expert Coaches</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="pricing-card">
                        <h3>Standard Plan</h3>
                        <span>Subscription</span>
                        <h2>150$</h2>
                        <div class="monthly-pack">
                            <h4>/Monthly</h4>
                        </div>
                        <ul>
                            <li>5 Days In A Week</li>
                            <li>01 Sweatshirt</li>
                            <li>01 Bottle of Protein</li>
                            <li><del>Access to Videos</del></li>
                            <li><del>Weight Lifting</del></li>
                            <li><del>Muscle Stretching</del></li>
                        </ul>
                        <a href="pricing.html" class="default-btn border-radius-5">Join Now <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="pricing-card">
                        <h3>Personal Plan</h3>
                        <span>Subscription</span>
                        <h2>350$</h2>
                        <div class="monthly-pack">
                            <h4>/Monthly</h4>
                        </div>
                        <ul>
                            <li>5 Days In A Week</li>
                            <li>01 Sweatshirt</li>
                            <li>01 Bottle of Protein</li>
                            <li>Access to Videos</li>
                            <li><del>Weight Lifting</del></li>
                            <li><del>Muscle Stretching</del></li>
                        </ul>
                        <a href="pricing.html" class="default-btn border-radius-5">Join Now <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="pricing-card">
                        <h3>Premium Plan</h3>
                        <span>Subscription</span>
                        <h2>500$</h2>
                        <div class="monthly-pack">
                            <h4>/Monthly</h4>
                        </div>
                        <ul>
                            <li>5 Days In A Week</li>
                            <li>01 Sweatshirt</li>
                            <li>01 Bottle of Protein</li>
                            <li>Access to Videos</li>
                            <li>Weight Lifting</li>
                            <li><del>Muscle Stretching</del></li>
                        </ul>
                        <a href="pricing.html" class="default-btn border-radius-5">Join Now <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="pricing-card">
                        <h3>VIP Plan</h3>
                        <span>Subscription</span>
                        <h2>1000$</h2>
                        <div class="monthly-pack">
                            <h4>/Monthly</h4>
                        </div>
                        <ul>
                            <li>5 Days In A Week</li>
                            <li>01 Sweatshirt</li>
                            <li>01 Bottle of Protein</li>
                            <li>Access to Videos</li>
                            <li>Weight Lifting</li>
                            <li><del>Muscle Stretching</del></li>
                        </ul>
                        <a href="pricing.html" class="default-btn border-radius-5">Join Now <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Area End -->
@endsection
