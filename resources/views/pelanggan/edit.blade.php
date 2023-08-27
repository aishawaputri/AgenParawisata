@extends('adminlte::page')
@section('title', 'Edit Pelanggan')
@section('content_header')
<h1 class="font-weight-bold">Edit Pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.update', $pelanggan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control
@error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Masukkan Nama Paket" name="nama_lengkap"
                            value="{{$pelanggan->nama_lengkap ?? old('nama_lengkap') }}">
                        @error('nama_lengkap')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
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
@error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{old('alamat')}}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto" class="form-label">Foto </label>
                        @if($pelanggan->foto)
                        <img src="{{ asset('storage/'. $pelanggan->foto) }}"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @endif
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
                            name="foto" value="{{$pelanggan->foto ?? old('foto')}}" onchange="previewImage()">
                        @error('foto') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user"
                                value="{{$pelanggan->fuser->id ??old('id_user')}}">
                            <input type="text" class="form-control
@error('name') is-invalid @enderror" placeholder="ID User" id="name" name="name"
                                value="{{$pelanggan->fuser->name ?? old('name')}}" aria-label=" ID User"
                                ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data User</button>
                        </div>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aktif</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->level}}</td>
                                <td>{{$user->aktif}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih('{{$user->id}}', '{{$user->name}}')" data-bs-dismiss="modal">
                                        Pilih </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
    function previewImage() {
        const foto = document.querySelector('#foto');
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