@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Show Soal</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Show Soal</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <label><b>Nomor Soal</b></label>
    <p>
      {{ $data->no_soal }}
    </p>
    <label><b>Media</b></label>
    <p>
      @if($data->type_media == "video")
      <video width="640" height="480" src="{{ asset('/assets/dist/soal/'. $data->media_soal) }}" controls>
      </video>
      @elseif($data->type_media == "audio")
      <audio src="{{ asset('/assets/dist/soal/'. $data->media_soal) }}" controls>
        @else
        Tidak ada media
        @endif
      </p>
      <label><b>Soal</b></label>
      <p>
        {!! $data->content !!}
      </p>
      <label><b>Jumlah Jawaban</b></label>
      <p>
        {!! $data->jml_jawaban !!}
      </p>
      <label><b>Jawaban</b></label>
      <p>
        {!! $data->jawaban !!}
      </p>
      <label><b>Skor</b></label>
      <p>
        {!! $data->skor_soal !!}
      </p>

    </div>
  </section>
  <!-- /.content -->
  @endsection