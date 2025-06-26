@extends('admin.layouts.app')

@section('title', 'Data Layanan Kesehatan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Layanan Kesehatan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan Kesehatan</h6>
            <a href="{{ route('dalakes.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="penyakitTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataLayanan as $layanan)
                            <tr 
                                data-lat="{{ $layanan->latitude }}" 
                                data-lng="{{ $layanan->longitude }}" 
                                data-info="{{ $layanan->nama_layanan }}<br>{{ $layanan->alamat }}<br>{{ $layanan->telepon }}<br>{{ $layanan->deskripsi }}">
                                <td>{{ $layanan->id }}</td>
                                <td>{{ $layanan->nama_layanan }}</td>
                                <td>{{ $layanan->alamat }}</td>
                                <td>{{ $layanan->telepon }}</td>
                                <td>{{ $layanan->latitude }}</td>
                                <td>{{ $layanan->longitude }}</td>
                                <td>{{ $layanan->deskripsi ?? '-' }}</td>
                                <td>
                                    @if($layanan->foto)
                                        <img src="{{ asset('storage/' . $layanan->foto) }}" alt="Foto {{ $layanan->nama_layanan }}" width="100">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dalakes.edit', $layanan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('dalakes.destroy', $layanan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Tidak ada data layanan kesehatan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Peta Leaflet --}}
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <div class="mt-4">
                <div id="map" style="height: 400px;"></div>
                <div id="layanan-info" class="mt-3">
                    <h5>Detail Layanan</h5>
                    <div id="detail" class="p-2 border rounded bg-light text-dark">Klik marker di peta untuk detail layanan.</div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection
