@extends('layouts.othertemp')

@section('content')
@include('layouts.include.other.banner')
<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Popular Modules we offer</h1>
                    <!-- <p>There is a moment in the life of any aspiring.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-popular-carusel">
                @foreach($data as $key => $dat)
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid"
                                src="{{ asset("assets/dist/img/".$dat->image) }}"
                                alt="" style="width: 262px; height: 200px;">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <!-- <h4>$150</h4> -->
                        </div>
                    </div>
                    <div class="details">
                        <a href="{{ route("other.details", [base64_encode($dat->id_kursus)]) }}">
                            <h4>
                                {!! \Illuminate\Support\Str::limit($dat->judul, 27, $end='...') !!}
                            </h4>
                        </a>
                        <p>
                            {!! \Illuminate\Support\Str::limit($dat->deskripsi, 100, $end='...') !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection