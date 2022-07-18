<div class="container">
  <br>
  @if(@count($data) > 0)
  <form action="{{ route('mentor.kursus.views.sub-menu-tema.audios.update', [base64_encode($data->id_audios)]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form action="{{ route('mentor.kursus.views.sub-menu-tema.audios.save', [$id]) }}" method="POST" enctype="multipart/form-data">
      @endif

      @csrf
      <p>
        Kondisi
      </p>
      <select name="kondisi" class="form-control" id="mySelect" onchange="myFunction()">
        @if(@count($data) > 0)
        <option value="0"  {{ $data->kondisi_audios == 0 ? "selected='selected'" : "" }}>Link</option>
        <option value="1" {{ $data->kondisi_audios == 1 ? "selected='selected'" : "" }}>File</option>
        @else
        <option value="">[pilih]</option>
        <option value="0">Link</option>
        <option value="1">File</option>
        @endif

      </select>
      @if(@count($data) > 0)
      <p>
        Audio saat ini
      </p>

      <audio controls>
        @if($data->kondisi_audios == 0)
        <source src="{{ $data->file_audio }}" type="audio/mpeg">
        <source src="{{ $data->file_audio }}" type="audio/ogg">
        @elseif($data->kondisi_audios == 1)
        <source src="{{ asset('/assets/dist/audios/'.$data->file_audio)}}" type="audio/mpeg">
        <source src="{{ asset('/assets/dist/audios/'.$data->file_audio)}}" type="audio/mp3">
        <source src="{{ asset('/assets/dist/audios/'.$data->file_audio) }}" type="audio/ogg">
        @endif
      </audio>
      <div>
        <label>Status</label>
        <div>
          <select name="status_audio" class="form-control form-control-lg @error('status_sub_kursus') is-invalid @enderror">
            <option value="0" {{ $data->status_audio == 0 ? 'selected' : '' }}>Active</option>
            <option value="1" {{ $data->status_audio == 1 ? 'selected' : '' }}>NoActive</option>
          </select>
          @error('status_sub_kursus')
          <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
      </div>
      @endif
      <p>
        File
      </p>
      <p id="content"></p>
      <p>
        Content
      </p>
      @if(@count($data) > 0)
      <textarea name="content" class="form-control" cols="30" rows="10">{{ $data->content }}</textarea>
      @else
      <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
      @endif

      <br>
      <button class="btn btn-info">Submit</button>

    </form>
    <br>
    <script>
      @if (@count($data) > 0)
        function myFunction() {
        var x = document.getElementById("mySelect").value;
        if (x == 0) {
          document.getElementById("content").innerHTML = "<input name='file' type='text' class='form-control' placeholder='Enter Link' value='{{ $data->file_audio  }}'>";
        } else if (x == 1) {
          document.getElementById("content").innerHTML = "<input name='file' type='file' class='form-control'>";
        } else if (x == "") {
          document.getElementById("content").innerHTML = "";
        }

      }
      @else
        function myFunction() {
        var x = document.getElementById("mySelect").value;
        if (x == 0) {
          document.getElementById("content").innerHTML = "<input name='file' type='text' class='form-control' placeholder='Enter Link'>";
        } else if (x == 1) {
          document.getElementById("content").innerHTML = "<input name='file' type='file' class='form-control'>";
        } else if (x == 99) {
          document.getElementById("content").innerHTML = "";
        }

      }
      @endif

    </script>
  </div>