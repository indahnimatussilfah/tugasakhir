@extends('petugaskesehatan.layouts.app')

@section('title', 'Laporan Penyakit ke Dinas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Rekap Penyakit ke Dinas</h1>

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <form action="{{ route('laporandinas.index') }}" method="GET" class="d-flex">
                <input type="month" name="bulan" class="form-control me-2" value="{{ request('bulan') }}" required>
                <button type="submit" class="btn btn-secondary">Filter</button>
            </form>

            <form action="{{ route('laporandinas.export') }}" method="GET">
                <input type="hidden" name="bulan" value="{{ request('bulan') }}">
                <button type="submit" class="btn btn-success">Export Excel</button>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Total Kasus</th>
                            <th>L</th>
                            <th>P</th>
                            <th>Bayi</th>
                            <th>Balita</th>
                            <th>Anak</th>
                            <th>Remaja</th>
                            <th>Dewasa</th>
                            <th>Lansia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_penyakit }}</td>
                                <td>{{ $item->total_kasus }}</td>
                                <td>{{ $item->laki_laki }}</td>
                                <td>{{ $item->perempuan }}</td>
                                <td>{{ $item->bayi }}</td>
                                <td>{{ $item->balita }}</td>
                                <td>{{ $item->anak }}</td>
                                <td>{{ $item->remaja }}</td>
                                <td>{{ $item->dewasa }}</td>
                                <td>{{ $item->lansia }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
