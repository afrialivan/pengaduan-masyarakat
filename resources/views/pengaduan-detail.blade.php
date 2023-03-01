@extends('layouts.main')


@section('container')

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

    @endif

@endsection
