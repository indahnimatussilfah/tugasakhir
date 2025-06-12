@extends('admin.layouts.app')

@section('title', 'Monitoring Penyakit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Monitoring Penyakit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Penyakit</h6>
            <form action="{{ route('datapenyakit.export') }}" method="GET" class="ml-auto">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-file-export"></i> Ekspor Semua
                </button>
            </form>
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
                            <th>Laki-laki</th>
                            <th>Perempuan</th>
                            <th>Bayi</th>
                            <th>Anak</th>
                            <th>Dewasa</th>
                            <th>Lansia</th>
                            <th>Nama Puskesmas</th>
                            <th>Kecamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPenyakit as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->nama_penyakit }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->laki_laki }}</td>
                                <td>{{ $item->perempuan }}</td>
                                <td>{{ $item->bayi }}</td>
                                <td>{{ $item->anak }}</td>
                                <td>{{ $item->dewasa }}</td>
                                <td>{{ $item->lansia }}</td>
                                <td>{{ $item->nama_puskesmas }}</td>
                                <td>{{ $item->kecamatan }}</td>
                                <td>
                                    <a href="{{ route('datapenyakit.export', $item->id) }}" class="btn btn-success btn-sm mb-1">
                                        <i class="fas fa-file-excel"></i> Excel
                                    </a>
                                    <a href="{{ route('datapenyakit.edit', $item->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                    <form action="{{ route('datapenyakit.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($dataPenyakit->isEmpty())
                            <tr>
                                <td colspan="12" class="text-center text-muted">Tidak ada data penyakit.</td>
                            </tr>
                        @endif
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
        });
    });
</script>
@endsection
