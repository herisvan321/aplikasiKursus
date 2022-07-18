@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Data Soal</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Soal</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <p>
      <a href="{{ route('mentor.kursus.views.kuis.soal.input', [ $id ]) }}" class="btn btn-primary">Tambahkan Soal</a>
    </p>
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header bg-primary text-white">
            <h4 class="card-title">Soal pada kuis ini</h4>
          </div>
          <!-- /.card-header -->

          @include('pages.mentor.kursus.views.tablesoal')
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (left) -->

    </div>
    <!-- /.row -->
  </div>

</section>
<!-- /.content -->
@endsection