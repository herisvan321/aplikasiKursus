@extends('layouts.othertempdash')

@section('content')
@include('pages.other.home.include.banner')
@include('pages.other.home.include.navbar')

<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        <div class="row">
            <div class="single-popular-carusel col-lg-12 col-md-12">
                <h4>Courses</h4>
            </div>
            @foreach($data as $key => $dat)
                <div class="single-popular-carusel col-lg-3 col-md-6">
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
            <!-- <a href="#" class="primary-btn text-uppercase mx-auto">Details</a> -->
        </div>
    </div>
</section>
@endsection