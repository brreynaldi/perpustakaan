@extends('layouts.app')

@section('content')
<div class="container">
    <h4>📚 Form Peminjaman Buku</h4>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <form action="{{ route('borrow.submit', $book->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Pinjam Buku</button>
                <a href="{{ route('borrow.book.list') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
