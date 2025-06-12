@extends('petugaskesehatan.layouts.app')

@section('title', 'Monitoring Pelaporan Gejala Penyakit')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Monitoring Pelaporan Gejala Penyakit</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pelaporan Gejala</h6>
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-export"></i> Ekspor Seluruh Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="gejalaTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gejala</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelaporans as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->nama }}</td>
                                    <td>{{ $report->gejala }}</td>
                                    <td>{{ $report->keterangan }}</td>
                                    <td>
                                        @if ($report->status == 'diproses')
                                            <span class="badge badge-success d-block mb-1">Diproses</span>
                                            <span class="text-muted">✓ Selesai</span>
                                        @else
                                            <button class="btn btn-sm btn-warning" disabled>Belum Diproses</button>
                                            <a href="{{ route('monitorlap.createproses', $report->id) }}"
                                                class="btn btn-sm btn-success" style="margin-left: 5px;">
                                                Proses
                                            </a>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
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
            $('#gejalaTable').DataTable();
        });
    </script>
@endsection
