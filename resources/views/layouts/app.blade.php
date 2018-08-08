<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="{{asset('js/summernote/dist/summernote.css')}}" rel="stylesheet">
      <script type="text/javascript" src="{{ asset('ui/processing.js') }}"></script>
  		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    {{-- This is for AJAX --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/pace-master/themes/white/pace-theme-flash.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fancybox/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/around.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>

   <div id="fb-root"></div>

    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=448766425622023&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="app">
            <nav class="navbar navbar-default navbar-static-top navbar-around">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        @if(Auth::check())
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="" />
                            </a>
                        @else
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="" />
                            </a>
                        @endif
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                       {{--  <div class="navbar-form navbar-left">
                            <form id="custom-search-input" method="get" action="{{ url('/search') }}">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg" name="s" placeholder="search..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div> --}}


                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            {{-- @include('widgets.notifications') --}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle parent" data-toggle="dropdown" role="button" aria-expanded="false">

                                    @if(Auth::check())
                                        <img src="{{ Auth::user()->getPhoto() }}" alt="" />
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    @else

                                    @endif

                                </a>

                                <ul class="dropdown-menu" role="menu">
                
                                     @if(Auth::check())
                                        <li>
                                            <a href="{{ url('/'.Auth::user()->username) }}">
                                                <i class="fa fa-user"></i> My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/settings') }}">
                                                <i class="fa fa-cog"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    @else
                                        
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @include('inc.messages')
        <div class="main-content">
            @yield('content')
        </div>

        <div class="container">
            @include('widgets.footer')
        </div>
    </div>
<div class="loading-page">
    <img src="{{ asset('images/rolling.gif') }}" alt="">
</div>
@include('widgets.error')
<!-- Scripts -->
<script type="text/javascript">
    var BASE_URL = "{{ url('/') }}";
    var REQUEST_URL = "<?=Request::url()?>";
    var CSRF = "{{ csrf_token() }}";
    var WALL_ACTIVE = false;
</script>
<script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js')  }}"></script>
<script src="{{ asset('plugins/pace-master/pace.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.serializeJSON/jquery.serializejson.min.js') }}"></script>
<script src="{{ asset('plugins/fancybox/dist/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="//maps.google.com/maps/api/js?key=<?=config('googlemaps.key')?>"></script>
<script src="{{ asset('plugins/gmaps/gmaps.min.js') }}"></script>
<script src="{{ asset('js/around.js') }}"></script>
<script src="{{ asset('js/wall.js') }}"></script>
<script src="{{ asset('js/notifications.js') }}"></script>
@yield('footer')
<script type="text/javascript">
    @if(Auth::check())
        @if(!Auth::user()->has('location'))

                autoFindLocation();

        @endif
    @endif
</script>
<script src="{{asset('js/summernote/dist/summernote.min.js')}}"></script>

<script>
      $('#summernote').summernote({
        placeholder: '',
        tabsize: 10,
        height:250,
        toolbar: [
  // [groupName, [list of button]]
  ['style', ['bold', 'italic', 'underline', 'clear']],
  ['font', ['strikethrough', 'superscript', 'subscript']],
  ['fontsize', ['fontsize']],
  ['color', ['color']],
  ['link', ['link']],
  ['picture', ['picture']],
  ['table', ['table']],
  ['fullscreen', ['fullscreen']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['height', ['height']],
  ['video', ['video']],
  ['codeview', ['codeview']],
],
  height: 400,
      });
</script>

</body>
</html>
