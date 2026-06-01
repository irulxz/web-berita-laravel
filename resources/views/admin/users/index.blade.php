@extends('admin.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Pengguna</h1>
    
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
        + Tambah Pengguna
    </a>
</div>

{{-- NOTIF SUCCESS --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- NOTIF ERROR --}}
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>

                        {{-- EDIT --}}
                        <a href="{{ route('users.edit', $user->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        {{-- HAPUS --}}
                        <form action="{{ route('users.destroy', $user->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin hapus user ini?')"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengguna</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection