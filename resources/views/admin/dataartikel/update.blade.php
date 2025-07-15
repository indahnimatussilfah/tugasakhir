@extends('admin.layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Artikel</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('dataartikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
                </div>

                <div class="form-group">
                    <label>Isi</label>
                    <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $artikel->isi) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $artikel->penulis) }}">
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    @php
                        $tanggalFormatted = '';
                        if (!empty($artikel->tanggal)) {
                            try {
                                $tanggalFormatted = \Carbon\Carbon::parse($artikel->tanggal)->format('Y-m-d');
                            } catch (\Exception $e) {
                                $tanggalFormatted = '';
                            }
                        }
                    @endphp
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $tanggalFormatted) }}">
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control-file">
                    @if($artikel->foto)
                        <p class="mt-2">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="Foto Artikel" style="max-width: 200px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dataartikel.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
