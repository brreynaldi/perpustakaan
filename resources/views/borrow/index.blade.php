@extends('layouts.app')

@section('content')
<h4>📚 Daftar Buku untuk Dipinjam</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->stock }}</td>
            <td>
                <a href="{{ route('borrow.form', $book->id) }}" class="btn btn-primary btn-sm">Pinjam</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
