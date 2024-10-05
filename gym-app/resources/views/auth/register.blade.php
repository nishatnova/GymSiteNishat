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
    <title>Golan - Register</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('/')}}website/assets/images/favicon.png">
</head>
<body>

<!-- User Area -->
<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <a href="{{route('home')}}">
                                <img src="{{asset('/')}}website/assets/images/logos/logo-2.png" class="mb-5" alt="logo">
                            </a>
                        </div>
                        <h3 class="user-title"> Register </h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="role" class="">Register As <sup style="color: #DA1D25;">*</sup> </label>
                                        <select id="role" name="role" class="form-select">
                                            <option value="Trainee">Trainee</option>
                                            <option value="Trainer">Trainer</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Full Name<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="name" name="name" type="text" class="form-control" required autofocus data-error="name" placeholder="Please Enter Your Name" autocomplete="name"/>
                                    </div>
                                </div>

                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <label for="email">Email<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="email" name="email" type="email" class="form-control" required autofocus data-error="Please enter Email" placeholder="Please Enter Your Email" autocomplete="username"/>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="password" name="password" class="form-control" type="password" required autofocus placeholder="Please Enter Your Password" autocomplete="new-password"/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password<sup style="color: #DA1D25;">*</sup></label>
                                        <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" required autofocus placeholder="Please Enter Your Password" autocomplete="new-password"/>
                                    </div>
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="ms-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                @endif



                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn border-radius-5">
                                        Register Now
                                    </button>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <a class="mt-4" style="color: #DA1D25;" href="{{ route('login') }}">
                                        Already registered? | Login
                                    </a>

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
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copy-right-text">
                        <p class="text-center">© Golan is Proudly Owned by <a href="https://1.envato.market/ZdJ7QQ" target="_blank">HiboTheme</a></p>
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
