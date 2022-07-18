@extends('layouts.othertemp')

@section('content')
    <section class="search-course-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 search-course-left">

                    <h1 class="text-white">
                        <br>
                        <br>
                        <br>
                        Ayoo!! <br>
                        Bergabunglah bersama kami!
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on
                        the job is beyond reproach.
                    </p>

                    <br>
                    <br>
                    <br>
                </div>
                <div class="col-lg-4 col-md-6 search-course-right section-gap">
                    <form class="form-wrap" method="post" action="{{ route("other.register.post") }}">
                        @csrf
                        <h4 class="text-white pb-20 text-center mb-30">Register</h4>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'">
                        <input type="text" class="form-control" name="username" placeholder="username"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'username'">
                        <input type="email" class="form-control" name="email" placeholder=" Email Address"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address'">
                        <input type="password" class="form-control" name="password" placeholder=" Password"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = ' Password'">
                        <!-- <div class="form-select" id="service-select">
                            <select>
                                <option datd-display="">Choose Course</option>
                                <option value="1">Course One</option>
                                <option value="2">Course Two</option>
                                <option value="3">Course Three</option>
                                <option value="4">Course Four</option>
                            </select>
                        </div> -->
                        <button class="primary-btn text-uppercase">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
