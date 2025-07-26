@extends('petugaskesehatan.layouts.app')

@section('title', 'Tambah Data Penyakit')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Laporan Penyakit</h1>

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

            <form action="{{ route('datapenyakit.store') }}" method="POST">
                @csrf

                {{-- <div class="form-group">
                    <label for="tanggal">Tanggal Laporan</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div> --}}

                <div class="form-group">
                    <label for="nama_penyakit">Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control" value="{{ old('nama_penyakit') }}" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Kasus</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="laki_laki">Laki-laki</label>
                        <input type="number" name="laki_laki" min="0" class="form-control" value="{{ old('laki_laki') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="perempuan">Perempuan</label>
                        <input type="number" name="perempuan" min="0" class="form-control" value="{{ old('perempuan') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="bayi">Bayi (0–12 bulan)</label>
                        <input type="number" name="bayi" min="0" class="form-control" value="{{ old('bayi') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="balita">Balita (1–5 tahun)</label>
                        <input type="number" name="balita" min="0" class="form-control" value="{{ old('balita') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="anak">Anak (5–12 tahun)</label>
                        <input type="number" name="anak" min="0" class="form-control" value="{{ old('anak') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="remaja">Remaja (13–19 tahun)</label>
                        <input type="number" name="remaja" min="0" class="form-control" value="{{ old('remaja') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dewasa">Dewasa (20–59 tahun)</label>
                        <input type="number" name="dewasa" min="0" class="form-control" value="{{ old('dewasa') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lansia">Lansia (60+ tahun)</label>
                        <input type="number" name="lansia" min="0" class="form-control" value="{{ old('lansia') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_puskesmas">Nama Puskesmas</label>
                    <input type="text" name="nama_puskesmas" class="form-control" value="{{ old('nama_puskesmas') }}" required>
                </div>

                <div class="form-group">
                    <label for="district_code">Kecamatan</label>
                    <select name="district_code" id="district" class="form-control" required>
                        <option value="">Pilih Kecamatan</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->code }}" {{ old('district_code') == $district->code ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('datapenyakit.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
