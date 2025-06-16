@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Buku</h3>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection