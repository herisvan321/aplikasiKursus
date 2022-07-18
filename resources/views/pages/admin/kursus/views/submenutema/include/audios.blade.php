<div class="container">
    <br>
        @if(@count($data) > 0)
            <form action="{{ route('kursus.views.sub-menu-tema.audios.save', [base64_encode($data->id_audios)]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{ route('kursus.views.sub-menu-tema.audios.save', [$id]) }}" method="POST" enctype="multipart/form-data">
        @endif
   
        @csrf
        <p>Kondisi </p>
        <select name="kondisi" class="form-control" id="mySelect" onchange="myFunction()" >
            @if(@count($data) > 0)
                <option value="0"  {{ $data->kondisi == 0 ? "selected='selected'" : "" }}>Link</option>
                <option value="1" {{ $data->kondisi == 1 ? "selected='selected'" : "" }}>File</option>
            @else
                <option value="99" >[pilih]</option>
                <option value="0">Link</option>
                <option value="1">File</option>
            @endif
            
        </select>
        @if(@count($data) > 0)
           <p><Audio></Audio> saat ini</p>
           
                <audio controls>
                    @if($data->kondisi == 0)
                    <source src="{{ $data->file_audio }}" type="audio/mpeg">
                        <source src="{{ $data->file_audio }}" type="audio/ogg">
                    @elseif($data->kondisi == 1)
                        <source src="{{ asset('/data/tema/'. $data->file_audio) }}" type="audio/mpeg">
                        <source src="{{ asset('/data/tema/'. $data->file_audio) }}" type="audio/ogg">
                    @endif
                </audio>
          
        @endif
        <p>File</p>
        <p id="content"></p>
        <p>Content</p>
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
        @if(@count($data) > 0)
        function myFunction() {
            var x = document.getElementById("mySelect").value;
            if (x == 0) {
                document.getElementById("content").innerHTML = "<input name='file' type='text' class='form-control' placeholder='Enter Link'> value='{{ $data->file_video }}'";
            } else if(x == 1) {
                document.getElementById("content").innerHTML = "<input name='file' type='file' class='form-control'>";
            }else if(x == 99) {
                document.getElementById("content").innerHTML = "";
            }

        }
        @else
        function myFunction() {
            var x = document.getElementById("mySelect").value;
            if (x == 0) {
                document.getElementById("content").innerHTML = "<input name='file' type='text' class='form-control' placeholder='Enter Link'>";
            } else if(x == 1) {
                document.getElementById("content").innerHTML = "<input name='file' type='file' class='form-control'>";
            }else if(x == 99) {
                document.getElementById("content").innerHTML = "";
            }

        }
        @endif
        
    </script>
</div>
