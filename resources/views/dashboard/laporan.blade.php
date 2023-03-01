@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="../../css/deleteButton.css">
    <link rel="stylesheet" href="../../css/cetak.css">
@endsection

@section('dashboard')
    <ul class="nav justify-content-center mt-3 accordion mb-3">
        <li class="nav-item">
            <a class="nav-link {{ $status == 'semua' ? 'text-primary' : 'text-dark' }}" href="/dashboard/laporan">Semua</a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'belum' ? 'text-primary' : 'text-dark' }}" href="/dashboard/belum">Belum</a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'proses' ? 'text-primary' : 'text-dark' }}" href="/dashboard/proses">Proses</a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'selesai' ? 'text-primary' : 'text-dark' }}"
                href="/dashboard/selesai">Selesai</a>
            <hr>
        </li>
    </ul>
    <form action="">
        <div class="mb-3 d-flex justify-content-center">
            <input name="search" type="text" class="form-control" id="exampleFormControlInput1"
                placeholder="Cari pengaduan">
            <button type="submit" class="btn btn-primary px-1 py-1">
                <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover"
                    colors="primary:#ffffff,secondary:#000000" stroke="75" style="width:30px;height:30px">
                </lord-icon>
            </button>
        </div>
    </form>
    <form action="/cetak" method="GET" class="mt">
        @csrf
        <button class="buttonn border-0" type="submit">
            <div class="button-wrapper">
                <div class="text">Download</div>
                <span class="icon">
                    <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" height="2em" width="2em"
                        role="img" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17"
                            stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor"
                            fill="none"></path>
                    </svg>
                </span>
            </div>
        </button>
    </form>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-1">No</th>
                    <th scope="col" class="col-2">Nama</th>
                    <th scope="col" class="col-2">Tanggal</th>
                    <th scope="col" class="col-2">Judul</th>
                    <th scope="col" class="col-3">Pengaduan</th>
                    <th scope="col" class="col-1">Status</th>
                    <th scope="col" class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduans as $pengaduan)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengaduan->user->nama }}</td>
                        <td>{{ $pengaduan->tgl_pengaduan }}</td>
                        <td>{{ $pengaduan->judul }}</td>
                        <td>
                            <p class="isi_laporan">
                                {{ $pengaduan->isi_pengaduan }}
                            </p>
                            <a style="cursor: pointer" class="text-decoration-none d-block readmore">Lihat Semua</a>
                        </td>
                        <td>{{ $pengaduan->status == '0' ? 'belum diproses' : $pengaduan->status }}</td>
                        <td>
                            <div class="d-grid flex-wrap">
                                @if ($pengaduan->status == '0')
                                    <button class="noselect proses mb-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><span class="text">Proses</span>
                                        <span class="icon" style="color: white">
                                            <i class="bi bi-hourglass-split"></i>
                                        </span>
                                    </button>
                                @endif
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
                                <form action="/dashboard/laporan-detail/{{ $pengaduan->id }}">
                                    <button class="noselect lihat mb-1"><span class="text">Lihat</span>
                                        <span class="icon" style="color: white">
                                            <i class="bi bi-info-circle"></i>
                                        </span>
                                    </button>
                                </form>
                                <form action="/dahboard/laporan/hapus/{{ $pengaduan->id }}">
                                    <button class="noselect"><span class="text">Hapus</span>
                                        <span class="icon" style="color: white">
                                            <i class="bi bi-trash3"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center fs-3">
                                    Ingin melakukan proses?
                                </div>
                                <div class="modal-footer">
                                    <form action="/dashboard/proses-laporan/{{ $pengaduan->id }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidaak</button>
                                        <button type="submit" class="btn btn-primary">Iyaa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mb-3 mt-3">
        {{ $pengaduans->links() }}
    </div>
@endsection
