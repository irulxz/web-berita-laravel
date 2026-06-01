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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Web Berita</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- USERS -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span>
            </a>
        </li>

        <!-- KATEGORI -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Kategori</span>
            </a>
        </li>

        <!-- TAG (🔥 TAMBAHAN WAJIB) -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tags.index') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>Tag</span>
            </a>
        </li>

        <!-- ARTIKEL -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#artikelMenu">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Artikel</span>
            </a>

            <div id="artikelMenu" class="collapse">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('articles.index') }}">
                        Semua Artikel
                    </a>
                    <a class="collapse-item" href="{{ route('articles.create') }}">
                        Tambah Artikel
                    </a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

    </ul>

    <!-- CONTENT -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- TOPBAR -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

                <form class="d-none d-sm-inline-block form-inline mr-auto">
                    <input class="form-control bg-light border-0 small" placeholder="Search...">
                </form>

                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- USER DROPDOWN -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">

                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name }}
                            </span>

                            <img class="img-profile rounded-circle"
                                 src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow">

                            <!-- 🔥 PROFILE -->
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- LOGOUT -->
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

            <!-- CONTENT DINAMIS -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
    </div>

</div>

<!-- JS -->
<script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>