@extends('petugaskesehatan.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">

    <!-- Data Penyakit -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data Penyakit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPenyakit }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-virus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Monitoring Laporan -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pelaporan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLaporan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-medical-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
