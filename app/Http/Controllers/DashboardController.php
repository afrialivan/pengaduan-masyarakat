<?php

namespace App\Http\Controllers;

use App\Exports\pengaduansExport;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporan', [
            'title' => 'laporan',
            'status' => 'semua',
            'pengaduans' => Pengaduan::latest()->with('user')->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function belum()
    {
        return view('dashboard.laporan', [
            'status' => 'belum',
            'title' => 'laporan',
            'pengaduans' =>  Pengaduan::where('status', '0')->latest()->with('user')->filter(request(['search']))->paginate(10),
        ]);
    }

    public function proses()
    {
        return view('dashboard.laporan', [
            'status' => 'proses',
            'title' => 'laporan',
            'pengaduans' =>  Pengaduan::where('status', 'proses')->latest()->with('user')->filter(request(['search']))->paginate(10),
        ]);
    }
    public function selesai()
    {
        return view('dashboard.laporan', [
            'status' => 'selesai',
            'title' => 'laporan',
            'pengaduans' =>  Pengaduan::where('status', 'selesai')->latest()->with('user')->filter(request(['search']))->paginate(10),
        ]);
    }

    public function prosesLaporan(Pengaduan $pengaduan)
    {

        Pengaduan::where('id', $pengaduan->id)->update([
            'judul' => $pengaduan->judul,
            'id_user' => $pengaduan->id_user,
            'isi_pengaduan' => $pengaduan->isi_pengaduan,
            'foto' => $pengaduan->foto,
            'tgl_pengaduan' => $pengaduan->tgl_pengaduan,
            'status' => 'proses',
        ]);

        return redirect('/dashboard/laporan');
    }

    public function laporanSelesai(Pengaduan $pengaduan)
    {

        Pengaduan::where('id', $pengaduan->id)->update([
            'judul' => $pengaduan->judul,
            'id_user' => $pengaduan->id_user,
            'isi_pengaduan' => $pengaduan->isi_pengaduan,
            'foto' => $pengaduan->foto,
            'tgl_pengaduan' => $pengaduan->tgl_pengaduan,
            'status' => 'selesai',
        ]);

        return redirect('/dashboard/laporan');
    }


    public function users()
    {
        return view('dashboard.users', [
            'title' => 'user',
            'users' => User::latest()->paginate(10)
        ]);
    }

    public function ubahUser(User $user, Request $request)
    {


        User::where('id', $user->id)->update([
            'nik' => $user->nik,
            'nama' => $user->nama,
            'username' => $user->username,
            'password' => $user->password,
            'tlp' => $user->tlp,
            'level' => $request->level,
        ]);

        return redirect('/dashboard/users');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pengaduan $pengaduan)
    {
        $validasi = $request->validate([
            'isi_tanggapan' => 'required'
        ]);

        $validasi['id_petugas'] = auth()->user()->id;
        $validasi['id_pengaduan'] = $pengaduan->id;
        $validasi['tgl_tanggapan'] =  date('Y-m-d H:i:s');

        Tanggapan::create($validasi);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('dashboard.laporandetail', [
            'pengaduan' => $pengaduan,
            'title' => 'Laporan Detail',
            'tanggapans' => Tanggapan::where('id_pengaduan', $pengaduan->id)->get()
        ]);
    }

    public function export()
    {
        return Excel::download(new pengaduansExport, 'pengaduan.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function buat(Request $request)
    {
        $validasi = $request->validate([
            'nik' => 'required|unique:users|max:16',
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'tlp' => 'required',
        ],[
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.max' => 'NIK tidak boleh lebih dari 16 huruf',
            'nama.required' => 'Nama harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username tidak tersedia',
            'password.required' => 'Password harus diisi',
            'tlp.required' => 'Nomor telepon harus diisi',
        ]);

        $validasi['password'] = bcrypt($validasi['password']);

        User::create($validasi);

        $request->session()->flash('success', 'Akun berhasil dibuat');

        return redirect('/dashboard/users');
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
        Pengaduan::destroy($pengaduan->id);

        return redirect('/dashboard/laporan')->with('success', 'Pengaduan has been deleted');
    }
    public function hapusUser(User $user, Pengaduan $pengaduan)
    {
        User::destroy($user->id);
        Pengaduan::where('id_user', $user->id)->delete();

        return redirect('/dashboard/users')->with('success', 'User has been deleted');
    }
}
