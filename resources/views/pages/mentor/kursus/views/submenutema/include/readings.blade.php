<div class="container">
  <br>
  @if(@count($data) > 0)
  <form action="{{ route('mentor.kursus.views.sub-menu-tema.readings.update', [base64_encode($data->id_readings)]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form action="{{ route('mentor.kursus.views.sub-menu-tema.readings.save', [$id]) }}" method="POST" enctype="multipart/form-data">
      @endif

      @csrf
      <p>
        Kondisi
      </p>
      <select name="kondisi" class="form-control" id="mySelect" onchange="myFunction()">
        @if(@count($data) > 0)
        <option value="0"  {{ $data->kondisi_readings == 0 ? "selected='selected'" : "" }}>Link</option>
        <option value="1" {{ $data->kondisi_readings == 1 ? "selected='selected'" : "" }}>File</option>
        @else
        <option value="">[pilih]</option>
        <option value="0">Link</option>
        <option value="1">File</option>
        @endif

      </select>
      @if(@count($data) > 0)
      <p>
        File saat ini
      </p>
        @if($data->kondisi_readings == 0)
        <a href="{{ $data->file_reading }}" target="_blank">Buka</a>
        @elseif($data->kondisi_readings == 1)
        <a href="{{ route('mentor.kursus.views.sub-menu-tema.readings.download', [base64_encode($data->id_readings)]) }}">Download</a>

        @endif
      <div>
        <label>Status</label>
        <div>
          <select name="status_readings" class="form-control form-control-lg @error('status_sub_kursus') is-invalid @enderror">
            <option value="0" {{ $data->status_readings == 0 ? 'selected' : '' }}>Active</option>
            <option value="1" {{ $data->status_readings == 1 ? 'selected' : '' }}>NoActive</option>
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
          document.getElementById("content").innerHTML = "<input name='file' type='text' class='form-control' placeholder='Enter Link' value='{{ $data->file_reading  }}'>";
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