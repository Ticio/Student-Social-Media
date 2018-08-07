<div class="menu">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-home">
                <i class="fa fa-home"></i>
                Home
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/about-me') }}" class="menu-user">
                <i class="fa fa-user" style="color:pink;"></i>
                About me
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/placement') }}" class="menu-building">
                <i class="fa fa-building"></i>
                Placement
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/experience') }}" class="menu-lightbulb-o">
                <i class="fa fa-lightbulb-o" style="color:yellow;"></i>
                Experience
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/contact') }}" class="menu-address-book">
                <i class="fa fa-address-book" style="color:#b074cc;"></i>
                Contact
            </a>
        </li>
        
        <li class="list-group-item">
            <a href="{{ url('/'.Auth::user()->username) }}" class="menu-address-book">
                <i class="fa fa-eye" style="color:#E35D06;"></i>
                View My Profile
            </a>
        </li>
        
        <li class="list-group-item">
            </a>
        </li>
    </ul>
</div>
