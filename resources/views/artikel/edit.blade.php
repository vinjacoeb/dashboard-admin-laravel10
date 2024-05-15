@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Music</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Music</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('updateArtikel', ['id' => $artikel->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="deskripsi">Nama Genre</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required="required">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control" name="gambar" disabled>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">JUDUL</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            name="judul" value="{{ old('judul', $artikel->judul) }}"
                            placeholder="Masukkan Judul Artikel">

                        <!-- error message untuk title -->
                        @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">ARTIST</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                            placeholder="Masukkan Nama Artist">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>

                        <!-- error message untuk content -->
                        @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="{{ route('daftarArtikel') }}" class="btn btn-outline-secondary mr-2"
                        role="button">Batal</a>
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>

                </form>
            </div>
        </div>
    </div>
</div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
@endsection