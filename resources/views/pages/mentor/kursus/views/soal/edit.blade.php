@extends('layouts.othertempdash')

@section('content')
@include('pages.mentor.home.include.banner')
@include('pages.mentor.home.include.navbar')
<!-- Content Header (Page header) -->
<section class="popular-courses-area courses-page" style="padding: 20px 20px 20px 20px;">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Edit Soal</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Soal</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <form action="{{ route('mentor.kursus.views.kuis.soal.update', [base64_encode($data->id_soal)]) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <label>Nomor Soal<span style="color:red">*</span></label>
      <input name='no_soal' type='number' class='form-control' placeholder='Enter Nomor Soal' required="required" value="{{ $data->no_soal }}">
      @error('no_soal')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
      <label>Soal<span style="color:red">*</span></label>
      <textarea name="content" class="form-control" cols="30" rows="10" required="required">{!! $data->content !!}</textarea>
      @error('content')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
      <label>Skor<span style="color:red">*</span></label>
      <input name='skor_soal' type='number' class='form-control' placeholder='Enter Skor' required="required" value="{!! $data->skor_soal !!}">
      @error('skor_soal')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
      <div>
        <label>Status</label>
        <div>
          <select name="status_soal" class="form-control form-control-lg @error('status_sub_kursus') is-invalid @enderror">
            <option value="0" {{ $data->status_soal == 0 ? 'selected' : '' }}>Active</option>
            <option value="1" {{ $data->status_soal == 1 ? 'selected' : '' }}>NoActive</option>
          </select>
          @error('status_soal')
          <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
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