@extends('admin.layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

    <!-- CARD 1 -->
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

</div>

@endsection