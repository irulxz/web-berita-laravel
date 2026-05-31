<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <!-- Font -->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">

    <!-- SIDEBAR -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Components -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>

        <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="#">Buttons</a>
                <a class="collapse-item" href="#">Cards</a>
            </div>
        </div>
    </li>

    <!-- Utilities -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>

        <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="#">Colors</a>
                <a class="collapse-item" href="#">Borders</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Pages -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>

        <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Login</a>
                <a class="collapse-item" href="#">Register</a>
            </div>
        </div>
    </li>

    <!-- Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>

    <!-- Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Toggle -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Upgrade Card -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('sbadmin2/img/undraw_rocket.svg') }}">
        <p class="text-center mb-2">
            <strong>SB Admin Pro</strong> is packed with premium features!
        </p>
        <a class="btn btn-success btn-sm" href="#">Upgrade to Pro!</a>
    </div>

</ul>

    <!-- CONTENT -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- TOPBAR -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

    <!-- Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto">
        <input class="form-control bg-light border-0 small" placeholder="Search...">
    </form>

    <!-- RIGHT SIDE -->
    <ul class="navbar-nav ml-auto">

        <!-- Divider -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- USER -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                
                <!-- Nama user -->
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name }}
                </span>

                <!-- Foto -->
                <img class="img-profile rounded-circle"
                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
            </a>

            <!-- Dropdown -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>

</nav>

            <!-- 🔥 INI ISI DINAMIS -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- jQuery Easing -->
<script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- SB Admin Script -->
<script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('sbadmin2/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Chart Demo -->
<script src="{{ asset('sbadmin2/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('sbadmin2/js/demo/chart-pie-demo.js') }}"></script>

</body>
</html>