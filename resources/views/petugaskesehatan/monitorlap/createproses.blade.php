@extends('petugaskesehatan.layouts.app')

@section('title', 'Proses Laporan Gejala')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Proses Laporan Gejala</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('monitorlap.process', $pelaporan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pesan">Pesan Tindakan / Catatan</label>
                    <textarea id="pesan" name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="4" required>{{ old('pesan') }}</textarea>
                    @error('pesan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Penanganan</label>
                    <input id="alamat" type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan & Tandai Selesai</button>
                <a href="{{ route('monitorlap.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
