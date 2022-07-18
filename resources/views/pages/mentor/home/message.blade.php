@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')

<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        @foreach($data as $key => $dat)
        <div class="card">
            <div class="container ">
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <h4 >{{ $dat->kursus->judul_sub_kursus }}</h4>
                        <b>{{ $dat->peserta->nama_lengkap }}</b>
                        @if($dat->notif > 0)
                        <span class="badge badge-danger">{{$dat->notif}}</span>
                        @endif
                        {{-- <a href="#" class="genric-btn primary-border circle">Overdue</a> <br> --}}
                        <p style="color:#dfdfdf">
                                {!! \Illuminate\Support\Str::limit($dat->pesanTerakhir->content, 50, $end='...') !!}</p>
                             
                    </div>
 <div class="col-md-2"><span style="color:#dfdfdf">{{ date("d/m-Y H:i", strtotime(date($dat->pesanTerakhir->tgl)) ) }}</span></div>
                </div>
            <br>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</section>
@endsection