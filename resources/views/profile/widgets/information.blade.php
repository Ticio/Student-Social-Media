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
                <a href="{{ url('/'.Auth::user()->username.'/about-me') }}" class="menu-user">
                    <i class="fa fa-user" style="color:pink;"></i>
                    About me
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/'.Auth::user()->username.'/placement') }}" class="menu-building">
                    <i class="fa fa-building"></i>
                    Placement
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/'.Auth::user()->username.'/experience') }}" class="menu-lightbulb-o">
                    <i class="fa fa-lightbulb-o" style="color:yellow;"></i>
                    Experience
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ url('/'.Auth::user()->username.'/contact') }}" class="menu-address-book">
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
