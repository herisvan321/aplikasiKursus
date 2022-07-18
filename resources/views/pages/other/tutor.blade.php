@extends('layouts.othertemp')

@section('content')
@include('layouts.include.other.banner1')
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        @foreach($data as $key => $dat)
        @if($key%2)
        <div class="card">
            <div class="container ">
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <h4>{{ $dat->nama_lengkap }}</h4>
                        <p><a href="#">{{ $dat->email }}</a></p>
                        <p>{{ $dat->biografi }}</p>   
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('/assets1/img/'.$dat->img)}}" alt="">
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>
        @else
        <div class="card">
            <div class="container ">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('/assets1/img/'.$dat->img)}}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4>{{ $dat->nama_lengkap }}</h4>
                        <p><a href="#">{{ $dat->email }}</a></p>
                        <p>{{ $dat->biografi }}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>
        @endif
        @endforeach
    </div>
</section>
@include('layouts.include.other.banner2')
@endsection