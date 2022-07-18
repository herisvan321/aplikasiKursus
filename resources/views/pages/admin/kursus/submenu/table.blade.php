<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kondisi</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $dat)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $dat->judul_sub_menu_kursus }}
                </td>
                <td>
                    @if ($dat->kondisi_sub_menu_kursus == 0)
                        Text
                    @elseif($dat->kondisi_sub_menu_kursus == 1)
                        Themes
                    @elseif($dat->kondisi_sub_menu_kursus == 2)
                        Forum
                    @elseif($dat->kondisi_sub_menu_kursus == 3)
                        Message
                    @elseif($dat->kondisi_sub_menu_kursus == 4)
                        Ratings
                    @elseif($dat->kondisi_sub_menu_kursus == 5)
                        File
                    @elseif($dat->kondisi_sub_menu_kursus == 6)
                        Sub
                    @endif
                </td>
                <td>{{ $dat->status_sub_menu_kursus == 0 ? 'Active' : 'No Active' }}</td>
                <td><a href="{{ route('kursus.menu.edit', [base64_encode($dat->id_sub_menu_kursus), $id]) }}"
                        class="btn btn-block btn-success btn-sm">Edit</button></td>
                <td><a href="{{ route('kursus.views', [base64_encode($dat->id_sub_menu_kursus)]) }}"
                        class="btn btn-block btn-info btn-sm">View{{ $kondisi ? '' == 1 ? "($dat->count)" : "" }}</button></td>
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
