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
                <td>{{ $key + 1 }}</td>
                <td>{{ $dat->judul_sub_kursus }}
                </td>
                <td>{{ $dat->status_sub_kursus == 0 ? 'Active' : 'No Active' }}</td>
                <td><a href="{{ route('kursus.sub.edit', [base64_encode($dat->id_sub_kursus), $id]) }}"
                    class="btn btn-block btn-success btn-sm">Edit</button></td>
                <td><a href="{{ route('kursus.sub.add.menu', [base64_encode($dat->id_sub_kursus)]) }}"
                    class="btn btn-block btn-info btn-sm">({{ $dat->jml_menu }})Add Menu</button></td>

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