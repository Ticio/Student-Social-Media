<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Welcome') }}</title>

      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
      
      @yield('links-css')

      <style type="text/css" media="screen">

          @yield('local-css')
      
      </style>

      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>

  <body>

      <!-- Fixed navbar -->
      <nav class="navbar navbar-default">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
              </div>

              <div id="navbar" class="navbar-collapse collapse">

                  <ul class="nav navbar-nav navbar-right">

                      <li><a href="{{ url('intern_diary') }}">Intern-diary</a></li>
                      <li><a href="{{ url('about') }}">About</a></li>
                      <li><a href="{{ route('login_register') }}">Login</a></li>
                      <li><a href="{{ route('login_register') }}">Register</a></li>
                      
                  </ul>

              </div>
              <!--/.nav-collapse -->
          </div>
      </nav>

      @yield('carousel')

      {{-- Container for the most searched users --}}
      <div class="container">
           @yield('container1-content')
      </div>

      <br> {{-- /*Container for the posts*/ --}}
      <div class="container">

          @yield('container2-content')

      </div>

      <br><br>
       <!-- Footer -->
      <footer class="footer bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
              <ul class="list-inline mb-2">
                <li class="list-inline-item">
                  <a href="#">About</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Contact</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Terms of Use</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Privacy Policy</a>
                </li>
              </ul>
              <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fa fa-facebook fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fa fa-twitter fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-instagram fa-2x fa-fw"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- Scripts -->
      <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>

</html>