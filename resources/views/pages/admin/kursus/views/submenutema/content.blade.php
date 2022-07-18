@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Content</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Content</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                @if ($skondisi == 0 || $skondisi == 1 || $skondisi == 2)
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data
                                    @if ($skondisi == 0)
                                        Video
                                    @elseif($skondisi == 1)
                                        Audio
                                    @elseif($skondisi == 2)
                                        Reading
                                    @endif
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            @if ($skondisi == 0)
                                @include(
                                    'pages.admin.kursus.views.submenutema.include.videos'
                                )
                            @elseif($skondisi == 1)
                                @include(
                                    'pages.admin.kursus.views.submenutema.include.audios'
                                )
                            @elseif($skondisi == 2)
                                Reading
                                
                            @endif
                        </div>
                        <!-- /.card -->

                    </div>
                @else
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Kuis</h3>
                            </div>
                            <!-- /.card-header -->
                            @include(
                                'pages.admin.kursus.views.tablekuis'
                            )
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Inputkan Kuis</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('kursus.views.sub-menu-tema.kuis.save', [$id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Judul</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="judul"
                                                    class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                                    placeholder="Enter Judul Kursus">
                                                @error('judul')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Menit</label>
                                            <div class="col-sm-10">
                                                <select name="menit" class="form-control">
                                                    @for ($i = 1; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('menit')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea name="deskripsi"
                                                    class="form-control form-control-lg summernote @error('deskripsi') is-invalid @enderror"
                                                    rows="8" placeholder="Enter Deskripsi"></textarea>
                                                @error('deskripsi')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                @endif
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div>

    </section>
    <!-- /.content -->
@endsection
