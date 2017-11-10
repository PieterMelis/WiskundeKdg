<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volvo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>


            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }



        </style>
    </head>
    <body>


    <div class="hero-full-screen">

        <div class="top-content-section">
            <div class="top-bar">
                <div class="top-bar-left">
                    <ul class="menu">


                    </ul>
                </div>
            </div>
        </div>

        <div class="middle-content-section">
            <div class="title m-b-md">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1>Wiskunde</h1>
            </div>

            <div class="links">
                @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="hollow button">Admin</a>
                            @else
                                <a href="{{ route('login') }}" class="hollow button">Login</a>
                                <a href="{{ route('register') }} " class="hollow button">Register</a>
                                @endauth
                @endif
            </div>
        </div>

        <div class="bottom-content-section text-center" data-magellan data-threshold="0">

        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">




    </div>





    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
