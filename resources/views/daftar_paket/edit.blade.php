@extends('adminlte::page')
@section('title', 'Edit Daftar Paket')
@section('content_header')
<h1 class="font-weight-bold">Edit Daftar Paket</h1>
@stop
@section('content')
<form action="{{route('daftar_paket.update', $daftar_paket)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan Nama Paket" name="nama_paket"
                            value="{{$daftar_paket->nama_paket ?? old('nama_paket') }}">
                        @error('nama_paket')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_paket_wisata">ID Paket Wisata</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata"
                                value="{{$daftar_paket->fpaket_wisata->id ??old('id_paket_wisata')}}">
                            <input type="text" class="form-control
@error('name') is-invalid @enderror" placeholder="ID Paket Wisata" id="name" name="name"
                                value="{{$daftar_paket->fpaket_wisata->name ?? old('name')}}" aria-label=" ID User"
                                ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Paket</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Masukkan No Telepon"
                            name="jumlah_peserta" value="{{$daftar_paket->jumlah_peserta ?? old('jumlah_peserta') }}">
                        @error('jumlah_peserta')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control
@error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Masukkan harga_paket" name="harga_paket"
                            value="{{$daftar_paket->harga_paket ?? old('harga_paket') }}">
                        @error('jumlah_peserta')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('daftar_paket.index') }}" class="btn btn-default">
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
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Fasilitas</th>
                                <th>Itinerary</th>
                                <th>Diskon</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket_wisata as $key => $pwisata)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pwisata->nama_paket}}</td>
                                <td>{{$pwisata->deskripsi}}</td>
                                <td>{{$pwisata->fasilitas}}</td>
                                <td>{{$pwisata->itinerary}}</td>
                                <td>{{$pwisata->diskon}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih('{{$pwisata->id}}', '{{$pwisata->name}}')"
                                        data-bs-dismiss="modal">
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
        document.getElementById('id_paket_wisata').value = id
        document.getElementById('name').value = bstud
    }
    </script>
    @endpush