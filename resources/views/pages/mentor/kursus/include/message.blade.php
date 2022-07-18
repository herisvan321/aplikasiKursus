@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Message</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Message</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container">
    <blockquote>
        <p>Aktifkan Message</p>
        <small>silahkan klik tombol dibawah ini untuk <cite title="Source Title">menghidupkan / mematikan</cite></small>
        @if(@count($data->id_data_message) > 0)
        <form action="{{ route('mentor.kursus.views.update.message', [base64_encode($data->id_data_message)]) }}" method="POST">
            @method("PUT")
        @else
        <form action="{{ route('mentor.kursus.views.save.message', [$id]) }}" method="POST">
        @endif
        @csrf
        @if(@count($data->id_data_message) > 0)
            @if($data->status_data_message == 1)
                    <button type="submit" class="btn btn-block bg-gradient-secondary">Matikan </button>
            @else
                <button type="submit" class="btn btn-block bg-gradient-primary">Hidupkan </button>
            @endif
        @else
            <button type="submit" class="btn btn-block bg-gradient-primary">Hidupkan </button>
        @endif
        </form>
      </blockquote>
      </div>
</section>
<!-- /.content -->
@endsection
