<header id="header" id="home">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ route("root") }}"><img src="{{ asset('assets1/img/EILP.png') }}" style="height:40px" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="{{ route("root") }}">Home</a></li>
                    <li><a href="{{ route("root") }}">About Us</a></li>
                    <li><a href="{{ route("tutor") }}">Tutor</a></li>
                    <li><a href="events.html">Event</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="{{ route("other.register") }}">Register</a></li>
                    <li><a href="{{ route("other.login") }}">Login</a></li>
                    <li><a href="{{ route("contactus") }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>