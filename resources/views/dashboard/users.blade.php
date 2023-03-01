@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="../../css/deleteButton.css">
@endsection

@section('dashboard')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <button type="submit" class="noselect selesai mb-1 mt-4" data-bs-toggle="modal"
        data-bs-target="#tambah"><span class="text">Tambah</span>
        <span class="icon" style="color: white">
            <i class="bi bi-person-fill-add"></i>
        </span>
    </button>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-1">No</th>
                    <th scope="col" class="col-4">Nama</th>
                    <th scope="col" class="col-6">Status</th>
                    <th scope="col" class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <button type="submit" class="noselect proses mb-1" data-bs-toggle="modal"
                                data-bs-target="#ubahuser{{ $user->id }}"><span class="text">Edit</span>
                                <span class="icon" style="color: white">
                                    <i class="bi bi-pencil-square"></i>
                                </span>
                            </button>
                            <button class="noselect" data-bs-toggle="modal" data-bs-target="#hapus{{ $user->id }}"><span
                                    class="text">Hapus</span>
                                <span class="icon" style="color: white">
                                    <i class="bi bi-trash3"></i>
                                </span>
                            </button>
                        </td>
                    </tr>

                    {{-- level --}}
                    <div class="modal fade" id="ubahuser{{ $user->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ubah level {{ $user->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/dashboard/ubah-user/{{ $user->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body text-center fs-3">
                                        <select name="level" class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="masyarakat">Masyarakat</option>
                                            <option value="petugas">Petugas</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Iyaa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- hapus --}}
                    <div class="modal fade" id="hapus{{ $user->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/dahboard/user/hapus/{{ $user->id }}" method="POST">
                                    @csrf
                                    <div class="modal-body text-center fs-3">
                                        <h3>Yakin ingin menghapus {{ $user->nama }} ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Iyaa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/register" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control"
                             id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NIK</label>
                            <input type="text" name="nik" class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nomor Telepon</label>
                            <input type="text" name="tlp" class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control"
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
