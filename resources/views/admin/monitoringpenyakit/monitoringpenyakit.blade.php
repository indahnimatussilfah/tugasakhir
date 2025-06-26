@extends('admin.layouts.app')

@section('title', 'Monitoring Penyakit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Monitoring Penyakit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Penyakit</h6>
            {{-- Tombol Ekspor Semua --}}
            <form action="{{ route('monitorlap.exportAll') }}" method="GET" class="ml-auto">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-file-export"></i> Ekspor Semua
                </button>
            </form>
        </div>

        <div class="card-body">

            {{-- Form Filter --}}
            <form action="{{ route('monitoringpenyakit.index') }}" method="GET" class="form-inline mb-3">
                <div class="form-group mr-2">
                    <input type="text" name="nama_penyakit" class="form-control form-control-sm" placeholder="Nama Penyakit" value="{{ request('nama_penyakit') }}">
                </div>
                <div class="form-group mr-2">
                    <input type="text" name="nama_puskesmas" class="form-control form-control-sm" placeholder="Nama Puskesmas" value="{{ request('nama_puskesmas') }}">
                </div>
                <div class="form-group mr-2">
                    <input type="date" name="tanggal" class="form-control form-control-sm" value="{{ request('tanggal') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="{{ route('monitoringpenyakit.index') }}" class="btn btn-secondary btn-sm ml-2">Reset</a>
            </form>

            {{-- Tabel Data --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="penyakitTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Penyakit</th>
                            <th>Jumlah Kasus</th>
                            <th>Laki-laki</th>
                            <th>Perempuan</th>
                            <th>Anak</th>
                            <th>Dewasa</th>
                            <th>Lansia</th>
                            <th>Nama Puskesmas</th>
                            <th>Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPenyakit as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->nama_penyakit }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->laki_laki }}</td>
                                <td>{{ $item->perempuan }}</td>
                                <td>{{ $item->anak }}</td>
                                <td>{{ $item->dewasa }}</td>
                                <td>{{ $item->lansia }}</td>
                                <td>{{ $item->nama_puskesmas }}</td>
                                <td>{{ $item->kecamatan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">Tidak ada data penyakit.</td>
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
    $(document).ready(function () {
        $('#penyakitTable').DataTable({
            responsive: true,
            autoWidth: false,
            searching: false,
            paging: true,
            info: true,
            lengthChange: false
        });
    });
</script>
@endsection
