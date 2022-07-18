@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
    <!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Edit Data Tema</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Tema</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="card" >
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Data Tema</h3>
                        </div>
                        <!-- /.card-header -->
                        @include('pages.mentor.kursus.views.table')
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-5">
                    <!-- Form Element sizes -->
                    <div class="card card-primary">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title">Edit Menu</h4>
                        </div>
                        <div class="card-body">
                            <form class="" method="POST" action="{{ route('mentor.kursus.views.update.tema', [$idedit]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                    <div >
                                        <label>Judul</label>
                                        <div>
                                            <input type="text" name="judul"
                                                class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                                placeholder="Enter Judul tema" value="{{  $edit->judul_data_tema}}">
                                            @error('judul')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div >
                                        <label>Status</label>
                                        <div>
                                            <select name="status_tema" class="form-control form-control-lg @error('status_data_tema') is-invalid @enderror">
                                                <option value="0" {{ $edit->status_data_tema == 0 ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ $edit->status_data_tema == 1 ? 'selected' : '' }}>NoActive</option>
                                            </select>
                                            @error('status_data_tema')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /.card-body -->
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
