@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
    <!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Edit Menu Sub Kursus</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Sub Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
    <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="card" >
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title">Data Sub Kursus</h4>
                        </div>
                        <!-- /.card-header -->
                        @include('pages.mentor.kursus.submenu.table')
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-5">
                    <!-- Form Element sizes -->
                    <div class="card card-primary">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title">Inputkan Menu</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('mentor.kursus.menu.update', [base64_encode($edit->id_sub_menu_kursus)]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                              
                                    <div class="">
                                        <label >Judul</label>
                                        <div >
                                            <input type="text" name="judul"
                                                class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                                placeholder="Enter sub menu" value="{{ $edit->judul_sub_menu_kursus }}">
                                            @error('judul')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
    <div>
                                        <label >Status</label>
                                        <div>
                                            <select name="status_sub_menu_kursus" class="form-control form-control-lg @error('status_sub_kursus') is-invalid @enderror">
                                                <option value="0" {{ $edit->status_sub_menu_kursus == 0 ? 'selected' : '' }}>Active</option>
                                                <option value="1" {{ $edit->status_sub_menu_kursus == 1 ? 'selected' : '' }}>NoActive</option>
                                            </select>
                                            @error('status_sub_kursus')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
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