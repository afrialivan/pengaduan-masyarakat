@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="../../css/deleteButton.css">
@endsection

@section('dashboard')
    <div class="row mt-4">
        <div class="col-1">
            <img src="../../img/profil.png" alt="" style="width: 50px; height: 50px;">
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

            <div class="d-flex justify-content-end" style="gap: 10px">

                @if ($pengaduan->status == '0')
                    <form action="/dashboard/proses-laporan/{{ $pengaduan->id }}" method="POST">
                        @csrf
                        <button type="submit" class="noselect proses mb-1"><span class="text">proses</span>
                            <span class="icon" style="color: white">
                                <i class="bi bi-hourglass-split"></i>
                            </span>
                        </button>
                    </form>
                @endif
                @if ($pengaduan->status == 'proses')
                    <form action="/dashboard/laporan-selesai/{{ $pengaduan->id }}">
                        <button class="noselect selesai"><span class="text">Selesai</span>
                            <span class="icon" style="color: white">
                                <i class="fa-solid fa-check"></i>
                            </span>
                        </button>
                    </form>
                @endif
                <div class="d-flex justify-content-end" style="gap: 10px">
                    @if ($pengaduan->status == 'selesai')
                        <form action="/dashboard/proses-laporan/{{ $pengaduan->id }}" method="POST">
                            @csrf
                            <button class="noselect batal mb-1"><span class="text">Batal</span>
                                <span class="icon" style="color: black">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </form>
                    @endif
                    <form action="/dahboard/laporan/hapus/{{ $pengaduan->id }}">
                        <button class="noselect"><span class="text">Delete</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @if ($pengaduan->status == 'proses')
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Tanggapan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanggapans as $tanggapan)
                        <tr class="">
                            <td>
                                {{ $tanggapan->isi_tanggapan }}
                                <hr>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form class="mb-5" action="/tanggapi/{{ $pengaduan->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="isi_tanggapan" rows="3"></textarea>
            </div>
            <button class="btn btn-outline-primary">
                Tanggapi
            </button>
        </form>
    @endif

@endsection
