@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr style="background-color:#6495ED">
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
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
                            <td id={{$key+1}}>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$rv->pelanggan->fuser->name}}</td>
                            <td id={{$key+1}}>{{$rv->dpaket->fpaket_wisata->nama_paket}}</td>
                            <td id={{$key+1}}> {{date_format( new DateTime($rv->tgl_reservasi_wisata), 'd F Y')}}</td>
                            <td id={{$key+1}}>{{$rv->harga_paket}}</td>
                            <td id={{$key+1}}>{{$rv->jumlah_peserta}}</td>
                            <td id={{$key+1}}>{{number_format($rv->diskon* 100)}}%</td>
                            <td id={{$key+1}}> {{$rv->nilai_diskon}}</td>
                            <td id={{$key+1}}>{{$rv->total_bayar}}</td>
                            <td id={{$key+1}}>
                                @if($rv->file_bukti_tf === null)
                                Belum menyertakan bukti pembayaran.
                                @else
                                <img src="storage/Bukti Transfer/{{$rv->file_bukti_tf}}" alt="{{$rv->file_bukti_tf}} tidak tampil"
                                    class="img-thumbnail">
                                @endif
                            </td>
                            <td id={{$key+1}}>
                                @if ($rv->status_reservasi_wisata === 'bayar')
                                Dibayar
                                @elseif ($rv->status_reservasi_wisata === 'selesai')
                                Selesai
                                @elseif ($rv->status_reservasi_wisata === null)
                                Pesan 
                                @endif
                            </td>
                            <td id={{$key+1}}>
                                <a href="{{route('reservasi.edit', $rv)}}" class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('reservasi.destroy', $rv)}}"
                                    onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-danger btn-xs">Delete</a>
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

function notificationBeforeDelete(event, el) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus data reservasi ? ')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush