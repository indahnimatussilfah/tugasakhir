@extends('admin.layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Artikel</h1>

    <form action="{{ route('dataartikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dataartikel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
