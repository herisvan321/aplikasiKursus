@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sub Kursus</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Jumlah Sub</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $dat)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $dat->judul }}
                      </td>
                      <td>{{ $dat->status_kursus == 0 ?'Active' : 'No Active' }}</td>
                      <td><b>{{ $dat->sub_kursus }}</b></td>
                      <td><a href="{{ route("kursus.edit", [base64_encode($dat->id_kursus)]) }}" class="btn btn-block btn-success btn-sm">Edit</button></td>
                      <td><a href="{{ route("kursus.sub.add", [base64_encode($dat->id_kursus)]) }}" class="btn btn-block btn-warning btn-sm">Add Sub</button></td>
                    </tr>
                    @endforeach          
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Jumlah Sub</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
