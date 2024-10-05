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


    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>MEET OUR TEAM</span>
                <h2 class="m-auto">Our Team Of Expert Coaches</h2>
            </div>
            <div class="row justify-content-center">
                @foreach($trainers as $trainer)
                <div class="col-lg-4 col-6">
                    <div class="team-item">
                        <a href="team.html">
                            <img src="{{asset($trainer->image)}}" alt="Team" />
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
                            <h3><a href="team.html">{{$trainer->user->name}}</a></h3>
                            <span>{{$trainer->expertise}}</span>
                        </div>
                        <div class="team-vector">
                            <img src="{{asset($trainer->image)}}" alt="Vector" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team Area End -->

@endsection
