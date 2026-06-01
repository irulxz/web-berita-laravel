@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h1 class="h3 mb-4 text-gray-800">Tambah Pengguna</h1>

    <!-- Tombol Kembali -->
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <!-- ERROR VALIDATION -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- CARD -->
    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label>Nama</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Masukkan nama"
                    >
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label>Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="form-control"
                        placeholder="Masukkan email"
                    >
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label>Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control"
                        placeholder="Masukkan password"
                    >
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="form-control"
                        placeholder="Ulangi password"
                    >
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection