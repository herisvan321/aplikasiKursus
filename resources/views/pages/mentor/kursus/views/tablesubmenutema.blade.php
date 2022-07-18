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
                <td>{!! $dat->judul_sub_menu_tema." <br><b>".$dat->menit."</b> menit" !!}
                </td>
                <td>{{ $dat->status_sub_menu_tema == 0 ? 'Active' : 'No Active' }}</td>
                <td><a href="{{ route('mentor.kursus.views.sub-menu-tema.edit', [$id, base64_encode($dat->id_sub_menu_tema)]) }}"
                        class="btn btn-block btn-success btn-sm">Edit</a>
                    <a href="{{ route('mentor.kursus.views.sub-menu-tema.content', [base64_encode($dat->id_sub_menu_tema)]) }}"
                        class="btn btn-block btn-info btn-sm">View{{ "($dat->count)" }}</a>
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
