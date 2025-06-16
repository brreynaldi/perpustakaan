@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Buku</h3>
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $book->stock }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection