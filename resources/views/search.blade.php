@extends('layouts.guest-app')


@section('local-css')
  
    /* Post List */


    #myCarousel, .carousel-inner{
        height: 75vh;
    }

    #welcome-message h2{
      font-family: 'Roboto', sans-serif;
      margin: 6.5% 0 0 0;
    }

    .carousel-inner .item div.about-us{
      background-image: -webkit-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.5)), url(../images/image3.jpg) !important;
      background-size: cover;
      background-position: auto;
    }
    
@endsection

@section('carousel')
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
       
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="about-us"></div>
            </div>
       </div>

        <div id="welcome-message">
            
            <h2>{{ count($result) }} Result(s) found</h2>
            <br>
           
        </div>
    </div>
@endsection

@section('container1-content')
    
    <br><br><br>
    <div class="panel-body">
        @foreach ($result->chunk(4) as $users)
            <div class="row">
                    @foreach ($users as $user)
                        <div class="col-sm-2 col-md-3">
                            
                            <div class="thumbnail">
                                <div class="back-image0">
                                    <img src="{{Storage::url($user->profile_path)}}" class="img-responsive" alt=""/>
                                </div>
                                <div>
                                    <a id="cart" class=" btn" href="{{ url('/'.$user->username)}}" role="button">
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

@endsection

@section('container2-content')
    
@endsection
