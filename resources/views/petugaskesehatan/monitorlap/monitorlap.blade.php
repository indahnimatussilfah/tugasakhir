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
                                        <a href="{{ route('pelaporan.show', $report->id) }}" class="btn btn-info btn-sm"
                                            title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        {{-- Tambahan tombol atau status di bawah pengobatan --}}
                                        @if ($report->status === 'belum_diproses')
                                          <span class="badge badge-success mt-2">Belum di proses</span>
                                        @elseif ($report->status === 'sedang_diproses')
                                            <span class="badge badge-success mt-2">Sedang Diproses</span>
                                        @else
                                            <span class="badge badge-success mt-2">Sudah di proses</span>
                                        @endif
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
