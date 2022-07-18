@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
    <!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Text</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="container">
        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Input text</h3>

                <div class="card-tools">
                  <!--  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>-->
                </div>
            </div>
            <div class="card-body">
                @if (@count($data) > 0)
                    <form class="form-horizontal" method="POST" action="{{ route('mentor.kursus.views.update.text', [base64_encode($data->id_data_text)]) }}"
                        enctype="multipart/form-data">
                        @method("PUT")
                @else
                    <form class="form-horizontal" method="POST" action="{{ route('mentor.kursus.views.save.text', [$id]) }}"
                        enctype="multipart/form-data">
                @endif
                @csrf
                <div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Judul </label>
                        <div class="col-sm-10">
                            <input type="text" name="judul"
                                class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                placeholder="Enter Judul Kursus"
                                value="{{ @count($data) > 0 ? $data->judul_data_text : old('judul') }}">
                            @error('judul')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea name="content"
                                class="form-control form-control-lg summernote @error('content') is-invalid @enderror"
                                rows="8"
                                placeholder="Enter Content">{{ @count($data) > 0 ? $data->content : old('content') }}</textarea>
                            @error('content')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if (@count($data) > 0)
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">File saat ini</label>
                            <div class="col-sm-10">
                                <a href="{{ route("kursus.views.download.text", [base64_encode($data->id_data_text)]) }}">{{ $data->data_file }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file"
                                class="form-control form-control-lg @error('file') is-invalid @enderror">
                            @error('file')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    @include("pages.admin.kursus.include.button")
                </div>
                <!-- /.card-footer -->
                </form>
        </div>
        <!-- /.card -->

    </section>
    </div>
    <!-- /.content -->
@endsection
