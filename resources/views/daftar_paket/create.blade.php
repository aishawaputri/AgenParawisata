@extends('adminlte::page')
@section('title', 'Tambah Daftar')
@section('content_header')
<h1 class="font-weight-bold">Tambah Daftar Paket</h1>
@stop
@section('content')
<form action="{{route('daftar_paket.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_paket_wisata">Nama Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="{{old('id_paket_wisata')}}">
                            <input type="text" class="form-control
                    @error('name') is-invalid @enderror" placeholder="Pilih Nama Paket" id="name" name="name"
                                value="{{old('name')}}" arialabel="ID User" aria-describedby="cari">
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop">Cari</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror"
                            id="jumlah_peserta" placeholder="Masukan Jumlah Peserta" name="jumlah_peserta"
                            value="{{old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control @error('harga_paket') is-invalid @enderror"
                            id="harga_paket" placeholder="Masukan Harga Paket Wisata" name="harga_paket"
                            value="{{old('harga_paket')}}">
                        @error('harga_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('daftar_paket.index')}}" class="btnbtn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Paket Wisata</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket_wisata as $key => $pwisata)
                            @if ($pwisata->status === '0')
                            <tr>
                                <td>{{$pwisata->nama_paket}}</td>
                                <td>{{$pwisata->deskripsi}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" 
                                        onclick="pilih('{{$pwisata->id}}', '{{$pwisata->nama_paket}}')"
                                        data-bs-dismiss="modal" style="display: inline-block; line-height: normal; vertical-align: middle;">
                                        Pilih </button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
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