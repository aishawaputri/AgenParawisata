@extends('adminlte::page')
@section('title', 'Edit Pelanggan')
@section('content_header')
<h1 class="font-weight-bold">Edit Pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.update', $pelanggan->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName" placeholder="Nama lengkap" name="name"
                            value="{{$pelanggan->fuser->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Telepon</label>
                        <input type="text" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan No Telepon" name="no_hp"
                            value="{{$pelanggan->no_hp ?? old('no_hp') }}">
                        @error('no_hp')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea rows="4" class="form-control
@error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{$pelanggan->alamat ?? old('alamat') }}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_pelanggan" class="form-label">Foto </label>
                        
                        @if($pelanggan->foto_pelanggan)
                        <img src="{{ asset('storage/Foto Pelanggan'. $pelanggan->foto_pelanggan) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @endif
                        <small class="form-text text-muted">Allow file extensions : &nbsp; .jpeg .jpg .png</small>
                        <input class="form-control @error('foto_pelanggan') is-invalid @enderror" type="file" id="foto_pelanggan"
                            name="foto_pelanggan" value="{{$pelanggan->foto_pelanggan ?? old('foto_pelanggan')}}" onchange="previewImage()" >
                        <div class="invalid-feedback" id="fileError4" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto_pelanggan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>    
    <!-- Modal -->
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
    function previewImage() {
        const foto = document.querySelector('#foto_pelanggan');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(foto.files[0]);

        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

    function pilih(id, bstud) {
        document.getElementById('id_user').value = id
        document.getElementById('name').value = bstud
    }
    </script>
    @endpush