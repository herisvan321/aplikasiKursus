@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
    <!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Forum</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Forum</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container">
    <blockquote>
        <p>Isi Forum</p>
        @if(@count($data->id_data_forum) > 0)
        <form action="{{ route('mentor.kursus.views.update.forum', [base64_encode($data->id_data_forum)]) }}" method="POST">
            @method("PUT")
        @else
        <form action="{{ route('mentor.kursus.views.save.forum', [$id]) }}" method="POST">
        @endif
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="judul"
                    class="form-control form-control-lg @error('judul') is-invalid @enderror"
                    placeholder="Enter Judul Kursus" value="{{ @count($data->id_data_forum) > 0 ?  $data->judul_forum : '' }}">
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
                    rows="8" placeholder="Enter Deskripsi">{{ @count($data->id_data_forum) > 0 ? $data->deskripsi : '' }}</textarea>
                @error('deskripsi')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @if(@count($data->id_data_forum) > 0)
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status_forum" class="form-control form-control-lg @error('status_forum') is-invalid @enderror">
                        <option value="0" {{ $data->status_forum == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $data->status_forum == 1 ? 'selected' : '' }}>NoActive</option>
                    </select>
                    @error('status_forum')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
      
            <button type="submit" class="btn btn-block bg-gradient-primary">Submit </button>
      
        </form>
      </blockquote>
      </div>
</section>
<!-- /.content -->
@endsection
