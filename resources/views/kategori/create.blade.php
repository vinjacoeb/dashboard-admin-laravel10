@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Genre</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Genre</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
         <div class="container mt-5">
         <div class="card">
    <div class="card-body">
        <form action="{{ route('storeKategori') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Genre</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required="required" placeholder="Masukkan nama kategori">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required="required" placeholder="Masukkan deskripsi kategori"></textarea>
            </div>

            <div class="text-right">
                <a href="{{ route('daftarKategori') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
@endsection