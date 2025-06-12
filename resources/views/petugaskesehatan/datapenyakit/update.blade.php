@extends('petugaskesehatan.layouts.app')

@section('title', 'Edit Data Penyakit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Laporan Penyakit</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('datapenyakit.update', $dataPenyakit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_laporan">Laporan</label>
                    <input type="text" name="nama_laporan" class="form-control" value="{{ old('nama_laporan', $dataPenyakit->nama_laporan) }}" required>
                </div>

                <div class="form-group">
                    <label for="nama_puskesmas">Nama Puskesmas</label>
                    <input type="text" name="nama_puskesmas" class="form-control" value="{{ old('nama_puskesmas', $dataPenyakit->nama_puskesmas) }}" required>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $dataPenyakit->lokasi) }}">
                </div>

                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <input type="date" name="bulan" class="form-control" value="{{ old('bulan', $dataPenyakit->bulan ? \Carbon\Carbon::parse($dataPenyakit->bulan)->format('Y-m-d') : '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('datapenyakit.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
