@extends('petugaskesehatan.layouts.app')

@section('title', 'Detail Data Penyakit')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Data Penyakit</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Penyakit</h6>
                <a href="{{ route('monitorlap.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Kolom kiri --}}
                    <div class="col-md-6 mb-3">
                        <strong>Nama Pelapor:</strong><br>
                        <span>{{ $penyakit->nama }}</span>
                    </div>

                    {{-- Kolom kanan --}}
                    <div class="col-md-6 mb-3">
                        <strong>Gejala Umum:</strong><br>
                        <span>{{ $penyakit->gejala }}</span>
                    </div>

                    {{-- Full row: Deskripsi --}}
                    <div class="col-md-12 mb-3">
                        <strong>Deskripsi:</strong><br>
                        <p>{{ $penyakit->keterangan }}</p>
                    </div>

                    {{-- Full row: Pengobatan --}}
                    <div class="col-md-12 mb-3">
                        <strong>Pengobatan:</strong><br>
                        <p>{{ $penyakit->jawaban }}</p>
                        {{-- Tambahan tombol atau status di bawah pengobatan --}}
                        @if ($penyakit->status === 'belum_diproses')
                            <a href="{{ route('pelaporan.edit', $penyakit->id) }}" class="btn btn-success btn-sm mt-2">
                                <i class="fas fa-cogs"></i> Proses Sekarang
                            </a>
                        @elseif ($penyakit->status === 'sedang_diproses')
                            <span class="badge badge-success mt-2">Sedang Diproses</span>
                        @else
                            <span class="badge badge-success mt-2">Sudah di proses</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
