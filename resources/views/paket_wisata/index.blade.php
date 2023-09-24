@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="font-weight-bold">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <a href="{{route('paket_wisata.create')}}" class="btn btn-primary mb-2">Tambah <i
                        class="fas fa-plus-square"></i></a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr style="background-color:#6495ED">
                            <th>ID</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Itinerary</th>
                            <th>Diskon</th>
                            <th>Foto </th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th>
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
                                <img src="storage/Foto 1/{{$pwisata->foto1}}" alt="{{$pwisata->foto1}} tidak tampil"
                                class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/Foto 2/{{$pwisata->foto2}}" alt="{{$pwisata->foto2}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/Foto 3/{{$pwisata->foto3}}" alt="{{$pwisata->foto3}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/Foto 4/{{$pwisata->foto4}}" alt="{{$pwisata->foto4}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <img src="storage/Foto 5/{{$pwisata->foto5}}" alt="{{$pwisata->foto5}} tidak tampil"
                                    class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('paket_wisata.edit',$pwisata)}}"
                                    class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('paket_wisata.destroy',$pwisata)}}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">Delete
                            </td>
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