<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        min-height: 100vh;
        margin: 0;
        font-family: 'Nunito', sans-serif;
        background-color: #f8f9fa;
    }

    .wrapper {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 240px;
        background: linear-gradient(180deg, #212529, #343a40);
        padding: 20px 15px;
        color: white;
        flex-shrink: 0;
    }

    .sidebar img {
        display: block;
        margin: 0 auto 15px auto;
        background-color: white;
        border-radius: 8px;
        padding: 5px;
    }

    .sidebar h4 {
        text-align: center;
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .sidebar a {
        color: #ced4da;
        text-decoration: none;
        display: block;
        padding: 8px 12px;
        border-radius: 5px;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .sidebar a:hover,
    .sidebar a:focus {
        background-color: #495057;
        color: #fff;
        padding-left: 18px;
    }

    .sidebar .collapse a {
        padding-left: 25px;
        font-size: 14px;
    }

    .sidebar hr {
        border-top: 1px solid #6c757d;
        margin: 1rem 0;
    }

    .sidebar .menu-header {
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        color: #adb5bd;
        margin: 15px 0 5px 12px;
    }

    .btn-logout {
        margin-top: 30px;
        width: 100%;
        font-weight: bold;
    }

    .main-content {
        flex-grow: 1;
    }
</style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
    
    <h4>Perpustakaan</h4>
    <hr>

    <div class="menu-header">Menu</div>
    <a href="{{ route('dashboard') }}">📊 Dashboard</a>
    

    <!-- Manajemen Buku -->
    <a data-bs-toggle="collapse" href="#bookMenu" role="button" aria-expanded="false">
        📖 Manajemen Buku
    </a>
    <div class="collapse" id="bookMenu">
        <a href="{{ route('books.index') }}">📋 Daftar Buku</a>
        <a href="{{ route('books.create') }}">➕ Tambah Buku</a>
    </div>

    <!-- Manajemen User -->
    <a data-bs-toggle="collapse" href="#userMenu" role="button" aria-expanded="false">
        👥 Manajemen User
    </a>
    <div class="collapse" id="userMenu">
        <a href="{{ route('users.index') }}">📄 Daftar User</a>
    </div>

    <!-- Peminjaman -->
    <a data-bs-toggle="collapse" href="#borrowMenu" role="button" aria-expanded="false">
        📦 Peminjaman
    </a>
    <div class="collapse" id="borrowMenu">
        <a href="{{ route('borrow.book.list') }}">📝 Pinjam Buku</a>
        <a href="{{ route('return.book.list') }}">🔄 Pengembalian Buku</a>
    </div>

    <!-- Rekap -->
    <a data-bs-toggle="collapse" href="#rekap" role="button" aria-expanded="false">
        📋 Rekap
    </a>
    <div class="collapse" id="rekap">
        <a href="{{ route('rekap.peminjaman') }}">📄 Peminjaman</a>
        <a href="{{ route('rekap.pengembalian') }}">📄 Pengembalian</a>
        <a href="{{ route('rekap.peminjaman.export') }}">⬇️ Export PDF</a>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-logout">Logout</button>
    </form>
</div>

    <!-- Main Content -->
    <div class="main-content">
        <div id="app">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                   
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
