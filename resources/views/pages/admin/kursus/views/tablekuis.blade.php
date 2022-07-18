<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $dat)
            <tr>
                <td>{{ $key + 1  }}</td>
                <td>{!! $dat->judul_kuis." <br><b>".$dat->waktu."</b> menit" !!}
                </td>
                <td>{{ $dat->status_kuis == 0 ? 'Active' : 'No Active' }}</td>
                <td><a href="{{ route('kursus.menu.edit', [base64_encode($dat->id_kuis), $id]) }}"
                        class="btn btn-block btn-success btn-sm">Edit</button></td>
                <td><a href="{{ route('kursus.views.sub-menu-tema.content', [base64_encode($dat->id_kuis)]) }}"
                        class="btn btn-block btn-info btn-sm">View{{ "($dat->count)" }}</button></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Status</th>
            <th></th>
        </tr>
    </tfoot>
</table>
