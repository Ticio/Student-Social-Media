<div class="panel panel-default suggested-people">
    @if(Auth::check())
    <div class="panel-heading">Suggested People</div>
    <ul class="list-group">
 
            @foreach(Auth::user()->suggestedPeople(10) as $user)
                <li class="list-group-item">
                    <div class="col-xs-12 col-sm-3">
                        <a href="{{ url('/'.$user->username) }}">
                            <img src="{{ $user->getPhoto(50, 50) }}" alt="{{ $user->name }}" class="img-circle" />
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <a href="{{ url('/'.$user->username) }}">
                            <span class="name">{{ $user->name }}</span><small>{{ '@'.$user->username }}</small><br />
                        </a>
                        <div id="people-listed-{{ $user->id }}">
                            {!! sHelper::followButton($user->id, Auth::id(), '#people-listed-'.$user->id, 'btn-sm') !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </li>
            @endforeach
        
    </ul>
    @else
        <div class="panel-heading">Students you may know</div>
        <ul class="list-group">

                @foreach($users as $user)

                    @if($user->name != "guest")

                        <li class="list-group-item">
                            <div class="col-xs-12 col-sm-3">
                                <a href="{{ url('/'.$user->username) }}">
                                    <img src="{{ $user->getPhoto(50, 50) }}" alt="{{ $user->name }}" class="img-circle" />
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <a href="{{ url('/'.$user->username) }}">
                                    <span class="name">{{ $user->name }}</span><small>{{ '@'.$user->username }}</small><br />
                                </a>
                                <a id="cart" class="btn btn-sm btn-info pull-right" role="button" href="{{ url('/'.$user->username)}}">
                                    See
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    @endif
                @endforeach
            
        </ul>

    @endif
</div>