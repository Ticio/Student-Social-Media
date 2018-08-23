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
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('intern_diary') }}">Intern-diary</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>

                    <li><a href="{{ route('login_register') }}">Login</a></li>
                    <li><a href="{{ route('login_register') }}">Register</a></li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="div1"></div>
            </div>

            <div class="item">
                <div class="div2"></div>
            </div>

            <div class="item">
                <div class="div3"></div>
            </div>
        </div>

        <div id="welcome-message">
            
            <h2>Welcome to ALU student internship portfolio</h2>
            <br>
            <div id="search-bar">
                <form class="form-inline" action="" method="post" accept-charset="utf-8">
                    
                    <div class="form-group search">
                        <input type="text" class="form-control" name="" autocomplete="off" placeholder="Search for a student">
                    </div>

                    <div class="form-group search-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>        
                    </div>

                </form>
            </div>

        </div>

    </div>

    {{-- Container for the most searched users --}}
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body subtitle"><b>Most searched</b></div>
            </div>

            <br>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                @foreach ($top_users->chunk(4) as $users)
                    <div class="row">
                            @foreach ($users as $user)
                                <div class="col-sm-2 col-md-3">
                                    
                                    <div class="thumbnail">
{{-- 
                                        background-image: -webkit-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(https://ssl.gstatic.com/accounts/ui/avatar_2x.png);
    background-image: -o-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(https://ssl.gstatic.com/accounts/ui/avatar_2x.png);
    background-image: linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(https://ssl.gstatic.com/accounts/ui/avatar_2x.png); --}}
                                        
                                         @if($post->profile_path != "")
                                            <div class="back-image0" style=>
                                                <img src="{{Storage::url($user->profile_path)}}" class="img-responsive" alt=""/>
                                            </div>
                                        @else
                                            <div class="back-image0" style="background-image: -webkit-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(storage/uploads/profile_photos/{{$user->profile_path}}); background-image: -o-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(storage/uploads/profile_photos/{{$user->profile_path}});background-image: linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.25)), url(storage/uploads/profile_photos/{{$user->profile_path}});">
                                                <img src="{{Storage::url($user->profile_path)}}" class="img-responsive" alt=""/>
                                            </div>
                                        @endif
                                        

                                        <div class="back-image0" style=>
                                            <img src="{{Storage::url($user->profile_path)}}" class="img-responsive" alt=""/>
                                        </div>

                                        <div>
                                            <a id="cart" class=" btn" role="button">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true">
                                            </span> {{ $user->name }}
                                          </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach        
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <br> {{-- /*Container for the posts*/ --}}
    <div class="container">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body subtitle"><b>Interns daily diary posts</b></div>
            </div>
        </div>


        @foreach ($top_posts->chunk(3) as $posts)
            <br>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            @if($post->profile_path != "")
                                <img alt="image" class="img-responsive user-photo" src="{{Storage::url('uploads/profile_photos/'.$post->profile_path)}}">
                            @else
                                <img alt="image" class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            @endif
                        </div>
                        <!-- /thumbnail -->
                    </div>
                    <!-- /col-sm-1 -->

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                <strong>{{ $post->name }}</strong> 
                                
                                <span class="text-muted">commented 
                                    {{ 
                                        $post->created_at
                                    }}
                                </span>

                            </div>

                            <div class="panel-body">
                                <a href="" class="btn btn-sm btn-primary">Read more</a>
                            </div>
                            <!-- /panel-body -->

                        </div>
                        <!-- /panel panel-default -->
                    </div>
                    <!-- /col-sm-5 -->
                @endforeach
            </div>
        @endforeach

        <br><br>
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