@extends('adminlte::page')
@section('title', 'Profil Pelanggan')
@section('content_header')
<style>
    

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        margin-left: 70px; /* Tambahkan margin kiri untuk memberi jarak antara form dan foto */
    }

    .form-label {
        flex: 1;
        margin-right: 10px;
    }

    .form-input {
        flex: 3;
    }

    .form-input.input-group {
        display: flex;
        flex-direction: column; /* Mengubah arah tata letak ke vertikal (atas ke bawah) */
        align-items: center; /* Memusatkan elemen dalam .form-input.input-group */
    }

    .form-input.input-group input,
    .form-input.input-group button {
        flex: auto; /* Biarkan elemen input dan button menyesuaikan lebar */
        margin-bottom: 10px; /* Tambahkan jarak antara input dan button */
    }
</style>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($pelanggan)
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title-bold">Detail Profil</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/Foto Pelanggan/' . $pelanggan->foto_pelanggan) }}" alt="Foto Pengguna" class="img-fluid">
                            </div>
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class='form-label'>Nama Lengkap</label>
                                    <div class="form-input">
                                    : &nbsp; &nbsp;{{ $pelanggan->fuser->name }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class='form-label'>No Telepon</label>
                                    <div class="form-input">
                                    : &nbsp; &nbsp;{{ $pelanggan->no_hp }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class='form-label'>Alamat</label>
                                    <div class="form-input">
                                    : &nbsp; &nbsp;{{ $pelanggan->alamat }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                    
                </div>
            @else
                <div class="alert alert-danger">
                    Data profil pelanggan tidak ditemukan.
                </div>
            @endif
        </div>
    </div>
@stop
