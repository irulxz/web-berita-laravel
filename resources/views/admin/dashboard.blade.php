@extends('admin.layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

    <!-- Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-primary">Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                </div>
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Berita -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-success">Berita</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                </div>
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Kategori -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-warning">Kategori</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                </div>
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Pengunjung -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-danger">Pengunjung</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1200</div>
                </div>
                <i class="fas fa-chart-line fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

</div>

<!-- CHART -->
<div class="row">

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header">
                Grafik Pengunjung
            </div>
            <div class="card-body">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                Statistik Berita
            </div>
            <div class="card-body">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>

</div>

@endsection