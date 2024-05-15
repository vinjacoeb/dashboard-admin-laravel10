@extends('adminlte.layouts.app')
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Music</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Music</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
         <div class="container-fluid">
         <div class="card">
         <div class="card-header text-right">
            <a href="{{ route('createArtikel') }}" class="btn btn-primary" role="button">Tambah Music</a>
        </div>
    <div class="card-body p-0">
        <table class="table table-hover table-bordered" id="data-table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama Genre</th>
                <th>Judul</th>
                <th>Artist</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($artikels as $artikel)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><img src="{{ asset('storage/artikels/' . $artikel->gambar) }}" width="50" height="50"></td>
                <td>{{ $artikel->kategori->nama_kategori }}</td>
                <td>{{ $artikel->judul }}</td>
                <td>{!! $artikel->deskripsi !!}</td>
                <td>
                    <a href="{{route('editArtikel', ['id' => $artikel->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                    <a onclick="confirmDelete(this)"
                    data-url="{{ route('deleteArtikel', ['id' => $artikel->id]) }}"
                    class="btn btn-danger btn-sm" role="button">Hapus</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
@endsection