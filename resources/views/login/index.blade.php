@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/login.css">
@endsection

@section('container')
    <div class="login-box">
        <p>Login</p>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="user-box">
                <input required="" autocomplete="off" class="@error('username') is-invalid @enderror" name="username" type="text">
                <label>Username</label>
            </div>
            @error('username')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="user-box">
                <input required="" autocomplete="off" name="password" class="@error('password') is-invalid @enderror" type="password">
                <label>Password</label>
            </div>
            @error('password')
                <p class="text-danger fs-6 ms-2 mt-1">
                    {{ $message }}
                </p>
            @enderror
            <button type="submit" class="mb-3">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Login
            </button>
        </form>
        <p class="text-light">Belum punya akun? <a href="/register" class="a2 text-light">Daftar sekarang!</a></p>
    </div>
@endsection
