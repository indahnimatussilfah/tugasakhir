@extends('petugasanalis.layouts.app')

@section('title', 'Grafik Penyakit Terbanyak')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Grafik Penyakit Terbanyak</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="text-center font-weight-bold mb-4">
                Grafik Penyakit Terbanyak Tahun 2023 di Kabupaten Indramayu
            </h5>
            <canvas id="penyakitChart" height="250" style="width:100%; max-width:600px;"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('penyakitChart').getContext('2d');
        console.log(ctx);
        const penyakitChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Babadan', 'Patrol', 'Sindang', 'Margadadi', 'Sukra'],
                datasets: [{
                    label: 'Jumlah Kasus',
                    data: [200000, 240000, 190000, 210000, 230000],
                    backgroundColor: [
                        '#4ADE80', // Babadan - hijau
                        '#60A5FA', // Patrol - biru
                        '#FACC15', // Sindang - kuning
                        '#E9D5FF', // Margadadi - ungu muda
                        '#A855F7'  // Sukra - ungu
                    ],
                    borderRadius: 10,
                    barThickness: 30
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                scales: {
                    x: {
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
