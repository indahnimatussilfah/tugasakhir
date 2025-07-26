@extends('petugaskesehatan.layouts.app')

@section('title', 'Laporan Penyakit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Laporan Penyakit</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Daftar Laporan Penyakit</h6>

            <div class="row align-items-end gy-3 gx-3">
                
                <!-- Filter Nama Penyakit -->
                <div class="col-md-3">
                    <label for="inputDataPenyakit" class="form-label">Filter Penyakit</label>
                    <input type="text" name="inputDataPenyakit" id="inputDataPenyakit" class="form-control" placeholder="Masukkan nama penyakit">
                </div>

                <!-- Filter Bulan -->
                <div class="col-md-3">
                    <form action="{{ route('datapenyakit.index') }}" method="GET">
                        <label for="bulan" class="form-label">Filter Bulan</label>
                        <div class="input-group">
                            <input type="month" name="bulan" id="bulan" class="form-control" value="{{ request('bulan') }}">
                            <button type="submit" class="btn btn-secondary btn-sm">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tombol Tambah, Export, Import -->
                <div class="col-md-6 d-flex justify-content-end gap-2 flex-wrap">
                    
                    <!-- Tombol Tambah Data -->
                    <a href="{{ route('datapenyakit.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>

                    <!-- Tombol Export Data -->
                    <form action="{{ route('datapenyakit.export') }}" method="GET">
                        <input type="hidden" name="bulan" value="{{ request('bulan') }}">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-file-export"></i> Export
                        </button>
                    </form>

                    <!-- Tombol Import Data (Munculkan Modal) -->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </button>

                </div>

            </div>
        </div>

        <div class="card-body mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-nowrap" id="penyakitTable" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            {{-- <th>Tanggal</th> --}}
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
                                <td class="text-center">{{ $index + 1 }}</td>
                                {{-- <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td> --}}
                                <td>{{ $item->nama_penyakit }}</td>
                                <td class="text-end">{{ $item->jumlah }}</td>
                                <td class="text-end">{{ $item->laki_laki }}</td>
                                <td class="text-end">{{ $item->perempuan }}</td>
                                <td class="text-end">{{ $item->bayi }}</td>
                                <td class="text-end">{{ $item->balita }}</td>
                                <td class="text-end">{{ $item->anak }}</td>
                                <td class="text-end">{{ $item->remaja }}</td>
                                <td class="text-end">{{ $item->dewasa }}</td>
                                <td class="text-end">{{ $item->lansia }}</td>
                                <td>{{ $item->nama_puskesmas }}</td>
                                <td>{{ $item->kecamatan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('datapenyakit.edit', $item->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                    <form action="{{ route('datapenyakit.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus laporan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">Tidak ada data untuk bulan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('datapenyakit.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File (.xlsx, .xls, .csv)</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx, .xls, .csv" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        const table = $('#penyakitTable').DataTable({
            responsive: true,
            autoWidth: false
        });

        // Filter berdasarkan nama penyakit (kolom ke-2)
        $('#inputDataPenyakit').on('keyup', function () {
            table.column(2).search(this.value).draw();
        });
    });
</script>
@endsection
