@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pelanggan">ID Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan"
                                value="{{$reservasi->fpelanggan->id_pelanggan ??old('id_pelanggan')}}">
                            <input type="text" class="form-control
@error('nama_lengkap') is-invalid @enderror" placeholder="ID Pelanggan" id="nama_lengkap" name="nama_lengkap"
                                value="{{$reservasi->fpelanggan->nama_lengkap ??old('nama_lengkap')}}"
                                arialabel="Bidang Studi" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data ID Pelanggan</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_daftar_paket">ID Daftar Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket"
                                value="{{$reservasi->fdpaket->id_daftar_paket ??old('id_daftar_paket')}}">
                            <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" placeholder="ID Daftar Paket" id="nama_paket" name="nama_paket"
                                value="{{$reservasi->fdpaket->nama_paket ??old('nama_paket')}}" arialabel="Bidang Studi"
                                aria-describedby="cari1" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari1"
                                data-bs-target="#staticBackdrop1"></i>
                                Cari Data ID Daftar Paket</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi</label>
                        <input type="date" class="form-control
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal reservasi"
                            name="tgl_reservasi_wisata"
                            value="{{$reservasi-> tgl_reservasi_wisata?? old('tgl_reservasi_wisata') }}">
                        @error('tgl_reservasi_wisata')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga"> Harga</label>
                        <input type="text" class="form-control
@error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" name="harga"
                            value="{{$reservasi->harga ?? old('harga') }}">
                        @error('harga')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta"> Jumlah Peserta</label>
                        <input type="text" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Masukkan Jumlah Peserta"
                            name="jumlah_peserta" value="{{$reservasi->jumlah_peserta ?? old('jumlah_peserta') }}">
                        @error('jumlah_peserta')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Masukkan Diskon" name="diskon"
                            value="{{$reservasi->diskon ?? old('diskon') }}">
                        @error('diskon')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="text" class="form-control
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Masukkan Nilai Dsikon" name="nilai_diskon"
                            value="{{$reservasi->nilai_diskon ?? old('nilai_diskon') }}">
                        @error('nilai_diskon')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="text" class="form-control
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Masukkan Total Bayar" name="total_bayar"
                            value="{{$reservasi->total_bayar ?? old('total_bayar') }}">
                        @error('total_bayar')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file_bukti_tf" class="form-label">Bukti Transfer</label>
                        @if($reservasi->file_bukti_tf)
                        <img src="{{ asset('storage/'.$reservasi->file_bukti_tf) }}"
                            class="img-preview3 img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                        <img class="img-preview3 img-fluid mb-3 col-sm-5 d-block">
                        @endif
                        <input class="form-control @error('file_bukti_tf') is-invalid @enderror" type="file"
                            id="file_bukti_tf" name="file_bukti_tf"
                            value="{{$reservasi->file_bukti_tf ?? old('file_bukti_tf')}}" onchange="previewImage3()">
                        @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_reservasi_wisata">Status Reservasi</label>
                        <select class="form-control @error('status_reservasi_wisata') is-invalid @enderror"
                            id="status_reservasi_wisata" name="status_reservasi_wisata">
                            <option value="Pesan" @if(old('status_reservasi_wisata')=='Pesan' )selected @endif>
                                Pesan</option>
                            <option value="Dibayar" @if(old('status_reservasi_wisata')=='Dibayar' )selected @endif>
                                Dibayar</option>
                            <option value="Selesai" @if(old('status_reservasi_wisata')=='Selesai' )selected @endif>
                                Selesai</option>
                        </select>
                        @error('status_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('reservasi.index') }}" class="btn btn-default">
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data ID Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                <tr>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>ID User</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $key => $pelanggan)
                                <tr>
                                    <td>{{$pelanggan->id}}</td>
                                    <td>{{$pelanggan->nama_lengkap}}</td>
                                    <td>{{$pelanggan->no_hp}}</td>
                                    <td>{{$pelanggan->alamat}}</td>
                                    <td id={{$key+1}}>{{$pelanggan->fuser->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs"
                                            onclick="pilih('{{$pelanggan->id}}', '{{$pelanggan->nama_lengkap}}')"
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

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
            arialabelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data ID Daftar Paket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example3">
                            <thead>
                                <tr style="background-color: #2176ff">
                                    <th style="color: white">Id Daftar Paket</th>
                                    <th style="color: white">Nama Paket</th>
                                    <th style="color: white">Jumlah Peserta</th>
                                    <th style="color: white">Harga Paket</th>
                                    <th style="color: white">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftar_paket as $key => $dpaket)
                                <tr>
                                    <td>{{$dpaket->id}}</td>
                                    <td>{{$dpaket->nama_paket}}</td>
                                    <td>{{$dpaket->jumlah_peserta}}</td>
                                    <td>{{$dpaket->harga_paket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs"
                                            onclick="pilih1('{{$dpaket->id}}', '{{$dpaket->nama_paket}}')"
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

        //Fungsi pilih untuk memilih data pelanggan dan mengirimkan data pelanggan dari Modal ke form tambah
        function pilih(id, bstud1) {
            document.getElementById('id_pelanggan').value = id
            document.getElementById('nama_lengkap').value = bstud1
        }

        $('#example3').DataTable({
            "responsive": true,
        });

        //Fungsi pilih untuk memilih data paket wisata dan mengirimkan data paket wisata dari Modal ke form tambah
        function pilih1(id, bstud2) {
            document.getElementById('id_daftar_paket').value = id
            document.getElementById('nama_paket').value = bstud2
        }

        // Fitur Untuk Preview Image
        function previewImage() {
            const file_bukti_tf = document.querySelector('#file_bukti_tf');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(file_bukti_tf.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        </script>
        @endpush