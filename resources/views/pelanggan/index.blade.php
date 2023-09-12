@extends('adminlte::page')
@section('title', 'List Pelanggan')
@section('content_header')
<h1 class="font-weight-bold">List Pelanggan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('pelanggan.create')}}" class="btn btn-primary mb-2">Tambah <i
                        class="fas fa-plus-square"></i></a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr style="background-color:#6495ED">
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $key => $pelanggan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pelanggan->fuser->name}}</td>
                            <td>{{$pelanggan->no_hp}}</td>
                            <td>{{$pelanggan->alamat}}</td>
                            <td>
                                <img src="storage/Foto Pelanggan/{{$pelanggan->foto_pelanggan}}" alt="{{$pelanggan->foto_pelanggan}} tidak tampil"
                                class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('pelanggan.destroy', $pelanggan)}}"
                                onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)"
                                class="btn btn-danger btn-xs">
                                Delete
                            </a>
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
@endpush