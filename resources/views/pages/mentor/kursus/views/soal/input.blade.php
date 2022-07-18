@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Input Soal</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Input Soal</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    @if(@count($data) > 0)
    <form action="{{ route('mentor.kursus.views.sub-menu-tema.readings.update', [base64_encode($data->id_readings)]) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @else
      <form action="{{ route('mentor.kursus.views.kuis.soal.save', [$id]) }}" method="POST" enctype="multipart/form-data">
        @endif

        @csrf
        <label>Nomor Soal<span style="color:red">*</span></label>
        <input name='no_soal' type='number' class='form-control' placeholder='Enter Nomor Soal' required="required">
        @error('no_soal')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
        <label>Media</label>
        <input name="media_soal" type='file' class='form-control' placeholder='Enter Link'>
        <label>Soal<span style="color:red">*</span></label>
        <textarea name="content" class="form-control" cols="30" rows="10" required="required"></textarea>
        @error('content')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
        <label>Jumlah Jawaban<span style="color:red">*</span></label>
        <select name="jml_jawaban" class="form-control" onchange="myFunction()" id="mySelect" required="required">
          <option value="">[pilih]</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        @error('jml_jawaban')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
        <label>Jawaban<span style="color:red">*</span></label>
        <p id="jawaban"></p>

        <label>Skor<span style="color:red">*</span></label>
        <input name='skor_soal' type='number' class='form-control' placeholder='Enter Skor' required="required">
        @error('skor_soal')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
        <p>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
         <!-- <button type="reset" class="btn btn-default">Clear</button>-->
        </p>
        <p>
          <span style="color:red">*</span> Wajib diisi
        </p>
      </div>
    </form>
  </section>
  <!-- /.content -->
  <script>
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      if (x == 5) {
        document.getElementById("jawaban").innerHTML = "<select name='jawaban' class='form-control' required='required'><option value=''>[pilih]</option><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option><option value='e'>e</option></select>";
      } else if (x == 4) {
        document.getElementById("jawaban").innerHTML = "<select name='jawaban' class='form-control' required='required'><option value=''>[pilih]</option><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option></select>";
      } else if (x == 3) {
        document.getElementById("jawaban").innerHTML = "<select name='jawaban' class='form-control' required='required'><option value=''>[pilih]</option><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option></select>";
      } else if (x == 2) {
        document.getElementById("jawaban").innerHTML = "<select name='jawaban' class='form-control' required='required'><option value=''>[pilih]</option><option value='a'>a</option><option value='b'>b</option></select>";
      } else if (x == 1) {
        document.getElementById("jawaban").innerHTML = "<select name='jawaban' class='form-control' required='required'><option value=''>[pilih]</option><option value='a'>a</option></select>";
      }

    }

  </script>
  @endsection