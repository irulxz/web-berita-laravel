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

<!-- 🔥 CHART -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">
                Grafik Artikel per Bulan
            </div>
            <div class="card-body">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">
                Statistik Kategori
            </div>
            <div class="card-body">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>

</div>

@endsection


@section('scripts')

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// 🔥 AREA CHART (Artikel per bulan)
const areaCtx = document.getElementById('myAreaChart');

new Chart(areaCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_keys($articlePerMonth->toArray())) !!},
        datasets: [{
            label: 'Jumlah Artikel',
            data: {!! json_encode(array_values($articlePerMonth->toArray())) !!},
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});


// 🔥 PIE CHART (Kategori)
const pieCtx = document.getElementById('myPieChart');

new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: {!! json_encode($categoryData->pluck('name')) !!},
        datasets: [{
            data: {!! json_encode($categoryData->pluck('articles_count')) !!}
        }]
    },
    options: {
        responsive: true
    }
});
</script>

@endsection