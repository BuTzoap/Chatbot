<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
                <meta name="csrf-token" content="{{ csrf_token() }}">
        <script >window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <title>Example chatbot</title>

        <!-- Fonts -->
        
        <script src="{{ asset('js/app.js') }}" ></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="css/util.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
        
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #app {
                width: 100%;
            }
        </style>
    </head>
<body>
        <div class="flex-center position-ref full-height">
                    <div class="top-right links">
                            @if (Route::has('login'))
                                @auth
                                <a href="{{ url('/home') }}">Home</a>
                                @else
                                <a href="{{  url('login') }}">Login</a>
                                @endauth
                            @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                            @endif
                            
                    </div>
                        <div id="app">
                        <main class="py-4">
                                @yield('content')
                            </main>
                        </div>
                {{-- </div> --}}
            </div>
</body>
<script src="js/app.js"></script>
</html>
