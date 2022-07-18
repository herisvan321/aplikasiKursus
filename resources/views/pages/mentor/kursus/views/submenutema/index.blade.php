@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Data Sub Menu Tema</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Sub Menu Tema</li>
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
      <!-- left column -->
      <div class="col-md-7">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title">Data Sub Menu Tema</h4>
          </div>
          <!-- /.card-header -->
          @include('pages.mentor.kursus.views.tablesubmenutema')
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-5">
        <!-- Form Element sizes -->
        <div class="card card-success">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title">Inputkan Sub Menu</h4>
          </div>
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('mentor.kursus.views.sub-menu-tema.save', [$id]) }}"
              enctype="multipart/form-data">
              @csrf
              <div>
                <div>
                  <label>Judul</label>
                  <div>
                    <input type="text" name="judul"
                    class="form-control form-control-lg @error('judul') is-invalid @enderror"
                    placeholder="Enter sub menu tema">
                    @error('judul')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div>
                  <label>Menit</label>
                  <div>
                    <select name="menit" class="form-control">
                      @for($i=1; $i <= 120; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                      </select>
                      @error('menit')
                      <span class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div>
                    <label>Pilih</label>
                    <div>
                      <select name="kondisi" class="form-control">
                        <option value="0">Video</option>
                        <option value="1">Audio</option>
                        <option value="2">Reading</option>
                        <option value="3">Kuis</option>
                      </select>
                      @error('kondis')
                      <span class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div>

</section>
<!-- /.content -->
@endsection