@extends('layouts.othertempdash')

@section('content')
@include('pages.other.home.include.banner')
@include('pages.other.home.include.navbar')

<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        @foreach($data as $key => $dat)
        <div class="card">
            <div class="container ">
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <h4 >{{ $dat->subkursus->judul_sub_kursus }}</h4>
                        {{-- <a href="#" class="genric-btn primary-border circle">Overdue</a> <br> --}}
                        <p>{!! $dat->subkursus->deskripsi !!}</p>

                    </div>
                    <div class="col-md-2">
                        @if(date(date(now()), strtotime(date("YmdHis"))) > date($dat->deadline, strtotime(date("YmdHis"))))
                        <a href="#" class="genric-btn danger radius">expired</a>
                        @else
                        @if($dat->kondisi == 1)
                        <a href="#" class="genric-btn success radius">Prosess</a>
                        @elseif($dat->kondisi == 2)
                        <a href="{{ route("other.dashboard.child", [base64_encode($dat->id_peserta_kursus), base64_encode($dat->id_sub_kursus)]) }}" class="genric-btn success radius">Go To Course</a>
                        @elseif($dat->kondisi == 0)
                        <a href="{{ route("peserta.payment", [base64_encode($dat->id_peserta_kursus)]) }}" class="genric-btn warning radius">payment</a>
                        @endif
                        @endif
                        
                        <br><br>
                        <a href="#" class="genric-btn default radius">Reset Deadlines</a>
                    </div>
                </div>
            <br>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</section>
@endsection