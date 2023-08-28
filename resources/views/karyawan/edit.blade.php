@extends('adminlte::page')
@section('title', 'Edit Karyawan')
@section('content_header')
<h1 class="font-weight-bold">Edit Karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.update', $karyawan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_user">Nama Karyawan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{$karyawan->fuser->id ??old('id_user')}}">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Pilih nama karyawan" id="name" name="name"
                                value="{{$karyawan->fuser->name ?? old('name')}}" aria-label=" ID User"
                                ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea rows="3" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                            {{$karyawan->alamat ?? old('alamat') }}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp"> No Telepon</label>
                        <input type="text" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan No Telepon" name="no_hp"
                            value="{{$karyawan->no_hp ?? old('no_hp') }}">
                        @error('no_hp')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan</label>
                        <select class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputlevel"
                            placeholder="Pilih Jabatan" name="jabatan">
                            <option value="administrasi" @if(old('level', $karyawan->jabatan)=='administrasi')selected @endif>Admin</option>
                            <option value="operator" @if(old('level', $karyawan->jabatan)=='operator' )selected @endif>Operator</option>
                            <option value="pemilik" @if(old('level', $karyawan->jabatan)=='pemilik' )selected @endif>Pemilik</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('karyawan.index') }}" class="btn btn-default">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        @stop
        @push('js')
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