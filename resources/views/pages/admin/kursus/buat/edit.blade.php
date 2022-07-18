@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Kursus</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('kursus.edit.update', [base64_encode($data->id_kursus)]) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul Kursus</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Enter Judul Kursus" value="{{ $data->judul }}">
                                @error('judul')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi"
                                    class="form-control form-control-lg summernote @error('deskripsi') is-invalid @enderror"
                                    rows="8" placeholder="Enter Deskripsi">{{ $data->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Introduction</label>
                            <div class="col-sm-10">
                                <textarea name="introduction"
                                    class="form-control form-control-lg summernote @error('introduction') is-invalid @enderror"
                                    rows="8" placeholder="Enter Introduction">{{ $data->introduction }}</textarea>
                                @error('introduction')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ellgibilitty</label>
                            <div class="col-sm-10">
                                <textarea name="ellgibilitty"
                                    class="form-control form-control-lg summernote @error('ellgibilitty') is-invalid @enderror"
                                    rows="8" placeholder="Enter Ellgibilitty">{{ $data->ellgibilitty }}</textarea>
                                @error('ellgibilitty')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img src="{{ asset('/assets/dist/img/'.$data->image) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror">
                                @error('image')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_kursus" class="form-control form-control-lg @error('status_kursus') is-invalid @enderror">
                                    <option value="0" {{ $data->status_kursus == 0 ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ $data->status_kursus == 1 ? 'selected' : '' }}>NoActive</option>
                                </select>
                                @error('status_kursus')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
