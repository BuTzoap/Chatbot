<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/icons/favicon.ico') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script >window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
  <title>
    Example chatbot
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
 
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="{{  url('/home') }}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('images/004.png') }}">
          </div>
        </a>
        <a href="{{  url('/home') }}" class="simple-text logo-normal">
            {{ Auth::user()->name }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{  route('user.index') }}">
              <i class="" style="line-height: 22px;">
                <img src="{{ asset('images/007-user.png') }}" alt="" style="width: 25px;">
              </i>
              <p>User</p>
            </a>
          </li>
          <li>
            <a href="{{  route('chatbot.index') }}">
              <i class="" style="line-height: 22px;">
                <img src="{{ asset('images/chat.png') }}" alt="" style="width: 25px;">
              </i>
              <p>chatbot</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> 
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.4/lodash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.4/chance.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.5.3/numeral.min.js"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>

  <script src="{{ asset('demo/demo.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" ></script>

</body>

</html>
