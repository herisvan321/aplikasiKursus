@extends('layouts.othertempdash')

@section('content')
<section class="event-details-area section-gap">
  <div class="container">
    @include('pages.include.pesan')
    <div class="row">
      <div class="col-lg-4 event-details-right">
        @include('pages.other.dashboard.include.menuTema')
      </div>
      <div class="col-lg-8 event-details-left">
        @if($kondisi == 0)
        <div class="main-img">
          <img class="img-fluid" src="{{ asset('assets/dist/img/'.$data->kursus->image)  }}" alt="" style="width: 100%; height: 450px;">
        </div>
        <div class="details-content">
          <br>
          <h1>{{ $data->judul_data_tema }}</h1>
          <a href="#">
            <h4>Kursus: {{ $data->subkursus->judul_sub_kursus }}</h4>
          </a>
          <p>
            <b>Deskripsi: </b>
            {!! $data->subkursus->deskripsi !!}

          </p>

        </div>
        <a href="{{ route("other.dashboard.step", [base64_encode($diddatatema), "intro"])  }}" class="btn btn-primary ">next >></a>
        @elseif($kondisi == 1)
        @if($skondisi == 0)
        @if(@count($data->sub) > 0)
        @if($data->sub->kondisi_videos == 0)
        <iframe src="{{ $data->sub->file_video }}" frameborder="0" height="350" width="500"></iframe>
        @endif
        <br>
        {{  $data->sub->content }}
        @else
        <center>Data masih belum ada!</center>
        @endif
        @elseif($skondisi == 1)
        @if(@count($data->sub) > 0)
        @if($data->sub->kondisi_audio == 0)
        <audio controls>
          @if($data->sub->kondisi_audios == 0)
          <source src="{{ $data->sub->file_audio }}" type="audio/mpeg">
          <source src="{{ $data->sub->file_audio }}" type="audio/ogg">
          @elseif($data->sub->kondisi_audios == 1)
          <source src="{{ asset('/assets/dist/audios/'.$data->sub->file_audio)}}" type="audio/mpeg">
          <source src="{{ asset('/assets/dist/audios/'.$data->sub->file_audio)}}" type="audio/mp3">
          <source src="{{ asset('/assets/dist/audios/'.$data->sub->file_audio) }}" type="audio/ogg">
          @endif

        </audio>
        @endif
        <br>
        {{  $data->sub->content }}
        @else
        <center>Data masih belum ada!</center>
        @endif
        @elseif($skondisi == 2)
        @if(@count($data->sub) > 0)
        ada
        @else
        <center>Data masih belum ada!</center>
        @endif
        @elseif($skondisi == 3)
        @if(@count($data->sub) > 0)
        <table>
          <tr>
            <td align="top"><b>Title</b></td>
            <td align="top">:</td>
            <td>{{ $data->sub->judul_kuis }}</td>
          </tr>
          <tr>
            <td align="top"><b>Description</b></td>
            <td align="top">:</td>
            <td>{!! $data->sub->deskripsi !!}</td>
          </tr>
          <tr>
            <td align="top"><b>Time</b></td>
            <td align="top">:</td>
            <td>{!! $data->sub->menit !!} menit</td>
          </tr>
        </table>
        <br><br>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Mulai Kuis</a>
        <!-- <a href="#" class="btn btn-info">Preview</a>-->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kuis</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4>Apakah anda yakin</h4>
                <p>Untuk memulai kuis sekarang?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ route("other.dashboard.konfirmasi.kuis", [base64_encode($data->sub->id_kuis)]) }}" class="btn btn-primary">Mulai</a>
              </div>
            </div>
          </div>
        </div>
        @else
        <center>Data masih belum ada!</center>
        @endif
        @endif
        <br>
        <br>
        <br>
        <a href="{{ route("other.dashboard.step", [base64_encode($didsubmenutema), "next"])  }}" class="btn btn-primary ">next >></a>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection