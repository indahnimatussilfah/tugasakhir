@extends('admin.layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a>
</div>

<!-- Statistik Ringkasan -->
<div class="row">

    <!-- Total Akun -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAkun }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Layanan Kesehatan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Layanan Kesehatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLayanan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clinic-medical fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Artikel / Laporan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Artikel / Laporan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                <h6 class="m-0 font-weight-bold text-white">5 Penyakit Terbanyak (Bulan Ini)</h6>
            </div>
            <div class="card-body">
                <p class="text-center mb-3 text-muted">Data berdasarkan laporan bulan ini</p>

                @php $maxTotal = !empty($data) ? max($data) : 1; @endphp

                @forelse($labels as $index => $nama_penyakit)
                    @php
                        $total = $data[$index];
                        $percentage = ($total / $maxTotal) * 100;
                    @endphp
                    <h6 class="small font-weight-bold text-capitalize">
                        {{ $nama_penyakit }} <span class="float-right">{{ $total }}</span>
                    </h6>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data penyakit bulan ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Grafik per Kecamatan dan Puskesmas -->
<div class="row">

    <!-- Per Kecamatan -->
    <div class="col-xl-6 mb-4">
        <div class="card shadow">
            <div class="card-header bg-info py-3">
                <h6 class="m-0 font-weight-bold text-white">Distribusi Penyakit per Kecamatan</h6>
            </div>
            <div class="card-body">
                @php $maxKecamatan = !empty($kecamatanData) ? max($kecamatanData) : 1; @endphp

                @forelse($kecamatanLabels as $index => $label)
                    @php
                        $total = $kecamatanData[$index];
                        $percentage = ($total / $maxKecamatan) * 100;
                    @endphp
                    <h6 class="small font-weight-bold">{{ $label ?? 'Tidak diketahui' }} <span class="float-right">{{ $total }}</span></h6>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @empty
                    <p class="text-center text-muted">Tidak ada data distribusi kecamatan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Per Puskesmas -->
    <div class="col-xl-6 mb-4">
        <div class="card shadow">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white">Distribusi Penyakit per Puskesmas</h6>
            </div>
            <div class="card-body">
                @php $maxPuskesmas = !empty($puskesmasData) ? max($puskesmasData) : 1; @endphp

                @forelse($puskesmasLabels as $index => $label)
                    @php
                        $total = $puskesmasData[$index];
                        $percentage = ($total / $maxPuskesmas) * 100;
                    @endphp
                    <h6 class="small font-weight-bold">{{ $label ?? 'Tidak diketahui' }} <span class="float-right">{{ $total }}</span></h6>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                @empty
                    <p class="text-center text-muted">Tidak ada data distribusi puskesmas.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection
