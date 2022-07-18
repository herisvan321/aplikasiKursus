<section class="popular-courses-area  courses-page" style="padding: 20px ">
    <div class="container">
        <!-- <div class="row d-flex justify-content-center"> -->
        <!-- <div class="menu-content pb-70 col-lg-8"> -->
        <div class="title ">
            <br>
            <!-- <h2 align="center">Welcome Back!</h2> -->
        </div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background: #F2F2F2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ $in == 0 ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('peserta.home') }}">Home </a>
                    </li>
                    <li class="nav-item {{ $in == 1 ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('peserta.inproses') }}">In Progress</a>
                    </li>
                    <li class="nav-item {{ $in == 2 ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('peserta.complate') }}">Complated</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search Courses" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <!-- </div> -->
    </div>
    <!-- </div> -->
</section>
