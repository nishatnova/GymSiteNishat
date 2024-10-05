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
