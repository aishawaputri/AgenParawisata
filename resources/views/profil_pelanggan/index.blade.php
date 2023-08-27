@extends('adminlte::page')
@section('title', 'List pelanggan')
@section('content_header')
<h1 class="font-weight-bold">Profil pelanggan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <!-- <div class="p-2">
                <a href="{{route('profil_pelanggan.edit', $pelanggan->id)}}" class="btn btn-primary mb-2">
                    Edit Profil
                </a>
            </div> -->
        </div>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="storage/{{$pelanggan->foto}}" alt="{{$pelanggan->foto}} tidak tampil"
                        class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table class="table mb-3">
                            <thead>
                                <tr>
                                    <td class="font-weight-bold">Nama lengkap</td>
                                    <td>:</td>
                                    <td>{{$pelanggan->nama_lengkap}}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">No Telepon</th>
                                    <td>:</td>
                                    <td>{{$pelanggan->no_hp}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{$pelanggan->alamat}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col card-header text-right">
                        <a href="{{route('profil_pelanggan.edit', $pelanggan)}}"
                            class="btn btn-primary plus float-right">Edit
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop