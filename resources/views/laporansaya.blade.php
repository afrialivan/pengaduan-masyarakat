@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/animasi.css">
@endsection

@section('container')
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{ $status == 'semua' ? 'text-primary' : 'text-dark' }}" href="/pengaduansaya">Semua</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'belum' ? 'text-primary' : 'text-dark' }}" href="/belum">Belum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'proses' ? 'text-primary' : 'text-dark' }}" href="/proses">Proses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'selesai' ? 'text-primary' : 'text-dark' }}" href="/selesai">Selesai</a>
        </li>
    </ul>
    @foreach ($pengaduans as $pengaduan)
        <div class="row">
            <div class="col-1">
                <img src="img/profil.png" alt="" class="d-lg-block d-none" style="width: 50px; height: 50px;">
            </div>
            <div class="col-12 col-lg-11">
                <p class="fs float-end">Status : {{ $pengaduan->status == '0' ? 'belum diproses' : $pengaduan->status }}</p>
                <p class="h4 fw-bold mb-0">{{ $pengaduan->user->nama }}</p>
                <p>{{ $pengaduan->tgl_pengaduan }}</p>
                <p class="h4 mb-0">{{ $pengaduan->judul }}</p>
                <p class="mb-0 isi_laporan">{{ $pengaduan->isi_pengaduan }}</p>
                <a style="cursor: pointer" class="readmore text-decoration-none">Lihat semua</a>
                @if ($pengaduan->foto)
                    <img src="{{ $pengaduan->foto }}" class="d-block mt-3 foto-kejadian" alt=""
                        style="width: 100px; height: 100px;">
                @endif
                <div class="d-flex justify-content-end">
                    <a href="/pengaduan-detail/{{ $pengaduan->id }}">
                        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="hover"
                            colors="primary:#121331,secondary:#66d7ee" style="width:70px;height:70px;">
                        </lord-icon>
                    </a>
                </div>
                <hr>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-end">
        {{ $pengaduans->links() }}
    </div>
    <div class="modal fade mt-5" id="exampleModal{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/editprofil" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name"
                                value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control"
                                value="{{ auth()->user()->username }}" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ auth()->user()->nik }}"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nomor Telepon</label>
                            <input type="text" name="tlp" class="form-control" value="{{ auth()->user()->tlp }}"
                                id="recipient-name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
