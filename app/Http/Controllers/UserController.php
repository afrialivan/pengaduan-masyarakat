<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $validasi = $request->validate([
            'password' => 'required',
            'username' => 'required',
        ],[
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'admin' || (auth()->user()->level == 'petugas')) {
                return redirect()->intended('/dashboard/laporan');
            }
            return redirect()->intended('/pengaduan');
        }
        return back()->with('error', 'Login Gagal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.index', [
            'title' => 'Register'
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

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'tlp' => 'required',
        ]);

        User::where('id', auth()->user()->id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => auth()->user()->password,
            'tlp' => $request->tlp,
        ]);

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
