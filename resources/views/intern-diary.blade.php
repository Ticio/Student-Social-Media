@extends('layouts.guest-app') 

@section('local-css')
  
    /* Post List */

    nav
    {
        background-image: -webkit-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.5)), url(../images/slider.png) !important;
        background-size: cover !important;
        background-position: center !important;
    }

    .post-content{
        height: 222px;
    }

    .post-content img{
        width: 100%;
        height: 90%;
    }

    .panel-body{
        height: 87.1%;
    }

    .panel-default {
        height: 400px !important;
    }

    .panel-post .post-profile-photo {
        width: 50px;
        height: 50px;
    }

    .panel-post .info {
        padding: 0;
        margin-left: 10px;
    }

    .panel-post .info a {
        display: block;
    }

    .panel-post .info a.name {
        color: #454545;
        font-weight: bold;
        font-size: 15px;
    }

    .panel-post .info a.username {
        color: #757575;
        font-size: 13px;
    }

    .panel-post .info a.date {
        color: #929292;
        font-style: italic;
        font-size: 12px;
    }


    .panel-post .info a.date:hover {
        text-decoration: underline;
    }

    .panel-post .like-box {
        color: #454545;
        font-size: 12px;
    }

    .panel-post .like-box a {
        color: #454545;
        display: block;
        text-align: center;
    }


    .panel-post .like-box a.all_likes:hover {
        text-decoration: underline;
    }

    .panel-post .like-box a:first-child:hover {
        color: #d63737;
    }

    .panel-post .like-box a:last-child {
        margin-top: 5px;
        font-style: italic;
        font-size: 11px;
    }

    .panel-post .like-box i {
        color: #d63737;
        font-size: 19px;
        float: left;
        margin-right: 6px;
    }

    .panel-post .post-image {
        margin: 0 auto;
    }

    .panel-post .fix-hr {
        margin-left: -15px;
        width: calc(100% + 30px)
    }
@endsection

@section('links-css')

@endsection

@section('container1-content')
    
    <br><br>
    <div class="row">
        @foreach($posts->chunk(4) as $posts_chunk)
            @foreach($posts_chunk as $post)
                <div class="col-md-4">
                    <div class="panel panel-default panel-post" id="panel-post-{{ $post->id }}">
                        <div class="panel-body">
                            <div class="pull-left">
                                <a href="#">
                                    <img class="media-object img-circle post-profile-photo" src="{{ $post->user->getPhoto(60,60) }}">
                                </a>
                            </div>

                            <div class="pull-left info">
                                <a href="{{ url('/'.$post->user->username) }}" class="name">{{ $post->user->name }}</a>
                                <a href="{{ url('/'.$post->user->username) }}" class="username">{{ '@'.$post->user->username }}</a>
                                <a href="{{ url('/post/'.$post->id) }}" class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</a>
                            </div>

                            <div class="clearfix"></div>
                            <hr class="fix-hr">

                            <div class="post-content post-content-s">
                                {{ str_limit($post->content, 40) }}
                                @if($post->hasImage())
                                    @foreach($post->images()->get() as $image)
                                        <a data-fancybox="gallery" href="{{ $image->getURL() }}" data-caption="{{ $post->content }}">
                                            <img class="img-responsive post-image" src="{{ $image->getURL() }}">
                                        </a>
                                    @endforeach
                                @endif
                            </div>

                            <hr class="fix-hr">
                        </div>
                        <div class="panel-footer">
                            <a href="{{ url('/'.$post->user->username)}}#panel-post-{{ $post->id }}" class="btn btn-info btn-sm">See more</a>
                        </div>
                    </div>            
                </div>
            @endforeach       
        @endforeach
    </div>
    
    <div class="row text-center">
      {!! $posts->links() !!}
    </div> 
@endsection

@section('container2-content')
    
@endsection
