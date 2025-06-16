@extends('layouts.app')

@section('content')
<h4>🔄 Daftar Buku yang Belum Dikembalikan</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tanggal Pinjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowings as $borrowing)
        <tr>
            <td>{{ $borrowing->book->title }}</td>
            <td>{{ $borrowing->borrowed_at}}</td>
            <td>
                <form action="{{ route('return.book', $borrowing->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm">Kembalikan</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
