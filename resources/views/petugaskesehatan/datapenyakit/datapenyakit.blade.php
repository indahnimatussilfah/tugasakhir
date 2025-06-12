@extends('petugaskesehatan.layouts.app')

@section('title', 'Laporan Penyakit')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Laporan Penyakit</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan Penyakit</h6>
                <div class="d-flex gap-2">
                    <div class="d-flex align-items-center me-2" style="gap: 8px;">
                        <label for="inputDataPenyakit" class="mb-0">Filter penyakit</label>
                        <input type="text" name="inputDataPenyakit" id="inputDataPenyakit" class="form-control"
                            style="min-width: 200px;">
                    </div>

                    <form action="{{ route('datapenyakit.index') }}" method="GET" class="form-inline mr-2">
                        <div class="form-group mr-2">
                            <label for="bulan" class="mr-2">Filter Bulan:</label>
                            <input type="month" name="bulan" id="bulan" class="form-control"
                                value="{{ request('bulan') }}">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm mr-2">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('datapenyakit.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </form>
                    <form action="{{ route('datapenyakit.export') }}" method="GET">
                        <input type="hidden" name="bulan" value="{{ request('bulan') }}">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-file-export"></i> Export
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="penyakitTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Penyakit</th>
                                <th>Jumlah Kasus</th>
                                <th>L</th>
                                <th>P</th>
                                <th>Bayi</th>
                                <th>Balita</th>
                                <th>Anak</th>
                                <th>Remaja</th>
                                <th>Dewasa</th>
                                <th>Lansia</th>
                                <th>Nama Puskesmas</th>
                                <th>Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableDataPenyakit">
                            @forelse ($dataPenyakit as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->nama_penyakit }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->laki_laki }}</td>
                                    <td>{{ $item->perempuan }}</td>
                                    <td>{{ $item->bayi }}</td>
                                    <td>{{ $item->balita }}</td>
                                    <td>{{ $item->anak }}</td>
                                    <td>{{ $item->remaja }}</td>
                                    <td>{{ $item->dewasa }}</td>
                                    <td>{{ $item->lansia }}</td>
                                    <td>{{ $item->nama_puskesmas }}</td>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>
                                        <a href="{{ route('datapenyakit.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('datapenyakit.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus laporan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">Tidak ada data untuk bulan ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#penyakitTable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@endsection
