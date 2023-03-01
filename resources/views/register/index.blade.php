@extends('layouts.main')

@section('style')

    <link rel="stylesheet" href="css/login.css">

@endsection

@section('container')
    <div class="login-box">
        <p>Registrasi</p>
        <form action="/register" method="POST">
            @csrf
            <div class="user-box">
                <input required="" autocomplete="off" name="nama" type="text" value="{{ old('nama') }}">
                <label>Nama Lengkap</label>
            </div>
            @error('nama')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="user-box">
                <input required="" autocomplete="off"  name="nik" type="text" value="{{ old('nik') }}">
                <label>NIK</label>
            </div>
            @error('nik')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="user-box">
                <input required="" autocomplete="off" name="tlp" type="text" value="{{ old('tlp') }}">
                <label>Nomor Telepon</label>
            </div>
            @error('tlp')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="user-box">
                <input required="" autocomplete="off" name="username" type="text" value="{{ old('username') }}">
                <label>Username</label>
            </div>
            @error('username')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="user-box">
                <input required="" autocomplete="off" name="password" type="password">
                <label>Password</label>
            </div>
            @error('password')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="mb-3">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Daftar
            </button>
        </form>
        <p class="text-light">Sudah punya akun? <a href="/login" class="a2 text-light">Login sekarang!</a></p>
    </div>
@endsection
