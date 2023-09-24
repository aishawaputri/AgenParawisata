@extends('adminlte::page')
@section('title', 'Tambah Data reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Data reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->pelanggan->id}}">
                    <div class="form-group">
                        <label for="id_daftar_paket">Nama Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket" value="{{old('id_daftar_paket')}}">
                            <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="Cari Nama Paket" 
                                id="nama_paket" name="nama_paket" value="{{old('nama_paket')}}" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari1"
                                data-bs-target="#staticBackdrop1"></i>
                                Cari
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi</label>
                        <input type="date" class="form-control @error('tgl_reservasi_wisata') is-invalid @enderror" 
                            id="tgl_reservasi_wisata" name="tgl_reservasi_wisata" value="{{old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number " class="form-control @error('jumlah_peserta') is-invalid @enderror" 
                            id="jumlah_peserta"  name="jumlah_peserta" value="{{old('jumlah_peserta')}}" readonly>
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control @error('harga_paket') is-invalid @enderror" 
                            id="harga_paket" name="harga_paket" value="{{old('harga_paket')}}" readonly>
                        @error('harga_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                            <input type="text" class="form-control @error('diskon') is-invalid @enderror" 
                            id="diskon" name="diskon" value="{{old('diskon')}}"readonly>
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
 
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="text" class="form-control @error('nilai_diskon') is-invalid @enderror" 
                            id="nilai_diskon"  name="nilai_diskon" value="{{old('nilai_diskon')}}" readonly>
                        @error('nilai_diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="text" class="form-control
@error('total_bayar') is-invalid @enderror" id="total_bayar" usaceholder="Masukan Total Bayar" name="total_bayar"
                            value="{{old('total_bayar')}}" readonly>
                        @error('total_bayar') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_bukti_tf" class="form-label">Bukti Transfer</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input class="form-control @error('file_bukti_tf') is-invalid @enderror" type="file"
                            id="file_bukti_tf" name="file_bukti_tf" enctype="multipart/form-data" onchange="previewImage()">
                        @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary usus">Simpan</button>
                    <a href="{{route('reservasi.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdrousabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrousabel1">Pencarian Data ID Daftar Paket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="examuse3">
                        <thead>
                            <tr style="background-color: #2176ff;" >
                                <th > No. </th>
                                <th >Nama Paket</th>
                                <th >Jumlah Peserta</th>
                                <th >Harga Paket</th>
                                <th >Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_paket as $key => $dpaket)
                            <tr>
                                <td id={{$key+1}}>{{$key+1}}</td>
                                <td>{{$dpaket->fpaket_wisata->nama_paket}}</td>
                                <td>{{$dpaket->jumlah_peserta}}</td>
                                <td>{{$dpaket->harga_paket}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih1('{{$dpaket->id}}', '{{$dpaket->fpaket_wisata->nama_paket}}','{{$dpaket->harga_paket}}', '{{number_format($dpaket->fpaket_wisata->diskon* 100)}}%', '{{$dpaket->jumlah_peserta}}')"
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
    $('#examuse2').DataTable({
        "responsive": true,
    });

    //Fungsi pilih untuk memilih data paket wisata dan mengirimkan data paket wisata dari Modal ke form tambah
    function pilih1(id, nama_paket, harga_paket,diskon,jumlah_peserta) {
        var hargaAwal = parseFloat(harga_paket.replace(/[^0-9.-]+/g,""));
    var diskonPercentage = parseFloat(diskon.replace(/[^0-9.-]+/g,""));
    var nilaiDiskon = (hargaAwal * diskonPercentage / 100).toFixed(3);
    var totalBayar = (hargaAwal - nilaiDiskon).toFixed(3);


        document.getElementById('id_daftar_paket').value = id;
        document.getElementById('nama_paket').value = nama_paket;
        document.getElementById('harga_paket').value = harga_paket

    document.getElementById('diskon').value = diskon;
    document.getElementById('jumlah_peserta').value = jumlah_peserta;
    document.getElementById('nilai_diskon').value = nilaiDiskon
    document.getElementById('total_bayar').value = totalBayar

    }



    // Fitur Untuk Preview Image
    function previewImage() {
        const file_bukti_tf = document.querySelector('#file_bukti_tf');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.disusay = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(file_bukti_tf.files[0]);

        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
    @endpush