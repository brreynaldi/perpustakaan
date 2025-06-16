@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">📊 Dashboard Peminjaman Buku</h4>

    <div class="card shadow">
        <div class="card-body">
            <canvas id="lineChart" height="120"></canvas>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('lineChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! $labels !!},
            datasets: [{
                label: 'Jumlah Peminjaman per Bulan',
                data: {!! $data !!},
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endsection
