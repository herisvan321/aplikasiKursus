<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No Soal</th>
      <th>Media</th>
      <th>Jawaban</th>
      <th>Jumlah Jawaban</th>
      <th>Skor Soal</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $key => $dat)
    <tr>
      <td>{!! $dat->no_soal !!}</td>
      <td>
        @if(empty($dat->type_media))
        Tidak ada media
        @else
        {{ $dat->type_media  }}
        @endif
      </td>
      <td>{!! $dat->jawaban !!}</td>
      <td>{!! $dat->jml_jawaban !!}</td>
      <td>{!! $dat->skor_soal !!}</td>
      <td>{{ $dat->status_soal == 0 ? 'Active' : 'No Active' }}</td>
      <td><a href="{{ route('mentor.kursus.views.kuis.soal.edit', [base64_encode($dat->id_soal)]) }}"
        class="btn btn-block btn-success btn-sm">Edit</a>
        <a href="{{ route('mentor.kursus.views.kuis.soal.show', [base64_encode($dat->id_soal)]) }}"
          class="btn btn-block btn-info btn-sm">View</a>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>No Soal</th>
        <th>Media</th>
        <th>Jawaban</th>
        <th>Jumlah Jawaban</th>
        <th>Skor Soal</th>
        <th>Status</th>
        <th></th>
      </tr>
    </tfoot>
  </table>