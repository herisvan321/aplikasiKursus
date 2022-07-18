<header id="header" id="home" style="background-color: #04091ed2;">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ route("root") }}"><img src="{{ asset('assets1/img/EILP.png') }}" style="height:40px" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="{{ route("root") }}">Home</a></li>
                    <li><a href="{{ route("root") }}">About Us</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li class="menu-has-children"><a href="#">Profile</a>
                        <ul>
                            <li><a href="course-details.html">Setting</a></li>
                            <li><a href="{{ route("peserta.logout") }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>