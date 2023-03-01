<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'title' => 'Home'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan', [
            'title' => 'Pengaduan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'isi_pengaduan' => 'required',
            'tgl_pengaduan' => 'required',
            'foto' => 'required|max:10240',
        ],[
            'judul.required' => 'Judul harus diisi',
            'isi_pengaduan.required' => 'Pengaduan harus diisi',
            'tgl_pengaduan.required' => 'Tanggal pengaduan harus diisi',
            'foto.required' => 'foto harus diisi',
            'foto.max' => 'Foto tidak boleh lebih dari 10mb',
        ]);

        $foto = $request->file('foto');
        $validasi['foto'] = $foto->storeAs('public/img', $foto->hashName());


        $validasi['id_user'] = auth()->user()->id;

        Pengaduan::create($validasi);

        return redirect('/pengaduansaya');
    }

    public function pengaduanSaya()
    {
        return view('laporanSaya', [
            'title' => 'Pengaduan Saya',
            'pengaduans' => Pengaduan::where('id_user', auth()->user()->id)->with('user')->latest()->paginate(10),
            'status' => 'semua',
        ]);
    }

    public function belum()
    {
        return view('laporanSaya', [
            'title' => 'Pengaduan Saya',
            'status' => 'belum',
            'pengaduans' =>  Pengaduan::where('id_user', auth()->user())->orWhere('status', '0')->latest()->with('user')->paginate(10),
        ]);
    }
    public function proses()
    {
        return view('laporanSaya', [
            'title' => 'Pengaduan Saya',
            'status' => 'proses',
            'pengaduans' =>  Pengaduan::where('id_user', auth()->user())->orWhere('status', 'proses')->latest()->with('user')->paginate(10),
        ]);
    }
    public function selesai()
    {
        return view('laporanSaya', [
            'title' => 'Pengaduan Saya',
            'status' => 'selesai',
            'pengaduans' =>  Pengaduan::where('id_user', auth()->user())->orWhere('status', 'selesai')->latest()->with('user')->paginate(10),
        ]);
    }


    public function semuaPengaduan()
    {
        return view('semuaLaporan', [
            'title' => 'Semua Pengaduan',
            'pengaduans' => Pengaduan::latest()->with('user')->filter(request(['search']))->with('user')->paginate(5),
        ]);
    }

    public function home() {
        return view('home', [
            'title' => 'Home',
            'pengaduans' => Pengaduan::latest()->paginate(4),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan-detail', [
            'title' => 'Pengaduan detail',
            'pengaduan' => $pengaduan,
            'tanggapans' => Tanggapan::where('id_pengaduan', $pengaduan->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
