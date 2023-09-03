@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')
<h1 class="font-weight-bold">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paket_wisata.update', $paket_wisata)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan Nama Paket" name="nama_paket"
                            value="{{$paket_wisata->nama_paket ?? old('nama_paket') }}">
                        @error('nama_paket')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea rows="4" class="form-control
    @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Fasilitas" name="deskripsi"
                            >{{$paket_wisata->deskripsi ?? old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <textarea rows="4" class="form-control
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Masukkan Fasilitas" name="fasilitas"
                            >{{$paket_wisata->fasilitas ?? old('fasilitas') }}</textarea>
                        @error('fasilitas')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="itinerary">Itinerary</label>
                        <textarea rows="5" class="form-control
    @error('itinerary') is-invalid @enderror" id="itinerary" placeholder="Masukkan Fasilitas" name="itinerary"
                            >{{$paket_wisata->itinerary ?? old('itinerary') }}</textarea>
                        @error('itinerary')
                        <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" class="form-control @error('diskon') is-invalid @enderror" 
                            id="diskon" placeholder="Masukkan Diskon" name="diskon"
                            value="{{$paket_wisata->diskon ?? old('diskon') }}">
                        @error('diskon') <span class="textdanger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto1">Foto 1</label>
                        @if ($paket_wisata->foto1)
                        <p>Previous File: <a
                            href="{{ asset('/storage/foto1/' . $paket_wisata->foto1) }}"
                            target="_blank">{{ $paket_wisata->foto1 }}</a></p>
                            @endif
                        <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input type="file" class="form-control" id="foto1" enctype="multipart/form-data" name="foto1" onchange="validateFile(this,  'fileError1');">
                        <div class="invalid-feedback" id="fileError1" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto1') <span class="invalid" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto2">Foto 2</label>
                        @if ($paket_wisata->foto2)
                        <p>Previous File: <a
                            href="{{ asset('/storage/foto2/' . $paket_wisata->foto2) }}"
                            target="_blank">{{ $paket_wisata->foto2 }}</a></p>
                            @endif
                        <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input type="file" class="form-control" id="foto2" enctype="multipart/form-data" name="foto2" onchange="validateFile(this, 'fileError2');">
                        <div class="invalid-feedback" id="fileError2" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto2') <span class="invalid" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto3">Foto 3</label>
                        @if ($paket_wisata->foto3)
                        <p>Previous File: <a
                            href="{{ asset('/storage/foto3/' . $paket_wisata->foto3) }}"
                            target="_blank">{{ $paket_wisata->foto3 }}</a></p>
                            @endif
                            <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input type="file" class="form-control" id="foto3" enctype="multipart/form-data" name="foto3" onchange="validateFile(this, 'fileError3');">
                        <div class="invalid-feedback" id="fileError3" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto3') <span class="invalid" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto4">Foto 4</label>
                        @if ($paket_wisata->foto4)
                        <p>Previous File: <a
                            href="{{ asset('/storage/foto4/' . $paket_wisata->foto4) }}"
                            target="_blank">{{ $paket_wisata->foto4 }}</a></p>
                            @endif
                            <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input type="file" class="form-control" id="foto4" enctype="multipart/form-data" name="foto4" onchange="validateFile(this, 'fileError4');">
                        <div class="invalid-feedback" id="fileError4" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto4') <span class="invalid" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto5">Foto 5</label>
                        @if ($paket_wisata->foto5)
                        <p>Previous File: <a
                            href="{{ asset('/storage/foto5/' . $paket_wisata->foto5) }}"
                            target="_blank">{{ $paket_wisata->foto5 }}</a></p>
                            @endif
                            <small class="form-text text-muted">Allow file extensions : .jpeg .jpg .png</small>
                        <input type="file" class="form-control" id="foto5" enctype="multipart/form-data" name="foto5" onchange="validateFile(this, 'fileError5');">
                        <div class="invalid-feedback" id="fileError5" style="display: none;">Tipe file tidak valid. Harap unggah file dengan ekstensi yang diizinkan.</div>
                        @error('foto5') <span class="invalid" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('paket_wisata.index') }}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
        function validateFile(input, errorElementId) {
            const allowedExtensions = ['.jpeg', '.jpg', '.png'];
            const fileInput = input.files[0];
            const fileErrorElement = document.getElementById(errorElementId);
    
            if (fileInput) {
                const fileName = fileInput.name;
                const fileExtension = '.' + fileName.split('.').pop().toLowerCase();
    
                if (!allowedExtensions.includes(fileExtension)) {
                    fileErrorElement.style.display = 'block';
                    input.classList.add('is-invalid');
                    input.value = ''; // Clear the input
                } else {
                    fileErrorElement.style.display = 'none';
                    input.classList.remove('is-invalid');
                }
            }
        }
    </script>
    

    @endpush