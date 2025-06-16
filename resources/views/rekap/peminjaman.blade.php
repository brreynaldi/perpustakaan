@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Rekap Peminjaman</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Buku</th>
                <th>Kelas</th>
                <th>Tanggal Pinjam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->book->title }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->borrowed_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
