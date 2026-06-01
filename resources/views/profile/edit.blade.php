@extends('admin.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Penulis</h1>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm col-md-8 px-3" role="alert">
    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-light">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-id-card mr-2"></i> Kelola Profil Saya
                </h6>
            </div>

            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <!-- NAMA -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Nama Penulis / Editor</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Alamat Email (Username)</label>
                        <input type="email" class="form-control text-muted bg-light"
                            value="{{ $user->email }}" disabled>
                        <small class="text-danger">* Email login tidak dapat diganti.</small>
                    </div>

                    <!-- PHONE -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Nomor Telepon/HP</label>
                        <input type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->profile->phone ?? '') }}"
                            placeholder="Contoh: 08123456789">

                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- BIO -->
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Biografi Ringkas</label>
                        <textarea name="bio"
                            class="form-control @error('bio') is-invalid @enderror"
                            rows="4"
                            placeholder="Tulis biografi singkat Anda sebagai penulis...">{{ old('bio', $user->profile->bio ?? '') }}</textarea>

                        @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fas fa-save mr-1"></i> Perbarui Profil
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection