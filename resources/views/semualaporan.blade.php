@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/animasi.css">
@endsection

@section('container')
    <form action="">
        <div class="mb-3 d-flex justify-content-center">
            <input name="search" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Cari pengaduan">
            <button type="submit" class="btn btn-primary px-1 py-1">
                <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover"
                    colors="primary:#ffffff,secondary:#000000" stroke="75" style="width:30px;height:30px">
                </lord-icon>
            </button>
        </div>
    </form>


    @foreach ($pengaduans as $pengaduan)
        <div class="row">
            <div class="col-1">
                <img src="img/profil.png" class="d-lg-block d-none" alt="" style="width: 50px; height: 50px;">
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

    <div class="d-flex justify-content-end mb-4">
        {{ $pengaduans->links() }}
    </div>
@endsection
