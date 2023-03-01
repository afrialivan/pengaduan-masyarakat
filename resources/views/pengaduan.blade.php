@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/pengaduan.css">
@endsection

@section('container')

<img src="img/pengaduan.svg" class="m-auto d-block" style="width: 300px" alt="">

    <div class="kotak bg-second px-3 py-3 m-auto rounded">
        <span class="w-100 d-flex bg text-light mb-4 fs-4 justify-content-center py-2">Pengaduan anda</span>
        <form action="/pengaduan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="judul" id="judul" placeholder="q" value="{{ old('judul') }}">
                <label for="judul">Judul Pengaduan</label>
            </div>
            @error('judul')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="form-floating mb-3">
                <textarea class="form-control" name="isi_pengaduan" id="isi_pengaduan" placeholder="q" style="height: 200px">{{ old('isi_pengaduan') }}</textarea>
                <label for="isi_pengaduan">Isi Pengaduan</label>
            </div>
            @error('isi_pengaduan')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="tgl_pengaduan" id="tgl_pengaduan" placeholder="q" value="{{ old('tgl_pengaduan') }}">
                <label for="tgl_pengaduan">Tanggal Kejadian</label>
            </div>
            @error('tgl_pengaduan')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto Pengaduan</label>
                <input class="form-control" name="foto" type="file" id="formFile">
            </div>
            @error('foto')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Kirim</button>
            </div>
        </form>
    </div>
@endsection
