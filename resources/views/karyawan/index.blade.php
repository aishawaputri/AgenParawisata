@extends('adminlte::page')
@section('title', 'List Karyawan')
@section('content_header')
<h1 class="font-weight-bold">List Karyawan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('karyawan.create')}}" class="btn btn-success mb-2">Tambah <i
                        class="fas fa-plus-square"></i></a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr style="background-color:#6495ED">
                            <th>No.</th>
                            <th>Nama Karyawan</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Jabatan</th>
                            <th>ID User</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $key => $karyawan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$karyawan->nama_karyawan}}</td>
                            <td>{{$karyawan->alamat}}</td>
                            <td>{{$karyawan->no_hp}}</td>
                            <td>{{$karyawan->jabatan}}</td>
                            <td id={{$key+1}}>{{$karyawan->fuser->name}}</td>
                            <td>
                                <a href="{{route('karyawan.edit', $karyawan)}}" class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('karyawan.destroy', $karyawan)}}"
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