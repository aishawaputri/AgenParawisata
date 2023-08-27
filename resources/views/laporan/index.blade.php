@extends('adminlte::page')
@section('title', 'Laporan')
@section('content_header')
<h1 class="m-0 text-dark">Laporan Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body">
                <a href="{{ url('generateLaporan') }}" target="_blank" class="btn btn-primary mb-2">
                    Buat PDF
                </a>
                <div class="card-body ">
                    <form method="get" action="{{ route('search') }}" class="form-inline">
                        <div class="form-group mb-2">
                            <label for="start" class="">Tanggal Reservasi</label>
                            <input type="date" class="form-control" id="start" name="start"
                                placeholder="Tanggal Reservasi" value="{{ old('start') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="status_reservasi_wisata" class="">Status Reservasi:</label>
                            <select class="form-control" id="status_reservasi_wisata" name="status_reservasi_wisata">
                                <option value="">-- Pilih Status --</option>
                                <option value="pesan">Pesan</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Filter</button>
                    </form>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color:#6495ED">
                                <th>No.</th>
                                <th>ID Pelanggan</th>
                                <th>ID Daftar Paket</th>
                                <th>Tanggal Reservasi</th>
                                <th>Harga</th>
                                <th>Jumlah Peserta</th>
                                <th>Diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Total Bayar</th>
                                <th>Bukti Transfer</th>
                                <th>Status Reservasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi as $key => $rv)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$rv->fpelanggan->id}}</td>
                                <td id={{$key+1}}>{{$rv->fdpaket->id}}</td>
                                <td>{{$rv->tgl_reservasi_wisata}}
                                </td>
                                <td>{{$rv->harga}}</td>
                                <td>{{$rv->jumlah_peserta}}</td>
                                <td>{{$rv->diskon}}</td>
                                <td>{{$rv->nilai_diskon}}</td>
                                <td>{{$rv->total_bayar}}</td>
                                <td>
                                    <img src="storage/{{$rv->file_bukti_tf}}" alt="{{$rv->file_bukti_tf}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td>
                                    @switch($rv->status_reservasi_wisata)
                                    @case('Pesan')
                                    Pesan
                                    @break
                                    @case('Dibayar')
                                    Dibayar
                                    @break
                                    @case('Selesai')
                                    Selesai
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    </script>
    @endpush