@extends('layouts.app')

@section('content')
    <div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              @include('profile.widgets.card')
              <div class="m-t-20"></div>
              <div class="menu">
                  <ul class="list-group">
                      <li class="list-group-item">
                          <a href="{{ url('/') }}" class="menu-home">
                              <i class="fa fa-home"></i>
                              Home
                          </a>
                      </li>

                      @if(Auth::check())
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/about-me') }}" class="menu-user">
                                <i class="fa fa-user" style="color:pink;"></i>
                                About me
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/placement') }}" class="menu-building">
                                <i class="fa fa-building"></i>
                                Placement
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/experience') }}" class="menu-lightbulb-o">
                                <i class="fa fa-lightbulb-o" style="color:yellow;"></i>
                                Experience
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/contact') }}" class="menu-address-book">
                                <i class="fa fa-address-book" style="color:#b074cc;"></i>
                                Contact
                            </a>
                        </li>
                      @else
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/about-me') }}" class="menu-user">
                                <i class="fa fa-user" style="color:pink;"></i>
                                About me
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/placement') }}" class="menu-building">
                                <i class="fa fa-building"></i>
                                Placement
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/experience') }}" class="menu-lightbulb-o">
                                <i class="fa fa-lightbulb-o" style="color:yellow;"></i>
                                Experience
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/'.$user->username.'/contact') }}" class="menu-address-book">
                                <i class="fa fa-address-book" style="color:#b074cc;"></i>
                                Contact
                            </a>
                        </li>
                      @endif



                  </ul>
              </div>
              <div class="m-t-20"></div>
              @include('profile.widgets.user_follow_counts')
            </div>
            <div class="col-md-9">

        
             @if(Auth::check())
              @if (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/about-me'))

                <div class="content-page-title">
                    <i class="fa fa-user" style="color:pink;"></i> About Me |<small> 


                    <a href="{{url('/about-me')}}"><i class="fa fa-pencil" style="color:blue;"></i> Edit</a> </small>
                </div>
                @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/placement'))
                  <div class="content-page-title">
                      <i class="fa fa-building"></i> Placement |<small> <a href="{{url('/placement')}}"><i class="fa fa-pencil" style="color:blue;"></i> Edit</a> </small>
                  </div>
               @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/experience'))
                 <div class="content-page-title">
                     <i class="fa fa-building"></i> Experience |<small> <a href="{{url('/experience')}}"><i class="fa fa-pencil" style="color:blue;"></i> Edit</a> </small>
                 </div>
              @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/contact'))
                <div class="content-page-title">
                    <i class="fa fa-address-book" style="color:#b074cc;"></i> Contact |<small> <a href="{{url('/contact')}}"><i class="fa fa-pencil" style="color:blue;"></i> Edit</a> </small>
                </div>

                @endif
                    <div class="chat">

                      <div class="panel panel-default">
                      @if (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/about-me'))

                              <div class="panel-body">{!! $aboutMe->aboutme !!}</div>

                        @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/placement'))


                              <div class="panel-body">{!! $placement->placement !!}</div>

                       @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/experience'))

                             <div class="panel-body">{!! $experience->experience !!}</div>

                      @elseif (str_contains(Request::fullUrl(), '/'.Auth::user()->username.'/contact'))

                            <div class="panel-body">{!! $contact->contact !!}</div>
                    @else
                      <p>Item not found !</p>

                    @endif
                     </div>
                    </div>
            @else 
              {{-- This part is for the non-authenticated user --}}
              @if (str_contains(Request::fullUrl(), '/'.$user->username.'/about-me'))

                <div class="content-page-title">
                    <i class="fa fa-user" style="color:pink;"></i> About Me <small>
                </div>
                @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/placement'))
                  <div class="content-page-title">
                      <i class="fa fa-building"></i> Placement<small>
                  </div>
               @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/experience'))
                 <div class="content-page-title">
                     <i class="fa fa-building"></i> Experience <small>
                 </div>
              @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/contact'))
                <div class="content-page-title">
                    <i class="fa fa-address-book" style="color:#b074cc;"></i> Contact <small>
                </div>

                @endif
                    <div class="chat">

                      <div class="panel panel-default">
                      @if (str_contains(Request::fullUrl(), '/'.$user->username.'/about-me'))

                              <div class="panel-body">{!! $aboutMe->aboutme !!}</div>

                        @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/placement'))


                              <div class="panel-body">{!! $placement->placement !!}</div>

                       @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/experience'))

                             <div class="panel-body">{!! $experience->experience !!}</div>

                      @elseif (str_contains(Request::fullUrl(), '/'.$user->username.'/contact'))

                            <div class="panel-body">{!! $contact->contact !!}</div>
                    @else
                      <p>Item not found !</p>

                    @endif
                     </div>
                    </div>
            @endif

            </div>
        </div>
    </div>



@endsection


@section('footer')
@endsection
