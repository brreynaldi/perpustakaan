<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            padding: 20px;
            flex-shrink: 0;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 8px;
        }
        .main-content {
            flex-grow: 1;
            padding: 0;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" class="mb-3" style="background-color:white;">
    <h4 class="text-white">📚 Perpustakaan</h4>
    <hr style="border-color: #6c757d;">

    <!-- Manajemen Buku -->
    <a data-bs-toggle="collapse" href="#bookMenu" role="button" aria-expanded="false" aria-controls="bookMenu">
        📖 Manajemen Buku
    </a>
    <div class="collapse ps-3" id="bookMenu">
        <a href="{{ route('books.index') }}">📋 Daftar Buku</a>
        <a href="{{ route('books.create') }}">➕ Tambah Buku</a>
    </div>

    <!-- Manajemen User -->
    <a data-bs-toggle="collapse" href="#userMenu" role="button" aria-expanded="false" aria-controls="userMenu">
        👥 Manajemen User
    </a>
    <div class="collapse ps-3" id="userMenu">
        <a href="{{ route('users.index') }}">📄 Daftar User</a>
    </div>

    <!-- Peminjaman -->
    <a data-bs-toggle="collapse" href="#borrowMenu" role="button" aria-expanded="false" aria-controls="borrowMenu">
        📦 Peminjaman
    </a>
    <div class="collapse ps-3" id="borrowMenu">
        <a href="{{ route('borrow.book.list') }}">📝 Pinjam Buku</a>
        <a href="{{ route('return.book.list') }}">🔄 Pengembalian Buku</a>
    </div>

    <a data-bs-toggle="collapse" href="#rekap" role="button" aria-expanded="false" aria-controls="rekap">
        📋 Rekap
    </a>
    <div class="collapse ps-3" id="rekap">
        <a href="{{ route('rekap.peminjaman') }}">📄 Rekap Peminjaman</a>
        <a href="{{ route('rekap.pengembalian') }}">📄 Rekap Pengembalian</a>
        <a href="{{ route('rekap.peminjaman.export') }}">⬇️ Export PDF</a>

    </div>


    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-4 w-100">Logout</button>
    </form>
</div>


    <!-- Main Content -->
    <div class="main-content">
        <div id="app">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="py-4 px-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
