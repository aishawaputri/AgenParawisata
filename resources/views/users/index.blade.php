@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
<h1 class="font-weight-bold">List User</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body ">
                <div class="card-body">
                    <a href="{{route('users.create')}}" class="btn btn-primary mb-2">Tambah <i
                            class="fas fa-plus-square"></i></a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color:#6495ED">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $us)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                <td id={{$key+1}}>
                                    @if($us->level == 'admin') 
                                    Admin
                                    @elseif($us->level == 'operator')
                                    Operator
                                    @elseif($us->level == 'pemilik')
                                    Pemilik
                                    @else
                                    Pelanggan
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('users.edit', $us)}}" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="{{route('users.destroy', $us)}}"
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
    @endpush