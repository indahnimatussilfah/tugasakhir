@extends('admin.layouts.app')

@section('title', 'Edit Layanan Kesehatan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Layanan Kesehatan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('dalakes.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $layanan->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $layanan->telepon) }}">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control-file">
                    @if($layanan->foto)
                        <p class="mt-2">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $layanan->foto) }}" alt="Foto Layanan" style="max-width: 200px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dalakes.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
