@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Data Content</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Content</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">
      @if ($skondisi == 0 || $skondisi == 1 || $skondisi == 2)
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header bg-primary text-white">
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
          'pages.mentor.kursus.views.submenutema.include.videos'
          )
          @elseif($skondisi == 1)
          @include(
          'pages.mentor.kursus.views.submenutema.include.audios'
          )
          @elseif($skondisi == 2)
          @include(
          'pages.mentor.kursus.views.submenutema.include.readings'
          )
          @endif
        </div>
        <!-- /.card -->

      </div>
      @else
      <!-- left column -->
  
      <div class="col-md-7">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title">Data Kuis</h4>
          </div>
          <!-- /.card-header -->
          @include(
          'pages.mentor.kursus.views.tablekuis'
          )
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-5">
        <!-- Form Element sizes -->
        <div class="card card-success">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title">Inputkan Kuis</h4>
          </div>
          <div class="card-body">
            @if($kondisi == 0)
            <form class="form-horizontal" method="POST"
              action="{{ route('mentor.kursus.views.sub-menu-tema.kuis.save', [$id]) }}"
              enctype="multipart/form-data">
              @elseif($kondisi == 1)
              <form class="form-horizontal" method="POST"
                action="{{ route('mentor.kursus.views.sub-menu-tema.kuis.update', [$idedit]) }}"
                enctype="multipart/form-data">
                @method('put')
                @endif
                @csrf
                <div class="card-body">
                  <div>
                    <label>Judul</label>
                    <div>
                      <input type="text" name="judul"
                      class="form-control form-control-lg @error('judul') is-invalid @enderror"
                      placeholder="Enter Judul kuis" value="{{ $kondisi == 1 ? $edit->judul_kuis : old('judul')  }}">
                      @error('judul')
                      <span class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  @if($kondisi == 0)
                  <div>
                    <label>Menit</label>
                    <div>
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
                    <div>
                      <label>Deskripsi</label>
                      <div>
                        <textarea name="deskripsi"
                          class="form-control form-control-lg summernote @error('deskripsi') is-invalid @enderror"
                          rows="8" placeholder="Enter Deskripsi"></textarea>
                        @error('deskripsi')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    @elseif($kondisi == 1)
                    <div>
                      <label>Status</label>
                      <div>
                        <select name="status_kuis" class="form-control form-control-lg @error('status_sub_kursus') is-invalid @enderror">
                          <option value="0" {{ $edit->status_kuis == 0 ? 'selected' : '' }}>Active</option>
                          <option value="1" {{ $edit->status_kuis == 1 ? 'selected' : '' }}>NoActive</option>
                        </select>
                        @error('status_sub_kursus')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    @endif
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button type="button" class="btn btn-default float-right">Cancel</button>
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