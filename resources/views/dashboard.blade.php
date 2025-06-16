@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Dashboard</h3>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Total Buku</h5>
                    <h3>{{ $books }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Buku Dipinjam</h5>
                    <h3>{{ $borrowed }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h4>Riwayat Peminjaman Saya</h4>
    <table class="table table-bordered">
        <thead>
            <tr><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th></tr>
        </thead>
        <tbody>
            @foreach ($myBorrowings as $b)
                <tr>
                    <td>{{ $b->book->title }}</td>
                    <td>{{ $b->borrowed_at->format('d-m-Y') }}</td>
                    <td>{{ $b->returned_at ? $b->returned_at->format('d-m-Y') : 'Belum kembali' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection