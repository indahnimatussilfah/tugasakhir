@extends('petugaskesehatan.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Monitoring Kesehatan</h1>
</div>

<div class="row">

    <!-- Card Data Penyakit -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card shadow h-100 border-left-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-danger text-uppercase font-weight-bold mb-1">Total Data Penyakit</h6>
                        <h3 class="font-weight-bold text-gray-800">{{ $totalPenyakit }}</h3>
                        <span class="text-muted">Jumlah jenis penyakit tercatat</span>
                    </div>
                    <div>
                        <i class="fas fa-virus fa-3x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Monitoring Laporan -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card shadow h-100 border-left-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-warning text-uppercase font-weight-bold mb-1">Total Pelaporan</h6>
                        <h3 class="font-weight-bold text-gray-800">{{ $totalLaporan }}</h3>
                        <span class="text-muted">Jumlah laporan masuk</span>
                    </div>
                    <div>
                        <i class="fas fa-file-medical-alt fa-3x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Grafik Penyakit Terbanyak -->
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">Grafik 5 Penyakit Terbanyak</h6>
            </div>
            <div class="card-body">
                <p class="text-center mb-3 text-muted">Data berdasarkan laporan bulan ini</p>
                <canvas 
                    id="penyakitChart" 
                    data-labels='@json($labels)' 
                    data-data='@json($data)' 
                    height="300">
                </canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboardPenyakit.js') }}"></script>
@endpush
