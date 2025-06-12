@extends('petugaskesehatan.layouts.app')

@section('title', 'Monitoring Pelaporan Gejala Penyakit')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Monitoring Pelaporan Gejala Penyakit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Jawaban Petugas</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pelaporan.update', $penyakit->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="jawaban">Jawaban / Tanggapan:</label>
                    <textarea name="jawaban" id="jawaban" rows="4" class="form-control @error('jawaban') is-invalid @enderror">{{ old('jawaban', $penyakit->jawaban) }}</textarea>
                    @error('jawaban')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-paper-plane"></i> Tambah Jawaban
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
