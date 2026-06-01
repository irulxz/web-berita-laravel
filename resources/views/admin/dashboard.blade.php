@extends('admin.layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- 🔥 STATS CARD -->
<div class="row">

    <!-- Total Users -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-primary">
                        Total Pengguna
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalUsers }}
                    </div>
                </div>
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-warning">
                        Total Kategori
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalCategories }}
                    </div>
                </div>
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Total Artikel -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-success">
                        Total Berita
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalArticles }}
                    </div>
                </div>
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

</div>

<!-- (OPSIONAL) CHART - boleh tetap ada -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header">
                Grafik Artikel
            </div>
            <div class="card-body">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                Statistik Kategori
            </div>
            <div class="card-body">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>

</div>

@endsection