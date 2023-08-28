@extends('adminlte::page')
@section('title', 'List Daftar Paket')
@section('content_header')
<h1 class="font-weight-bold">List Daftar Paket</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('daftar_paket.create')}}" class="btn btn-primary mb-2">Tambah <i
                        class="fas fa-plus-square"></i></a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr style="background-color:#6495ED">
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>ID Paket Wisata</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga Paket</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_paket as $key => $dpaket)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$dpaket->nama_paket}}</td>
                            <td id={{$key+1}}>{{$dpaket->fpaket_wisata->id}}</td>
                            <td>{{$dpaket->jumlah_peserta}}</td>
                            <td>{{$dpaket->harga_paket}}</td>
                            <td>
                                <a href="{{route('daftar_paket.edit', $dpaket)}}"
                                    class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('daftar_paket.destroy', $dpaket)}}"
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
    if (confirm('Apakah anda yakin akan menghapus data ? ')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>