<div class="panel panel-default panel-post" id="panel-post-{{ $post->id }}">
    <div class="panel-body">
        <div class="pull-left">
            <a href="#">
                <img class="media-object img-circle post-profile-photo" src="{{ $post->user->getPhoto(60,60) }}">
            </a>
        </div>
        <div class="pull-left info">
            <a href="{{ url('/'.$post->username) }}" class="name">{{ $post->name }}</a>
            <a href="{{ url('/'.$post->username) }}" class="username">{{ '@'.$post->username }}</a>
            <a href="{{ url('/post/'.$post->id) }}" class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</a>
        </div>
        <div class="clearfix"></div>
        <hr class="fix-hr">
        <div class="post-content post-content-s">
            {{ $post->content }}
            @if($post->hasImage())
                @foreach($post->images()->get() as $image)
                    <a data-fancybox="gallery" href="{{ $image->getURL() }}" data-caption="{{ $post->content }}"><img class="img-responsive post-image" src="{{ $image->getURL() }}"></a>
                @endforeach
            @endif
        </div>
        <hr class="fix-hr">
        <div class="comments-title">
            @include('widgets.post_detail.comments_title')
        </div>
        <div class="post-comments">

            @foreach($post->comments()->limit($comment_count)->orderBY('id', 'DESC')->with('user')->get()->reverse() as $comment)

                @include('widgets.post_detail.single_comment')

            @endforeach

        </div>

        <div class="clearfix"></div>
    </div>
</div>