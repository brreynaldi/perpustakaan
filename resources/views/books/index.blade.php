@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Daftar Buku</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Tambah Buku</a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-bordered">
        <thead><tr><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr></thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection