<div class="container">
    <br>
        @if(@count($data) > 0)
            <form action="{{ route('kursus.views.sub-menu-tema.audios.save', [base64_encode($data->id_audios)]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{ route('kursus.views.sub-menu-tema.audios.save', [$id]) }}" method="POST" enctype="multipart/form-data">
        @endif
   
        @csrf
        
    </form>
    <br>
</div>
