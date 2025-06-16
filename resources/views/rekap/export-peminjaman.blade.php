<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>Rekap Peminjaman Buku</h3>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Buku</th>
                <th>Kelas</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->book->title }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->borrowed_at}}</td>
                    <td>{{ $data->returned_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
