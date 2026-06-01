@extends('admin.layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

    <!-- USERS -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-primary">Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalUsers }}
                    </div>
                </div>
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- ARTIKEL -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-success">Artikel</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalArticles }}
                    </div>
                </div>
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- KATEGORI -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-warning">Kategori</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalCategories }}
                    </div>
                </div>
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

</div>

@endsection